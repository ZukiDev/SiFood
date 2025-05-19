<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        $kriterias = [
            [
                'nama_kriteria' => 'Jarak',
                'bobot' => 0.370,
                'deskripsi' => 'Jarak dari lokasi pengguna ke tempat kuliner (dalam km)'
            ],
            [
                'nama_kriteria' => 'Rating Google',
                'bobot' => 0.227,
                'deskripsi' => 'Rating tempat dari Google Maps'
            ],
            [
                'nama_kriteria' => 'Rating Go Food',
                'bobot' => 0.156,
                'deskripsi' => 'Rating pengguna dari platform GoFood'
            ],
            [
                'nama_kriteria' => 'Rating Shopee Food',
                'bobot' => 0.108,
                'deskripsi' => 'Rating pengguna dari platform ShopeeFood'
            ],
            [
                'nama_kriteria' => 'Rating Grab Food',
                'bobot' => 0.072,
                'deskripsi' => 'Rating pengguna dari platform GrabFood'
            ],
            [
                'nama_kriteria' => 'Jumlah Makanan',
                'bobot' => 0.044,
                'deskripsi' => 'Jumlah total menu makanan yang tersedia'
            ],
            [
                'nama_kriteria' => 'Jumlah Minuman',
                'bobot' => 0.020,
                'deskripsi' => 'Jumlah total menu minuman yang tersedia'
            ]
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
