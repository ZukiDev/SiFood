<?php

namespace App\Http\Controllers;

use App\Models\TempatKuliner;
use App\Models\PreferensiTempatKuliner;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120', // 5MB
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
        ], [
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus: jpeg, jpg, png, gif, atau webp.',
            'foto.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        DB::beginTransaction();
        try {
            // Handle upload foto
            $fotoFileName = null;
            if ($request->hasFile('foto')) {
                $fotoFileName = $this->uploadFoto($request->file('foto'));
            }

            // Simpan data tempat kuliner
            $tempat = TempatKuliner::create([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori_id,
                'alamat' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'foto' => $fotoFileName,
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
            Log::error('Error creating tempat kuliner: ' . $e->getMessage());
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
            'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120', // 5MB
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
        ], [
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus: jpeg, jpg, png, gif, atau webp.',
            'foto.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        DB::beginTransaction();
        try {
            $tempat = TempatKuliner::findOrFail($id);

            // Handle upload foto baru
            $fotoFileName = $tempat->foto; // Keep existing foto
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($tempat->foto) {
                    $this->deleteFotoFile($tempat->foto);
                }
                // Upload foto baru
                $fotoFileName = $this->uploadFoto($request->file('foto'));
            }

            // Update data tempat kuliner
            $tempat->update([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori_id,
                'alamat' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'foto' => $fotoFileName,
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
            Log::error('Error updating tempat kuliner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus data Tempat Kuliner dan foto
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $tempat = TempatKuliner::findOrFail($id);

            // Hapus foto jika ada
            if ($tempat->foto) {
                $this->deleteFotoFile($tempat->foto);
            }

            $tempat->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting tempat kuliner: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Hapus foto saja (tanpa hapus data tempat kuliner)
     */
    public function deleteFoto($id)
    {
        try {
            $tempat = TempatKuliner::findOrFail($id);

            if ($tempat->foto) {
                $this->deleteFotoFile($tempat->foto);
                $tempat->update(['foto' => null]);

                return redirect()->back()->with('success', 'Foto berhasil dihapus!');
            }

            return redirect()->back()->with('info', 'Tidak ada foto untuk dihapus.');
        } catch (\Exception $e) {
            Log::error('Error deleting foto: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus foto: ' . $e->getMessage());
        }
    }

    /**
     * Upload foto ke storage
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string|null
     */
    private function uploadFoto($file)
    {
        try {
            // Generate nama file unik
            $extension = $file->getClientOriginalExtension();
            $timestamp = now()->format('Ymd_His');
            $random = Str::random(8);
            $fileName = "tempat_{$timestamp}_{$random}.{$extension}";

            // Simpan file ke storage/app/public/tempat_kuliner/
            $path = $file->storeAs('tempat_kuliner', $fileName, 'public');

            return $fileName;
        } catch (\Exception $e) {
            Log::error('Error uploading foto: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Hapus file foto dari storage
     *
     * @param string $fileName
     * @return bool
     */
    private function deleteFotoFile($fileName)
    {
        try {
            if (Storage::disk('public')->exists('tempat_kuliner/' . $fileName)) {
                return Storage::disk('public')->delete('tempat_kuliner/' . $fileName);
            }
            return true;
        } catch (\Exception $e) {
            Log::error('Error deleting foto file: ' . $e->getMessage());
            return false;
        }
    }
}
