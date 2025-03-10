<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Exception;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar kategori.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.pages.data.kategori.index', compact('kategoris'));
    }

    /**
     * Menyimpan kategori baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        try {
            Kategori::create([
                'nama_kategori' => $request->nama_kategori,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan kategori: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Kesalahan tidak terduga: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan data kategori tertentu (Opsional).
     */
    public function show(Kategori $kategori)
    {
        return response()->json($kategori);
    }

    /**
     * Memperbarui data kategori.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori,' . $kategori->kategori_id . ',kategori_id',
            'deskripsi' => 'nullable|string|max:500',
        ]);

        try {
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()->with('success', 'Kategori berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Menghapus kategori.
     */
    public function destroy(Kategori $kategori) // Gunakan Model Binding
    {
        try {
            $kategori->delete();

            return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus kategori: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Kesalahan tidak terduga: ' . $e->getMessage());
        }
    }
}
