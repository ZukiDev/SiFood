<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Kriteria;
use App\Models\PreferensiGuest;
use App\Models\TempatKuliner;
use App\Services\WeightedProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $kategoris = Kategori::all();
        // Ambil kriteria berdasarkan urutan ID untuk consistency
        $kriterias = Kriteria::orderBy('kriteria_id')->get();
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

        // Mapping bobot dari database berdasarkan urutan preferensi guest
        $bobot = $this->mapBobotByUrutan($urutanKriteria);

        // Hitung nilai WP melalui service
        $hasil = $this->wpService->hitung($preferensi, $tempats, $bobot);

        return view('landing.pages.hasil-rekomendasi', compact('hasil'));
    }

    /**
     * Mapping bobot ROC dari database berdasarkan urutan kriteria guest
     * Bobot sudah dihitung di admin menggunakan ROC, tinggal di-mapping saja
     *
     * @param array $urutanKriteria Array urutan kriteria berdasarkan prioritas guest
     * @return array Array bobot untuk setiap kriteria
     */
    private function mapBobotByUrutan(array $urutanKriteria): array
    {
        try {
            // Ambil semua bobot ROC yang sudah dihitung di admin (berdasarkan urutan ID)
            $kriterias = Kriteria::orderBy('kriteria_id')->get();
            $bobotDatabase = $kriterias->pluck('bobot')->toArray();

            $bobot = [];

            // Mapping bobot dari database ke urutan preferensi guest
            foreach ($urutanKriteria as $index => $namaKriteria) {
                // Mapping: urutan ke-0 dapat bobot tertinggi (index 0 dari database)
                // urutan ke-1 dapat bobot kedua (index 1 dari database), dst.
                if (isset($bobotDatabase[$index])) {
                    $bobot[$namaKriteria] = $bobotDatabase[$index];
                    Log::info("Mapping - Kriteria: {$namaKriteria}, Urutan: {$index}, Bobot: {$bobotDatabase[$index]}");
                } else {
                    // Fallback jika index melebihi jumlah kriteria di database
                    $bobot[$namaKriteria] = 0;
                    Log::warning("Bobot tidak ditemukan untuk kriteria: {$namaKriteria} pada index: {$index}");
                }
            }

            return $bobot;
        } catch (\Throwable $e) {
            Log::error('Error dalam mapping bobot: ' . $e->getMessage());
            // Fallback: gunakan bobot equal jika ada error
            $bobotEqual = 1 / count($urutanKriteria);
            return array_fill_keys($urutanKriteria, $bobotEqual);
        }
    }

    public function detail($id)
    {
        $tempat = TempatKuliner::with(['kategori', 'preferensi', 'menu'])
            ->findOrFail($id);

        return view('landing.pages.detail-rekomendasi', compact('tempat'));
    }
}
