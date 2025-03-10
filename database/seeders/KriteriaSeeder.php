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
                'bobot' => 0.2,
                'deskripsi' => 'Jarak dari lokasi pengguna ke tempat kuliner (dalam km)'
            ],
            [
                'nama_kriteria' => 'Rating Google',
                'bobot' => 0.2,
                'deskripsi' => 'Rating tempat dari Google Maps'
            ],
            [
                'nama_kriteria' => 'Rating Go Food',
                'bobot' => 0.15,
                'deskripsi' => 'Rating pengguna dari platform GoFood'
            ],
            [
                'nama_kriteria' => 'Rating Shopee Food',
                'bobot' => 0.15,
                'deskripsi' => 'Rating pengguna dari platform ShopeeFood'
            ],
            [
                'nama_kriteria' => 'Rating Grab Food',
                'bobot' => 0.1,
                'deskripsi' => 'Rating pengguna dari platform GrabFood'
            ],
            [
                'nama_kriteria' => 'Jumlah Makanan',
                'bobot' => 0.1,
                'deskripsi' => 'Jumlah total menu makanan yang tersedia'
            ],
            [
                'nama_kriteria' => 'Jumlah Minuman',
                'bobot' => 0.1,
                'deskripsi' => 'Jumlah total menu minuman yang tersedia'
            ]
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
