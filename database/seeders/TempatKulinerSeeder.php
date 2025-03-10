<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TempatKuliner;
use App\Models\Preferensi;
use App\Models\PreferensiTempatKuliner;

class TempatKulinerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Cafe
            ['Cafe Latte', 1, 'Jl. Mawar No. 1'],
            ['Cafe Kopi Kita', 1, 'Jl. Anggrek No. 2'],
            ['Cafe Aroma Senja', 1, 'Jl. Melati No. 3'],
            ['Cafe Chillax', 1, 'Jl. Teratai No. 4'],
            ['Cafe Sunday Morning', 1, 'Jl. Kenanga No. 5'],

            // Warung
            ['Warung Sederhana', 2, 'Jl. Kenari No. 10'],
            ['Warung Mbok Yem', 2, 'Jl. Cendana No. 11'],
            ['Warung Pak Kumis', 2, 'Jl. Cempaka No. 12'],
            ['Warung Tegal Jaya', 2, 'Jl. Beringin No. 13'],
            ['Warung Barokah', 2, 'Jl. Mangga No. 14'],

            // Restoran
            ['Restoran Nusantara', 3, 'Jl. Merpati No. 20'],
            ['Restoran Rasa Sayange', 3, 'Jl. Elang No. 21'],
            ['Restoran Seafood 99', 3, 'Jl. Rajawali No. 22'],
            ['Restoran Sambel Ijo', 3, 'Jl. Garuda No. 23'],
            ['Restoran Sedap Malam', 3, 'Jl. Kutilang No. 24'],
        ];

        foreach ($data as $item) {
            $tempat = TempatKuliner::create([
                'nama' => $item[0],
                'kategori_id' => $item[1],
                'alamat' => $item[2],
                'latitude' => fake()->latitude(-7.5, -7.3),
                'longitude' => fake()->longitude(112.5, 112.9),
            ]);

            PreferensiTempatKuliner::create([
                'tempat_id' => $tempat->tempat_id,
                'rating_google' => fake()->randomFloat(1, 3.5, 5.0),
                'rating_gofood' => fake()->randomFloat(1, 3.0, 5.0),
                'rating_shopeefood' => fake()->randomFloat(1, 3.0, 5.0),
                'rating_grabfood' => fake()->randomFloat(1, 3.0, 5.0),
                'jumlah_makanan' => fake()->numberBetween(5, 20),
                'jumlah_minuman' => fake()->numberBetween(5, 15),
                'link_gmaps' => fake()->url(),
                'link_gofood' => fake()->url(),
                'link_shopeefood' => fake()->url(),
                'link_grabfood' => fake()->url(),
            ]);
        }
    }
}
