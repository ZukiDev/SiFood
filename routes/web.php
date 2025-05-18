<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TempatKulinerController;
use App\Http\Controllers\Landing\GuestPreferenceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index']);
Route::get('/preferensi', [GuestPreferenceController::class, 'index'])->name('preferensi.index');
Route::post('/preferensi', [GuestPreferenceController::class, 'store'])->name('preferensi.store');
Route::get('/preferensi/hasil/{id}', [GuestPreferenceController::class, 'hasil'])->name('preferensi.hasil');
Route::get('/preferensi/hasil/detail/{id}', [GuestPreferenceController::class, 'detail'])->name('preferensi.detail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'kategoris' => KategoriController::class,
        'kriterias' => KriteriaController::class,
        'menus' => MenuController::class,
        'tempat-kuliners' => TempatKulinerController::class,
    ]);
});
