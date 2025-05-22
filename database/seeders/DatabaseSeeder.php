<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Add Admin User
        User::create([
            'name' => 'Marzuki Akmal',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('adminadmin'),
        ]);

        $this->call([
            KategoriSeeder::class,
            KriteriaSeeder::class,
            TempatKulinerSeeder::class,
        ]);
    }
}
