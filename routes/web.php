<?php

use App\Models\Karir;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LamaranController;

// Beranda
Route::get('/', function () {
    return view('home', [
        'meta_title' => 'Beranda | Ardhan Creative',
        'meta_description' => 'Selamat datang di Ardhan Creative — solusi kreatif untuk desain, web, aplikasi, dan digital marketing.'
    ]);
})->name('beranda');

// Layanan dan submenu
Route::prefix('layanan')->group(function () {
    Route::get('/', function () {
        return view('layanan.index', [
            'meta_title' => 'Layanan Kami | Ardhan Creative',
            'meta_description' => 'Jelajahi layanan lengkap kami mulai dari pengembangan website, aplikasi mobile, hingga desain UI/UX.'
        ]);
    })->name('layanan');

    Route::get('/website-development', function () {
        return view('layanan.web', [
            'meta_title' => 'Website Development | Ardhan Creative',
            'meta_description' => 'Kami membuat website profesional dan responsif untuk mendukung bisnis Anda secara online.'
        ]);
    })->name('layanan.web');

    Route::get('/mobile-app-development', function () {
        return view('layanan.apk', [
            'meta_title' => 'Mobile App Development | Ardhan Creative',
            'meta_description' => 'Pengembangan aplikasi Android/iOS custom untuk meningkatkan engagement bisnis Anda.'
        ]);
    })->name('layanan.apk');

    Route::get('/ui-ux-brand-design', function () {
        return view('layanan.design', [
            'meta_title' => 'UI/UX & Brand Design | Ardhan Creative',
            'meta_description' => 'Tingkatkan identitas visual bisnis Anda dengan desain UI/UX dan branding profesional.'
        ]);
    })->name('layanan.design');

    Route::get('/iot', function () {
        return view('layanan.iot', [
            'meta_title' => 'IoT Solutions | Ardhan Creative',
            'meta_description' => 'Integrasi perangkat Internet of Things untuk otomasi dan efisiensi bisnis Anda.'
        ]);
    })->name('layanan.iot');

    Route::get('/sosial-media-ads', function () {
        return view('layanan.seo', [
            'meta_title' => 'Social Media & SEO Ads | Ardhan Creative',
            'meta_description' => 'Jangkau audiens lebih luas dengan kampanye iklan sosial media dan optimasi mesin pencari.'
        ]);
    })->name('layanan.seo');
});

// Portfolio
Route::get('/portfolio', function () {
    return view('portfolio', [
        'meta_title' => 'Portfolio | Ardhan Creative',
        'meta_description' => 'Lihat hasil kerja kami untuk berbagai klien dari berbagai industri.'
    ]);
})->name('portfolio');

// Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang-kami', [
        'meta_title' => 'Tentang Kami | Ardhan Creative',
        'meta_description' => 'Kenali lebih dekat Ardhan Creative — tim kreatif yang siap mendukung kesuksesan digital Anda.'
    ]);
})->name('tentang-kami');

// Karir
Route::get('/karir', function () {
    $lokerList = Karir::all();
    return view('karir', [
        'lokerList' => $lokerList,
        'meta_title' => 'Karir | Ardhan Creative',
        'meta_description' => 'Bergabunglah bersama Ardhan Creative dan tumbuh bersama kami dalam dunia industri kreatif digital.'
    ]);
})->name('karir');

// Blog
Route::get('/blog', function () {
    return view('blog', [
        'meta_title' => 'Blog | Ardhan Creative',
        'meta_description' => 'Baca artikel dan insight seputar teknologi, desain, dan pemasaran digital.'
    ]);
})->name('blog');

// Konsultasi
Route::get('/konsultasi', function () {
    return view('konsultasi', [
        'meta_title' => 'Konsultasi Gratis | Ardhan Creative',
        'meta_description' => 'Diskusikan kebutuhan digital bisnis Anda bersama tim profesional kami secara gratis.'
    ]);
})->name('konsultasi');

// Lamaran (tidak perlu diubah jika sudah pakai controller)
Route::get('/karir/{id?}', [LamaranController::class, 'showForm'])->name('karir');
Route::post('/lamaran', [LamaranController::class, 'store'])->name('lamaran.store');
Route::get('/lamaran/form/{id?}', [LamaranController::class, 'showForm'])->name('lamaran.form');
