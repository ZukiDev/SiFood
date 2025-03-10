<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TempatKulinerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.landing');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::resources([
        'kategoris' => KategoriController::class,
        'kriterias' => KriteriaController::class,
        'menus' => MenuController::class,
        'tempat-kuliners' => TempatKulinerController::class,
    ]);
});
