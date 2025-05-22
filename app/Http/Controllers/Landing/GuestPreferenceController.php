<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Kriteria;
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
        $kriterias = Kriteria::orderBy('nama_kriteria')->get(); // Ambil semua kriteria dari database
        return view('landing.pages.guest-preference', compact('kategoris', 'kriterias'));
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

        $tempats = TempatKuliner::with('preferensi')
            ->where('kategori_id', $preferensi->kategori_id)
            ->lazyById(50); // Ambil 50 tempat per iterasi

        // Ambil urutan kriteria dari preferensi
        $urutanKriteria = json_decode($preferensi->urutan_kriteria, true);

        // Map bobot berdasarkan index urutan
        $bobot = $this->mapBobotByIndex($urutanKriteria);

        // Hitung nilai WP melalui service
        $hasil = $this->wpService->hitung($preferensi, $tempats, $bobot);

        return view('landing.pages.hasil-rekomendasi', compact('hasil'));
    }

    /**
     * Memetakan bobot kriteria dari database berdasarkan urutan prioritas pengguna
     *
     * @param array $urutanKriteria Array urutan kriteria berdasarkan prioritas
     * @return array Array bobot untuk setiap kriteria
     */
    private function mapBobotByIndex(array $urutanKriteria): array
    {
        // Ambil semua kriteria dari database diurutkan berdasarkan bobot (descending)
        $kriterias = Kriteria::orderByDesc('bobot')->get();

        // Siapkan array untuk menyimpan bobot
        $bobot = [];

        // Map bobot dari database ke urutan preferensi user
        foreach ($urutanKriteria as $index => $namaKriteria) {
            // Ambil kriteria dari database berdasarkan index (urutan bobot)
            $kriteria = $kriterias->get($index);

            if ($kriteria) {
                // Gunakan bobot dari database sesuai dengan urutan index
                $bobot[$namaKriteria] = $kriteria->bobot;
            } else {
                // Fallback jika index melebihi jumlah kriteria di database
                $bobot[$namaKriteria] = 0;
            }
        }

        return $bobot;
    }

    public function detail($id)
    {
        $tempat = TempatKuliner::with(['kategori', 'preferensi', 'menu'])
            ->findOrFail($id);

        return view('landing.pages.detail-rekomendasi', compact('tempat'));
    }
}
