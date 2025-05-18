<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\TempatKuliner;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $menus = Menu::with('tempatKuliner')->get();
            $tempatKuliners = TempatKuliner::orderBy('nama')->get();

            return view('admin.pages.data.menu.index', compact('menus', 'tempatKuliners'));
        } catch (\Throwable $e) {
            Log::error('Error saat menampilkan daftar menu: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data menu.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {
        //     $request->validate([
        //         'tempat_id' => 'required|exists:tempat_kuliner,tempat_id',
        //         'nama_menu' => 'required|string|max:255',
        //         'deskripsi' => 'nullable|string',
        //     ]);

        //     Menu::create([
        //         'tempat_id' => $request->tempat_id,
        //         'nama_menu' => $request->nama_menu,
        //         'deskripsi' => $request->deskripsi,
        //     ]);

        //     // Update menu counts
        //     $this->updateMenuCounts($request->tempat_id);

        //     return redirect()->route('menus.index')
        //         ->with('success', 'Menu berhasil ditambahkan.');
        // } catch (\Throwable $e) {
        //     Log::error('Error saat menyimpan menu: ' . $e->getMessage());
        //     return redirect()->back()->with('error', 'Gagal menyimpan data menu.');
        // }

        try {
            $request->validate([
                'tempat_id' => 'required|exists:tempat_kuliner,tempat_id',
                'menu' => 'required|array',
            ]);

            $tempat_id = $request->tempat_id;
            $menuItems = $request->menu;
            $addedCount = 0;

            foreach ($menuItems as $item) {
                // Skip if nama_menu is empty
                if (empty($item['nama_menu'])) {
                    continue;
                }

                Menu::create([
                    'tempat_id' => $tempat_id,
                    'nama_menu' => $item['nama_menu'],
                    'deskripsi' => $item['deskripsi'],
                ]);

                $addedCount++;
            }

            // Update preferensi_tempat_kuliner counts
            $this->updateMenuCounts($tempat_id);

            return redirect()->route('menus.index')
                ->with('success', "$addedCount menu berhasil ditambahkan.");
        } catch (\Throwable $e) {
            Log::error('Error saat menyimpan batch menu: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menyimpan data batch menu.');
        }
    }

    /**
     * Store multiple menu items at once.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function storeBatch(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'tempat_id' => 'required|exists:tempat_kuliner,tempat_id',
    //             'menu' => 'required|array',
    //         ]);

    //         $tempat_id = $request->tempat_id;
    //         $menuItems = $request->menu;
    //         $addedCount = 0;

    //         foreach ($menuItems as $item) {
    //             // Skip if nama_menu is empty
    //             if (empty($item['nama_menu'])) {
    //                 continue;
    //             }

    //             Menu::create([
    //                 'tempat_id' => $tempat_id,
    //                 'nama_menu' => $item['nama_menu'],
    //                 'deskripsi' => $item['deskripsi'],
    //             ]);

    //             $addedCount++;
    //         }

    //         // Update preferensi_tempat_kuliner counts
    //         $this->updateMenuCounts($tempat_id);

    //         return redirect()->route('menus.index')
    //             ->with('success', "$addedCount menu berhasil ditambahkan.");
    //     } catch (\Throwable $e) {
    //         Log::error('Error saat menyimpan batch menu: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Gagal menyimpan data batch menu.');
    //     }
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'tempat_id' => 'required|exists:tempat_kuliner,tempat_id',
                'nama_menu' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
            ]);

            $menu = Menu::findOrFail($id);
            $oldTempatId = $menu->tempat_id;

            $menu->update([
                'tempat_id' => $request->tempat_id,
                'nama_menu' => $request->nama_menu,
                'deskripsi' => $request->deskripsi,
            ]);

            // Update menu counts if tempat_id has changed
            if ($oldTempatId != $request->tempat_id) {
                $this->updateMenuCounts($oldTempatId);
                $this->updateMenuCounts($request->tempat_id);
            } else {
                // Just update the current tempat's menu counts
                $this->updateMenuCounts($request->tempat_id);
            }

            return redirect()->route('menus.index')
                ->with('success', 'Menu berhasil diupdate.');
        } catch (\Throwable $e) {
            Log::error('Error saat update menu: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data menu.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $tempat_id = $menu->tempat_id;

            $menu->delete();

            // Update menu counts
            $this->updateMenuCounts($tempat_id);

            return redirect()->route('menus.index')
                ->with('success', 'Menu berhasil dihapus.');
        } catch (\Throwable $e) {
            Log::error('Error saat menghapus menu: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data menu.');
        }
    }

    /**
     * Update the menu counts in preferensi_tempat_kuliner.
     *
     * @param  int  $tempat_id
     * @return void
     */
    private function updateMenuCounts($tempat_id)
    {
        try {
            $tempatKuliner = TempatKuliner::with('preferensi')->findOrFail($tempat_id);

            if (!$tempatKuliner->preferensi) {
                Log::info("TempatKuliner dengan ID $tempat_id tidak memiliki preferensi.");
                return;
            }

            // Count makanan and minuman
            $makananCount = Menu::where('tempat_id', $tempat_id)
                ->where('deskripsi', 'like', '%makanan%')
                ->count();

            $minumanCount = Menu::where('tempat_id', $tempat_id)
                ->where('deskripsi', 'like', '%minuman%')
                ->count();

            // Update preferensi
            $tempatKuliner->preferensi->update([
                'jumlah_makanan' => $makananCount,
                'jumlah_minuman' => $minumanCount
            ]);

            Log::info("Berhasil update jumlah menu untuk TempatKuliner ID $tempat_id: Makanan=$makananCount, Minuman=$minumanCount");
        } catch (\Throwable $e) {
            Log::error('Error updating menu counts: ' . $e->getMessage());
        }
    }
}
