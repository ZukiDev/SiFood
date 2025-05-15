<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\PreferensiGuest;
use App\Models\TempatKuliner;
use App\Services\WeightedProductService;
use Illuminate\Http\Request;

class GuestPreferenceController extends Controller
{
    protected WeightedProductService $wpService;

    public function __construct(WeightedProductService $wpService)
    {
        $this->wpService = $wpService;
    }

    // Menampilkan halaman form input preferensi guest
    public function index()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori dari database
        return view('landing.pages.guest-preference', compact('kategoris')); // Tampilkan ke view
    }

    // Menyimpan data preferensi guest ke database lalu redirect ke hasil
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori,kategori_id',
            'urutan_kriteria' => 'required'
        ]);

        // Simpan ke tabel preferensi_guest
        $preferensi = PreferensiGuest::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'kategori_id' => $request->kategori_id,
            'urutan_kriteria' => $request->urutan_kriteria,
        ]);

        // Redirect ke halaman hasil rekomendasi
        return redirect()->route('preferensi.hasil', $preferensi->preferensi_id);
    }

    // Proses perhitungan WP dan menampilkan hasil rekomendasi
    public function hasil($id)
    {
        $preferensi = PreferensiGuest::findOrFail($id);
        // dd($preferensi);

        $tempats = TempatKuliner::with('preferensi')
            ->where('kategori_id', $preferensi->kategori_id)
            ->lazyById(50); // Ambil 50 tempat per iterasi
        // dd($tempats);

        $kriteria = json_decode($preferensi->urutan_kriteria, true);
        $bobotROC = getROCWeights(); // Fungsi ini mengembalikan bobot ROC yang sudah dihitung

        // Mapping nama kriteria ke bobot
        $bobot = [];
        foreach ($kriteria as $index => $nama) {
            $bobot[$nama] = $bobotROC[$index];
        }

        // Hitung nilai WP melalui service
        $hasil = $this->wpService->hitung($preferensi, $tempats, $bobot);
        // dd($hasil);

        return view('landing.pages.hasil-rekomendasi', compact('hasil'));
    }

    public function detail($id)
    {
        $tempat = TempatKuliner::with(['kategori', 'preferensi', 'menu'])
            ->findOrFail($id);

        return view('landing.pages.detail-rekomendasi', compact('tempat'));
    }
}
