<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatKuliner;
use App\Models\Kategori;
use App\Models\User;
use App\Models\PreferensiGuest;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin
     */
    public function index()
    {
        // Data untuk kartu statistik
        $totalTempatKuliner = TempatKuliner::count();
        $totalMenu = Menu::count();

        // Menghitung total makanan dan minuman
        $totalMakanan = Menu::where('deskripsi', 'like', '%makanan%')->count();
        $totalMinuman = Menu::where('deskripsi', 'like', '%minuman%')->count();

        // Data tempat kuliner baru bulan ini
        $startOfMonth = Carbon::now()->startOfMonth();
        $newTempatKuliner = TempatKuliner::where('created_at', '>=', $startOfMonth)->count();
        $newMenu = Menu::where('created_at', '>=', $startOfMonth)->count();

        // Menu terpopuler
        $topMakanan = Menu::where('deskripsi', 'like', '%makanan%')
            ->orderBy('created_at', 'desc')
            ->first()
            ->nama_menu ?? 'N/A';

        $topMinuman = Menu::where('deskripsi', 'like', '%minuman%')
            ->orderBy('created_at', 'desc')
            ->first()
            ->nama_menu ?? 'N/A';

        // Tempat kuliner teratas (berdasarkan rating)
        $topPlaces = TempatKuliner::with(['kategori', 'preferensi'])
            ->whereHas('preferensi', function ($q) {
                $q->whereNotNull('rating_shopeefood');
            })
            ->join('preferensi_tempat_kuliner', 'tempat_kuliner.tempat_id', '=', 'preferensi_tempat_kuliner.tempat_id')
            ->orderBy('preferensi_tempat_kuliner.rating_shopeefood', 'desc')
            ->select('tempat_kuliner.*')
            ->limit(3)
            ->get();

        // Tempat kuliner terbaru
        $latestPlaces = TempatKuliner::with(['kategori'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Data aktivitas terbaru
        $latestActivity = [
            'newPlaces' => TempatKuliner::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
            'updatedPlaces' => TempatKuliner::where('updated_at', '>=', Carbon::now()->subDays(7))
                ->where('updated_at', '!=', DB::raw('created_at'))
                ->count(),
            'newMenus' => Menu::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
            'recentPreferences' => PreferensiGuest::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
            'popularLocation' => PreferensiGuest::where('created_at', '>=', Carbon::now()->subDays(7))
                ->where(function ($q) {
                    $q->whereNotNull('latitude')->whereNotNull('longitude');
                })
                ->count()
        ];

        // Total preferensi untuk perhitungan persentase
        $totalPreferensi = PreferensiGuest::count();

        // Data rekomendasi teratas (berdasarkan kategori)
        $topRecommendations = [
            'cafe' => $this->calculateCategoryPercentage('Cafe', $totalPreferensi),
            'restaurant' => $this->calculateCategoryPercentage('Restoran', $totalPreferensi),
            'warung' => $this->calculateCategoryPercentage('Warung', $totalPreferensi)
        ];

        // Tambahkan data trend 10 hari terakhir
        $lastTenDays = Carbon::now()->subDays(9);

        // Trend tempat kuliner per hari (10 hari terakhir)
        $tempatKulinerTrend = $this->getDailyCountTrend(TempatKuliner::class, $lastTenDays);

        // Trend menu per hari (10 hari terakhir)
        $menuTrend = $this->getDailyCountTrend(Menu::class, $lastTenDays);

        // Trend makanan per hari (10 hari terakhir)
        $makananTrend = $this->getDailyCountTrend(Menu::class, $lastTenDays, function ($query) {
            $query->where('deskripsi', 'like', '%makanan%');
        });

        // Trend minuman per hari (10 hari terakhir)
        $minumanTrend = $this->getDailyCountTrend(Menu::class, $lastTenDays, function ($query) {
            $query->where('deskripsi', 'like', '%minuman%');
        });

        // Data untuk Total Pengguna (PreferensiGuest)
        $totalPengguna = PreferensiGuest::distinct('preferensi_id')->count();
        $newPengguna = PreferensiGuest::where('created_at', '>=', $startOfMonth)->count();

        // Trend pengguna per hari (10 hari terakhir)
        $penggunaTrend = $this->getDailyCountTrend(PreferensiGuest::class, $lastTenDays);

        return view('admin.pages.dashboard', compact(
            'totalTempatKuliner',
            'totalMenu',
            'totalMakanan',
            'totalMinuman',
            'totalPengguna',
            'newTempatKuliner',
            'newMenu',
            'newPengguna',
            'topMakanan',
            'topMinuman',
            'topPlaces',
            'latestPlaces',
            'latestActivity',
            'topRecommendations',
            'tempatKulinerTrend',
            'menuTrend',
            'makananTrend',
            'minumanTrend',
            'penggunaTrend'
        ));
    }

    /**
     * Menghitung persentase suatu kategori terhadap total preferensi
     */
    private function calculateCategoryPercentage($categoryName, $totalPreferensi)
    {
        if ($totalPreferensi == 0) {
            return 0;
        }

        $count = PreferensiGuest::whereHas('kategori', function ($q) use ($categoryName) {
            $q->where('nama_kategori', 'like', '%' . $categoryName . '%');
        })->count();

        return round(($count / $totalPreferensi) * 100);
    }

    /**
     * Mendapatkan data trend harian untuk model tertentu
     *
     * @param string $modelClass Nama kelas model
     * @param Carbon $startDate Tanggal awal
     * @param callable|null $additionalFilter Filter tambahan (opsional)
     * @return array Data trend harian
     */
    private function getDailyCountTrend($modelClass, $startDate, $additionalFilter = null)
    {
        $trend = [];

        for ($i = 0; $i < 10; $i++) {
            $date = (clone $startDate)->addDays($i);
            $nextDay = (clone $date)->addDay();

            $query = $modelClass::where('created_at', '>=', $date->startOfDay())
                ->where('created_at', '<', $nextDay->startOfDay());

            // Terapkan filter tambahan jika ada
            if ($additionalFilter !== null) {
                $additionalFilter($query);
            }

            $trend[] = $query->count();
        }

        return $trend;
    }
}
