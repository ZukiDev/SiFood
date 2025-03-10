<?php

namespace App\Services;

use App\Models\PreferensiUser;
use App\Models\TempatKuliner;

class WeightedProductService
{
    /**
     * Hitung skor WP untuk semua tempat kuliner berdasarkan preferensi user
     */
    public function hitung(PreferensiUser $preferensi, $tempats, array $bobot): array
    {
        $hasil = collect(); // Inisialisasi collection kosong untuk menyimpan hasil perhitungan WP

        foreach ($tempats as $tempat) {
            $vektorS = 1; // Nilai awal vektor S di-set ke 1 (karena akan dikalikan)

            foreach ($bobot as $namaKriteria => $bobotKriteria) {
                // Ambil nilai dari tempat kuliner berdasarkan nama kriteria
                $nilai = $this->ambilNilai($namaKriteria, $preferensi, $tempat);

                // Jika nilai tidak valid (null atau <= 0), maka skor WP dianggap 0 dan proses tempat ini dihentikan
                if (is_null($nilai) || $nilai <= 0) {
                    $vektorS = 0;
                    break; // Keluar dari perulangan kriteria karena hasil WP sudah tidak valid
                }

                // Rumus WP: kalikan nilai berpangkat bobot (nilai^bobot)
                $vektorS *= pow($nilai, $bobotKriteria);
            }

            // Tambahkan hasil perhitungan tempat ini ke dalam collection
            $hasil->push([
                'tempat' => $tempat,   // Objek tempat kuliner
                'skor' => $vektorS,    // Nilai vektor S (sebelum normalisasi)
            ]);
        }

        $totalSkor = $hasil->sum('skor'); // Hitung total skor semua tempat (untuk normalisasi)

        $hasil = $hasil->map(function ($item) use ($totalSkor) {
            // Tambahkan nilai_akhir (normalisasi skor)
            $item['nilai_akhir'] = $totalSkor > 0 ? $item['skor'] / $totalSkor : 0;
            return $item; // Kembalikan data yang sudah ditambahkan nilai akhir
        })->sortByDesc('nilai_akhir') // Urutkan dari nilai akhir tertinggi ke terendah
            ->values(); // Reset index collection agar rapi (0, 1, 2, ...)

        return $hasil->toArray();
    }

    /**
     * Ambil nilai kriteria dari tempat kuliner, termasuk jarak
     */
    private function ambilNilai(string $kriteria, PreferensiUser $preferensi, TempatKuliner $tempat): ?float
    {
        if ($kriteria === 'Jarak') {
            // Jarak bersifat cost sehingga dibalik (1 / jarak)
            return $this->hitungJarak(
                $preferensi->latitude,
                $preferensi->longitude,
                $tempat->latitude,
                $tempat->longitude
            ) ?: 1;
        }

        // Mapping nama kriteria ke nama kolom di database
        $col = $this->convertToColumnName($kriteria);
        return $col ? $tempat->preferensi->{$col} ?? null : null;
    }

    /**
     * Konversi nama kriteria ke nama kolom yang sesuai di tabel preferensi_tempat_kuliner
     */
    private function convertToColumnName(string $kriteria): ?string
    {
        return match ($kriteria) {
            'Rating Google' => 'rating_google',
            'Rating Shopee Food' => 'rating_shopeefood',
            'Rating Go Food' => 'rating_gofood',
            'Rating Grab Food' => 'rating_grabfood',
            'Jumlah Makanan' => 'jumlah_makanan',
            'Jumlah Minuman' => 'jumlah_minuman',
            default => null,
        };
    }

    /**
     * Hitung jarak menggunakan rumus Haversine (dalam kilometer)
     */
    private function hitungJarak(float $lat1, float $lon1, float $lat2, float $lon2): float
    {
        $earthRadius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);

        $a = sin($dLat / 2) ** 2 + sin($dLon / 2) ** 2 * cos($lat1) * cos($lat2);
        return $earthRadius * 2 * atan2(sqrt($a), sqrt(1 - $a));
    }
}
