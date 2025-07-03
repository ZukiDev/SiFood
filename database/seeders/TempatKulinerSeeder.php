<?php

namespace Database\Seeders;

use App\Models\TempatKuliner;
use App\Models\PreferensiTempatKuliner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class TempatKulinerSeeder extends Seeder
{
    public function run(): void
    {
        $file = storage_path('app/public/data-tempat.csv');
        $rows = array_map('str_getcsv', file($file));

        // Use real headers from row 2
        $data = array_slice($rows, 2); // skip fake + header rows

        $kategoriMap = [
            'Warung' => 1,
            'Cafe' => 2,
            'Restoran' => 3,
        ];


        foreach ($data as $row) {
            // 🛑 Skip rows with missing columns or all empty
            if (count($row) < 15 || trim($row[1]) === '') {
                continue;
            }

            // Inside foreach
            if (count($row) < 15 || trim($row[1]) === '') {
                Log::warning('Skipped row:', $row);
                continue;
            }

            $tempat = TempatKuliner::create([
                'nama' => $row[1],
                'kategori_id' => $kategoriMap[$row[2]] ?? null,
                'alamat' => 'Undefined',
                'latitude' => floatval(str_replace(',', '.', $row[13] ?? 0)),
                'longitude' => floatval(str_replace(',', '.', $row[14] ?? 0)),
            ]);

            PreferensiTempatKuliner::create([
                'tempat_id' => $tempat->tempat_id,
                'rating_google' => floatval(str_replace(',', '.', $row[3] ?? 0)),
                'rating_go_food' => floatval(str_replace(',', '.', $row[4] ?? 0)),
                'rating_grab_food' => floatval(str_replace(',', '.', $row[5] ?? 0)),
                'rating_shopee_food' => floatval(str_replace(',', '.', $row[6] ?? 0)),
                'jumlah_makanan' => intval($row[7] ?? 0),
                'jumlah_minuman' => intval($row[8] ?? 0),
                'link_gmaps' => $row[9] ?? null,
                'link_gofood' => $row[10] ?? null,
                'link_grabfood' => $row[11] ?? null,
                'link_shopeefood' => $row[12] ?? null,
            ]);
        }
    }
}
