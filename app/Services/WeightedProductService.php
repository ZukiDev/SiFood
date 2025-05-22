<?php

namespace App\Services;

use App\Models\PreferensiGuest;
use App\Models\TempatKuliner;

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
     * @param array $bobot Array berisi bobot untuk setiap kriteria
     * @return array Hasil perhitungan WP yang sudah diurutkan
     */
    public function hitung(PreferensiGuest $preferensi, $tempats, array $bobot): array
    {
        $hasil = collect();

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
                // Langsung set vektor S ke 0 dan lanjut ke tempat berikutnya
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

                // Jika nilai tidak valid (null atau <= 0), maka skor WP dianggap 0
                if (is_null($nilai) || $nilai <= 0) {
                    $vektorS = 0;
                    break;
                }

                // Rumus WP: kalikan nilai berpangkat bobot (nilai^bobot)
                $vektorS *= pow($nilai, $bobotKriteria);
            }

            $hasil->push([
                'tempat' => $tempat,
                'skor' => $vektorS,
                'jarak' => $jarak,
            ]);
        }

        // Hitung total skor semua tempat (untuk normalisasi)
        $totalSkor = $hasil->sum('skor');

        // Normalisasi skor dan urutkan hasil
        $hasil = $hasil->map(function ($item) use ($totalSkor) {
            // Tambahkan nilai_akhir (normalisasi skor)
            $item['nilai_akhir'] = $totalSkor > 0 ? $item['skor'] / $totalSkor : 0;
            return $item;
        })->sortByDesc('nilai_akhir') // Urutkan dari nilai tertinggi ke terendah
            ->values(); // Reset index collection agar rapi (0, 1, 2, ...)

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
            // Jarak adalah kriteria cost (semakin kecil semakin baik)
            // Konversi ke bentuk benefit dengan mengambil kebalikannya (1/jarak)
            $jarak = $tempat->hasil_jarak;
            return $jarak > 0 && $jarak < self::MAX_DISTANCE ? 1 / $jarak : 0;
        }

        // Mapping nama kriteria ke nama kolom di database
        $col = $this->convertToColumnName($kriteria);

        // Periksa keberadaan relasi preferensi dan kolom
        if (!$col || !isset($tempat->preferensi)) {
            return null;
        }

        return $tempat->preferensi->{$col} ?? null;
    }

    /**
     * Konversi nama kriteria ke nama kolom di database
     *
     * @param string $kriteria Nama kriteria yang ingin dikonversi
     * @return string|null Nama kolom di database atau null jika tidak ditemukan
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
     *
     * @param float|null $lat1 Latitude titik 1
     * @param float|null $lon1 Longitude titik 1
     * @param float|null $lat2 Latitude titik 2
     * @param float|null $lon2 Longitude titik 2
     * @return float Jarak dalam kilometer
     */
    private function hitungJarak(?float $lat1, ?float $lon1, ?float $lat2, ?float $lon2): float
    {
        // Validasi koordinat
        if (!isset($lat1) || !isset($lon1) || !isset($lat2) || !isset($lon2)) {
            return self::MAX_DISTANCE; // Nilai maksimum untuk koordinat yang tidak valid
        }

        // Validasi range koordinat (latitude: -90 sampai 90, longitude: -180 sampai 180)
        if (
            $lat1 < -90 || $lat1 > 90 || $lat2 < -90 || $lat2 > 90 ||
            $lon1 < -180 || $lon1 > 180 || $lon2 < -180 || $lon2 > 180
        ) {
            return self::MAX_DISTANCE;
        }

        // Radius Bumi dalam kilometer
        $R = 6371;

        // Mengonversi koordinat dari derajat ke radian
        $phi1 = deg2rad($lat1);
        $phi2 = deg2rad($lat2);
        $dphi = deg2rad($lat2 - $lat1);
        $dlambda = deg2rad($lon2 - $lon1);

        // Menggunakan rumus Haversine untuk menghitung jarak
        $a = sin($dphi / 2) * sin($dphi / 2) +
            cos($phi1) * cos($phi2) * sin($dlambda / 2) * sin($dlambda / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c;

        return $d; // Mengembalikan jarak dalam kilometer
    }
}
