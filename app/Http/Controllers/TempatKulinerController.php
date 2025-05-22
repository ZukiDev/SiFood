<?php

namespace App\Http\Controllers;

use App\Models\TempatKuliner;
use App\Models\PreferensiTempatKuliner;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempatKulinerController extends Controller
{
    /**
     * Menampilkan semua tempat kuliner beserta preferensinya.
     */
    public function index()
    {
        $tempat_kuliners = TempatKuliner::with('kategori', 'preferensi')->get();
        $kategoris = Kategori::all();
        return view('admin.pages.data.tempat-kuliner.index', compact('tempat_kuliners', 'kategoris'));
    }

    /**
     * Menyimpan data Tempat Kuliner beserta Preferensi Tempat Kuliner.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,kategori_id',
            'alamat' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'link_gmaps' => 'nullable|url',
            'link_gofood' => 'nullable|url',
            'link_shopeefood' => 'nullable|url',
            'link_grabfood' => 'nullable|url',
            'rating_google' => 'nullable|numeric|min:0|max:5',
            'rating_go_food' => 'nullable|numeric|min:0|max:5',
            'rating_shopee_food' => 'nullable|numeric|min:0|max:5',
            'rating_grab_food' => 'nullable|numeric|min:0|max:5',
            'jumlah_makanan' => 'nullable|integer|min:0',
            'jumlah_minuman' => 'nullable|integer|min:0',
        ]);

        DB::beginTransaction();
        try {
            // Simpan data tempat kuliner
            $tempat = TempatKuliner::create([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori_id,
                'alamat' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            // Simpan data preferensi
            PreferensiTempatKuliner::create([
                'tempat_id' => $tempat->tempat_id,
                'link_gmaps' => $request->link_gmaps,
                'link_gofood' => $request->link_gofood,
                'link_shopeefood' => $request->link_shopeefood,
                'link_grabfood' => $request->link_grabfood,
                'rating_google' => $request->rating_google,
                'rating_go_food' => $request->rating_go_food,
                'rating_shopee_food' => $request->rating_shopee_food,
                'rating_grab_food' => $request->rating_grab_food,
                'jumlah_makanan' => $request->jumlah_makanan,
                'jumlah_minuman' => $request->jumlah_minuman,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Tempat kuliner berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    /**
     * Mengupdate data Tempat Kuliner dan Preferensinya.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,kategori_id',
            'alamat' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'link_gmaps' => 'nullable|url',
            'link_gofood' => 'nullable|url',
            'link_shopeefood' => 'nullable|url',
            'link_grabfood' => 'nullable|url',
            'rating_google' => 'nullable|numeric|min:0|max:5',
            'rating_go_food' => 'nullable|numeric|min:0|max:5',
            'rating_shopee_food' => 'nullable|numeric|min:0|max:5',
            'rating_grab_food' => 'nullable|numeric|min:0|max:5',
            'jumlah_makanan' => 'nullable|integer|min:0',
            'jumlah_minuman' => 'nullable|integer|min:0',
        ]);

        DB::beginTransaction();
        try {
            $tempat = TempatKuliner::findOrFail($id);
            $tempat->update([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori_id,
                'alamat' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            // Update atau buat data preferensi
            PreferensiTempatKuliner::updateOrCreate(
                ['tempat_id' => $id],
                [
                    'link_gmaps' => $request->link_gmaps,
                    'link_gofood' => $request->link_gofood,
                    'link_shopeefood' => $request->link_shopeefood,
                    'link_grabfood' => $request->link_grabfood,
                    'rating_google' => $request->rating_google,
                    'rating_go_food' => $request->rating_go_food,
                    'rating_shopee_food' => $request->rating_shopee_food,
                    'rating_grab_food' => $request->rating_grab_food,
                    'jumlah_makanan' => $request->jumlah_makanan,
                    'jumlah_minuman' => $request->jumlah_minuman,
                ]
            );

            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data Tempat Kuliner (otomatis hapus Preferensi karena `onDelete cascade`).
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $tempat = TempatKuliner::findOrFail($id);
            $tempat->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
