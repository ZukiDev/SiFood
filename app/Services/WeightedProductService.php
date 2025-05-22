<?php

namespace App\Services;

use App\Models\PreferensiGuest;
use App\Models\TempatKuliner;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Log;

class WeightedProductService
{
    /**
     * Konstanta untuk jarak maksimum dalam kilometer
     * Digunakan ketika koordinat tidak valid
     */
    const MAX_DISTANCE = 999999;

    /**
     * Hitung skor WP untuk semua tempat kuliner berdasarkan preferensi guest
     *
     * @param PreferensiGuest $preferensi Preferensi pengguna
     * @param iterable $tempats Koleksi tempat kuliner
     * @param array $bobot Array berisi bobot untuk setiap kriteria (tanpa pembulatan)
     * @return array Hasil perhitungan WP yang sudah diurutkan
     */
    public function hitung(PreferensiGuest $preferensi, $tempats, array $bobot): array
    {
        $hasil = collect();

        Log::info('Memulai perhitungan WP dengan bobot:', $bobot);

        foreach ($tempats as $tempat) {
            $vektorS = 1;

            // Hitung jarak sekali saja
            $jarak = $this->hitungJarak(
                $preferensi->latitude,
                $preferensi->longitude,
                $tempat->latitude,
                $tempat->longitude
            );

            // Simpan jarak di tempat agar dapat diakses oleh fungsi ambilNilai
            $tempat->hasil_jarak = $jarak;

            // Jika jaraknya invalid (terlalu jauh atau koordinat tidak valid)
            if ($jarak >= self::MAX_DISTANCE) {
                $hasil->push([
                    'tempat' => $tempat,
                    'skor' => 0,
                    'jarak' => $jarak,
                ]);
                continue;
            }

            foreach ($bobot as $namaKriteria => $bobotKriteria) {
                // Ambil nilai dari tempat kuliner berdasarkan nama kriteria
                $nilai = $this->ambilNilai($namaKriteria, $tempat);

                // PERBAIKAN: Jika nilai null atau <= 0, gunakan nilai 1 (netral)
                if (is_null($nilai) || $nilai <= 0) {
                    $nilai = 1; // Nilai netral untuk data yang tidak ada
                    Log::info("Nilai null/invalid untuk kriteria {$namaKriteria} pada tempat {$tempat->nama}, menggunakan nilai default: 1");
                }

                // Rumus WP: kalikan nilai berpangkat bobot (nilai^bobot)
                $nilaiPangkat = pow($nilai, $bobotKriteria);
                $vektorS *= $nilaiPangkat;

                Log::debug("Perhitungan WP - Tempat: {$tempat->nama}, Kriteria: {$namaKriteria}, Nilai: {$nilai}, Bobot: {$bobotKriteria}, Hasil: {$nilaiPangkat}");
            }

            $hasil->push([
                'tempat' => $tempat,
                'skor' => $vektorS,
                'jarak' => $jarak,
            ]);
        }

        // Hitung total skor semua tempat (untuk normalisasi)
        $totalSkor = $hasil->sum('skor');

        Log::info("Total skor sebelum normalisasi: {$totalSkor}");

        // Normalisasi skor dan urutkan hasil
        $hasil = $hasil->map(function ($item) use ($totalSkor) {
            $item['nilai_akhir'] = $totalSkor > 0 ? $item['skor'] / $totalSkor : 0;
            return $item;
        })->sortByDesc('nilai_akhir')
            ->values();

        return $hasil->toArray();
    }

    /**
     * Ambil nilai kriteria dari tempat kuliner
     *
     * @param string $kriteria Nama kriteria
     * @param TempatKuliner $tempat Objek tempat kuliner
     * @return float|null Nilai dari kriteria tersebut
     */
    private function ambilNilai(string $kriteria, TempatKuliner $tempat): ?float
    {
        if ($kriteria === 'Jarak') {
            $jarak = $tempat->hasil_jarak;
            return $jarak > 0 && $jarak < self::MAX_DISTANCE ? 1 / $jarak : 0;
        }

        $slug = $this->getSlugFromDatabase($kriteria);

        if (!$slug || !isset($tempat->preferensi)) {
            return null; // Will be handled as 1 in main function
        }

        return $tempat->preferensi->{$slug} ?? null;
    }

    /**
     * Ambil slug dari database berdasarkan nama kriteria
     */
    private function getSlugFromDatabase(string $kriteria): ?string
    {
        try {
            static $kriteriaCache = null;

            if ($kriteriaCache === null) {
                $kriteriaCache = Kriteria::select('nama_kriteria', 'slug')
                    ->get()
                    ->keyBy('nama_kriteria')
                    ->toArray();
            }

            $slug = $kriteriaCache[$kriteria]['slug'] ?? null;

            if ($slug === 'jarak') {
                return null;
            }

            return $slug;
        } catch (\Throwable $e) {
            Log::error('Error mengambil slug dari database: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Hitung jarak menggunakan rumus Haversine
     */
    private function hitungJarak(?float $lat1, ?float $lon1, ?float $lat2, ?float $lon2): float
    {
        if (!isset($lat1) || !isset($lon1) || !isset($lat2) || !isset($lon2)) {
            return self::MAX_DISTANCE;
        }

        if (
            $lat1 < -90 || $lat1 > 90 || $lat2 < -90 || $lat2 > 90 ||
            $lon1 < -180 || $lon1 > 180 || $lon2 < -180 || $lon2 > 180
        ) {
            return self::MAX_DISTANCE;
        }

        $R = 6371;

        $phi1 = deg2rad($lat1);
        $phi2 = deg2rad($lat2);
        $dphi = deg2rad($lat2 - $lat1);
        $dlambda = deg2rad($lon2 - $lon1);

        $a = sin($dphi / 2) * sin($dphi / 2) +
            cos($phi1) * cos($phi2) * sin($dlambda / 2) * sin($dlambda / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c;

        return $d;
    }
}
