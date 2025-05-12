@extends('layouts.app')

@section('title', 'Jasa Pembuatan Aplikasi Android dan iOS')

@push('styles')
<style>
    /* Core animations */
    .fade-in {opacity:0; transform:translateY(20px); transition:all 0.6s ease;}
    .fade-in.visible {opacity:1; transform:translateY(0);}
    
    /* Hero Section */
    .hero-section {
        background-image: url('/images/hero/mobile-app-hero.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
        min-height: 90vh;
        overflow: hidden;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(20,84,185,0.9) 0%, rgba(78,38,155,0.85) 50%, rgba(15,23,42,0.95) 100%);
        z-index: 1;
    }
    .hero-content {position:relative; z-index:2;}
    
    /* Feature Cards */
    .feature-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
    }
    .feature-card:hover {transform:translateY(-8px); box-shadow:0 15px 30px rgba(0,0,0,0.1);}
    
    /* Pricing card hover */
    .pricing-card {
        transition: all 0.3s ease;
    }
    .pricing-card:hover {
        transform: scale(1.03);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    /* CTA Section Specific Styles */
    .cta-section {
        perspective: 1000px;
    }

    /* Blob animations */
    @keyframes blob {
        0% { transform: scale(1); }
        33% { transform: scale(1.1) translate(5%, -5%); }
        66% { transform: scale(0.9) translate(-5%, 5%); }
        100% { transform: scale(1); }
    }

    .animate-blob {
        animation: blob 7s infinite ease-in-out;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    /* Platform icons */
    .platform-icon {
        width: 32px;
        height: 32px;
        transition: all 0.2s ease;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container mx-auto px-4 relative z-10 flex items-center min-h-[90vh]">
        <div class="w-full max-w-5xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <!-- Left Text Content -->
                <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                    <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                        <span class="hero-title-word block">JASA</span>
                        <span class="hero-title-word block">PEMBUATAN</span>
                        <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">APLIKASI</span>
                        <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">MOBILE</span>
                    </h1>                    
                    <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                        Bawa bisnis Anda ke genggaman pengguna dengan aplikasi mobile Android dan iOS yang inovatif dan user-friendly.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="layanan" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 fade-in">
            <h2 class="text-4xl font-bold mb-4">Layanan Aplikasi Mobile Kami</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Solusi aplikasi mobile yang dapat kami kembangkan untuk kebutuhan bisnis Anda</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 fade-in">
            <!-- Feature 1 -->
            <div class="feature-card bg-white shadow-md rounded-xl overflow-hidden">
                <div class="h-3 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                <div class="p-6">
                    <div class="w-16 h-16 rounded-lg bg-indigo-100 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Aplikasi Native</h3>
                    <p class="text-gray-600 mb-4">Aplikasi yang dikembangkan khusus untuk platform Android (Kotlin/Java) dan iOS (Swift) dengan performa optimal.</p>
                    <ul class="space-y-2 mb-6 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Performa tinggi
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Integrasi hardware
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            UX/UI custom
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="feature-card bg-white shadow-md rounded-xl overflow-hidden">
                <div class="h-3 bg-gradient-to-r from-purple-500 to-pink-600"></div>
                <div class="p-6">
                    <div class="w-16 h-16 rounded-lg bg-purple-100 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Aplikasi Cross-Platform</h3>
                    <p class="text-gray-600 mb-4">Aplikasi yang berjalan di Android dan iOS dengan satu codebase menggunakan Flutter, React Native, atau Xamarin.</p>
                    <ul class="space-y-2 mb-6 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Pengembangan lebih cepat
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Biaya lebih efisien
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Update serentak
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="feature-card bg-white shadow-md rounded-xl overflow-hidden">
                <div class="h-3 bg-gradient-to-r from-green-500 to-teal-600"></div>
                <div class="p-6">
                    <div class="w-16 h-16 rounded-lg bg-green-100 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Aplikasi Enterprise & IoT</h3>
                    <p class="text-gray-600 mb-4">Aplikasi bisnis kompleks dengan integrasi sistem internal, IoT, dan analitik data sesuai kebutuhan perusahaan.</p>
                    <ul class="space-y-2 mb-6 text-gray-600">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Integrasi backend
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Keamanan tingkat tinggi
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Analitik custom
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 fade-in">
            <h2 class="text-4xl font-bold mb-4">Daftar Harga Pengembangan Aplikasi</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Solusi aplikasi mobile terbaik sesuai dengan kebutuhan dan anggaran Anda</p>
        </div>
        
        <div class="flex flex-wrap justify-center fade-in">
            <div class="w-full">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Basic Package -->
                    <div class="pricing-card rounded-lg shadow-lg overflow-hidden">
                        <div class="bg-gray-100 p-6">
                            <h3 class="text-2xl font-bold text-center mb-2">Paket Starter</h3>
                            <div class="text-center">
                                <span class="text-4xl font-bold">Mulai dari<br>Rp 4.000.000</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Aplikasi 1 Platform (Android/iOS)
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Hingga 5 Screen Utama
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    UI/UX Standar
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Publikasi di App Store/Play Store
                                </li>
                            </ul>
                            <div class="mt-6">
                                <a href="#kontak" class="block text-center bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300">Pilih Paket</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Business Package -->
                    <div class="pricing-card rounded-lg shadow-lg overflow-hidden border-2 border-indigo-500">
                        <div class="bg-indigo-600 p-6">
                            <div class="absolute top-0 right-0 mt-4 mr-4 bg-yellow-400 text-xs font-bold px-3 py-1 rounded-full uppercase">Terpopuler</div>
                            <h3 class="text-2xl font-bold text-center mb-2 text-white">Paket Business</h3>
                            <div class="text-center">
                                <span class="text-4xl font-bold text-white">Mulai dari<br>Rp 6.000.000</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Android & iOS (Cross-Platform)
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Hingga 10 Screen Custom
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    UI/UX Premium
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Backend/API Integration
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Sistem Login/User Management
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Dukungan Teknis 3 Bulan
                                </li>
                            </ul>
                            <div class="mt-6">
                                <a href="#kontak" class="block text-center bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300">Pilih Paket</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enterprise Package -->
                    <div class="pricing-card rounded-lg shadow-lg overflow-hidden">
                        <div class="bg-gray-100 p-6">
                            <h3 class="text-2xl font-bold text-center mb-2">Paket Enterprise</h3>
                            <div class="text-center">
                                <span class="text-4xl font-bold">Mulai dari<br>Rp 8.000.000</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Native Apps (Android & iOS)
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Unlimited Screens
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Custom UI/UX Eksklusif
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Full Backend Development
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Integrasi Sistem & API
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Fitur IoT & Advanced
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Dukungan & Maintenance 6 Bulan
                                </li>
                            </ul>
                            <div class="mt-6">
                                <a href="#kontak" class="block text-center bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300">Konsultasi Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="contact" class="cta-section py-24 relative overflow-hidden">
    <!-- Background elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-700 to-purple-800 z-0"></div>
    <div class="cta-blob absolute -right-64 -bottom-64 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob z-1"></div>
    <div class="cta-blob absolute -left-32 -top-32 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000 z-1"></div>
    <div class="cta-blob absolute right-20 top-20 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000 z-1"></div>

    <!-- Content Container -->
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto">
            <!-- Card design -->
            <div class="cta-card bg-white/10 backdrop-blur-lg rounded-3xl p-2 shadow-2xl border border-white/20">
                <div class="inner-card bg-gradient-to-br from-indigo-900/50 to-purple-900/50 rounded-2xl p-8 md:p-12">
                    <div class="text-center mb-10">
                        <h2 class="cta-title text-4xl md:text-5xl font-bold mb-6 text-white">
                            <span class="inline-block">Siap Untuk Memulai</span>
                            <span class="inline-block ml-2 relative">
                                Proyek Anda?
                                <svg class="absolute -bottom-3 left-0 w-full" height="6" viewBox="0 0 100 6" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.5 3C20 -1 40 8 50 3C60 -2 80 6 100 3" stroke="#4F46E5" stroke-width="5" fill="none" stroke-linecap="round"/>
                                </svg>
                            </span>
                        </h2>
                        <p class="cta-description text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                            Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik untuk proyek website Anda.
                        </p>
                    </div>
                    
                    <!-- CTA Button -->
                    <div class="text-center">
                        <div class="cta-button-wrapper inline-block relative">
                            <button id="ctaButton" class="cta-button relative px-8 py-4 bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-500 hover:to-blue-400 text-white font-semibold text-lg rounded-full shadow-lg hover:shadow-indigo-500/50 transform transition-all hover:-translate-y-1 active:translate-y-0 overflow-hidden group">
                                <span class="relative z-10 flex items-center justify-center space-x-2">
                                    <span>Mulai Konsultasi Gratis</span>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Fade In Animation
    document.addEventListener('DOMContentLoaded', function() {
        const fadeElements = document.querySelectorAll('.fade-in');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {threshold: 0.1});
        
        fadeElements.forEach(element => {
            observer.observe(element);
        });
    });
</script>
@endpush

@endsection