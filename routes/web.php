<?php

use App\Models\Karir;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LamaranController;


// Beranda
Route::get('/', function () {
    return view('home');
})->name('beranda');

// Layanan dan submenu
Route::prefix('layanan')->group(function () {
    Route::get('/', function () {
        return view('layanan.index');
    })->name('layanan');
    
    Route::get('/website-development', function () {
        return view('layanan.web');
    })->name('layanan.web');
    
    Route::get('/mobile-app-development', function () {
        return view('layanan.apk');
    })->name('layanan.apk');
    
    Route::get('/ui-ux-brand-design', function () {
        return view('layanan.design');
    })->name('layanan.design');
    
    Route::get('/iot', function () {
        return view('layanan.iot');
    })->name('layanan.iot');
    
    Route::get('/sosial-media-ads', function () {
        return view('layanan.seo');
    })->name('layanan.seo');
});

// Portfolio
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

// Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

// Karir
Route::get('/karir', function () {
    $lokerList = Karir::all();
    return view('karir', compact('lokerList'));
})->name('karir');
// Blog
Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Halaman konsultasi
Route::get('/konsultasi', function () {
    return view('konsultasi');
})->name('konsultasi');

Route::get('/karir/{id?}', [LamaranController::class, 'showForm'])->name('karir'); // Menampilkan form lamaran
Route::post('/lamaran', [LamaranController::class, 'store'])->name('lamaran.store'); // Proses penyimpanan lamaran
Route::get('/lamaran/form/{id?}', [LamaranController::class, 'showForm'])->name('lamaran.form'); // Menampilkan form lamaran dengan nama route 'lamaran.form'an
