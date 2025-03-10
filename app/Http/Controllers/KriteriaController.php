<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('admin.pages.data.kriteria.index', compact('kriterias'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_kriteria' => 'required|string|max:255',
                'bobot' => 'nullable|numeric',
                'deskripsi' => 'nullable|string',
            ]);

            Kriteria::create([
                'nama_kriteria' => $request->nama_kriteria,
                'bobot' => $request->bobot ?? 1.0,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan.');
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
                'bobot' => 'nullable|numeric',
                'deskripsi' => 'nullable|string',
            ]);

            $kriteria = Kriteria::findOrFail($id);
            $kriteria->update([
                'nama_kriteria' => $request->nama_kriteria,
                'bobot' => $request->bobot ?? 1.0,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()->with('success', 'Kriteria berhasil diperbarui.');
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

            return redirect()->back()->with('success', 'Kriteria berhasil dihapus.');
        } catch (\Throwable $e) {
            Log::error('Error saat menghapus kriteria: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
