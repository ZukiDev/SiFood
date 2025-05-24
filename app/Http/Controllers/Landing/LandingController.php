<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\TempatKuliner;
use App\Models\PreferensiGuest;
use App\Models\Menu;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Get statistik data
        $statistics = [
            'tempat_kuliner' => TempatKuliner::count(),
            'pengguna' => PreferensiGuest::count(), // Total user yang pernah cari rekomendasi
            'menu' => Menu::count(),
            'kriteria' => Kriteria::count(),
        ];

        return view('landing.pages.index', compact('statistics'));
    }
}
