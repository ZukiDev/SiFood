<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::orderBy('kriteria_id')->get();
        return view('admin.pages.data.kriteria.index', compact('kriterias'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_kriteria' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
            ]);

            // Tambah kriteria baru (slug auto-generated di model)
            Kriteria::create([
                'nama_kriteria' => $request->nama_kriteria,
                'bobot' => 0, // Temporary, akan dihitung ulang
                'deskripsi' => $request->deskripsi,
            ]);

            // Hitung ulang semua bobot ROC
            $this->recalculateROCWeights();

            return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan dan bobot ROC telah dihitung ulang.');
        } catch (\Throwable $e) {
            Log::error('Error saat menyimpan kriteria: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_kriteria' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
            ]);

            $kriteria = Kriteria::findOrFail($id);
            $kriteria->update([
                'nama_kriteria' => $request->nama_kriteria,
                'deskripsi' => $request->deskripsi,
                // Slug dan bobot akan di-handle otomatis di model
            ]);

            // Hitung ulang semua bobot ROC (jika ada perubahan urutan/prioritas)
            $this->recalculateROCWeights();

            return redirect()->back()->with('success', 'Kriteria berhasil diperbarui dan bobot ROC telah dihitung ulang.');
        } catch (\Throwable $e) {
            Log::error('Error saat update kriteria: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }

    public function destroy($id)
    {
        try {
            $kriteria = Kriteria::findOrFail($id);
            $kriteria->delete();

            // Hitung ulang semua bobot ROC setelah menghapus kriteria
            $this->recalculateROCWeights();

            return redirect()->back()->with('success', 'Kriteria berhasil dihapus dan bobot ROC telah dihitung ulang.');
        } catch (\Throwable $e) {
            Log::error('Error saat menghapus kriteria: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }

    /**
     * Menghitung ulang bobot ROC untuk semua kriteria
     * Formula ROC: w_i = (1/m) * Σ(1/j) dari j=i sampai m
     */
    private function recalculateROCWeights()
    {
        try {
            $kriterias = Kriteria::orderBy('kriteria_id')->get();
            $totalKriteria = $kriterias->count();

            if ($totalKriteria == 0) {
                return;
            }

            foreach ($kriterias as $index => $kriteria) {
                $rank = $index + 1; // Ranking dimulai dari 1
                $bobotROC = 0;

                // Hitung ROC: w_i = (1/m) * Σ(1/j) dari j=i sampai m
                for ($j = $rank; $j <= $totalKriteria; $j++) {
                    $bobotROC += (1 / $j);
                }

                $bobotROC = $bobotROC / $totalKriteria;

                // Update bobot di database (tanpa pembulatan)
                $kriteria->update(['bobot' => $bobotROC]);
            }

            Log::info('ROC weights recalculated successfully for ' . $totalKriteria . ' criteria');
        } catch (\Throwable $e) {
            Log::error('Error saat menghitung ulang bobot ROC: ' . $e->getMessage());
        }
    }

    /**
     * Method untuk menghitung ulang bobot ROC secara manual (jika diperlukan)
     * Bisa dipanggil dari route khusus
     */
    public function recalculateWeights()
    {
        try {
            $this->recalculateROCWeights();
            return redirect()->back()->with('success', 'Bobot ROC berhasil dihitung ulang untuk semua kriteria.');
        } catch (\Throwable $e) {
            Log::error('Error saat manual recalculate: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghitung ulang bobot ROC.');
        }
    }
}
