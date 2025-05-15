@extends('layouts.app')

@section('title', 'Jasa Pembuatan Prototype IoT')

@section('meta_description', 'Ardhan Creative menyediakan jasa pembuatan website profesional di Pati. Cepat, responsif, dan SEO friendly.')

@section('meta_keywords', 'jasa pembuatan website, web development pati, jasa web pati')

@push('styles')
<style>
    /* Core animations */
    .fade-in {opacity:0; transform:translateY(20px); transition:all 0.6s ease;}
    .fade-in.visible {opacity:1; transform:translateY(0);}
    
    /* Hero Section */
    .hero-section {
        background-image: url('/images/hero/iot-hero.jpg');
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
        background: linear-gradient(to bottom, rgba(30,64,175,0.9) 0%, rgba(88,28,135,0.85) 50%, rgba(15,23,42,0.95) 100%);
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
    
    /* IOT Specific Styles */
    .iot-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        margin-bottom: 1rem;
    }
    
    /* CTA Section */
    .cta-section {
        perspective: 1000px;
    }
    .cta-card {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
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
                        <span class="hero-title-word block">PROTOTYPE</span>
                        <span class="hero-title-word block">IOT</span>
                        <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">CUSTOM</span>
                        <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">UNTUK BISNIS ANDA</span>
                    </h1>                    
                    <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                        Wujudkan ide IoT Anda menjadi prototype fungsional dengan dukungan tim ahli hardware dan software kami.
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
            <h2 class="text-4xl font-bold mb-4">Layanan IoT Prototyping</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Solusi end-to-end dari konsep hingga produk fungsional</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 fade-in">
            <!-- Feature 1 -->
            <div class="feature-card bg-white p-8 rounded-xl">
                <div class="iot-icon bg-blue-100 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Hardware Development</h3>
                <p class="text-gray-600 mb-4">
                    Desain dan pembuatan papan sirkuit cetak (PCB) custom dengan komponen terbaik untuk kebutuhan spesifik Anda.
                </p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Pemilihan komponen optimal</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Desain PCB profesional</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Prototyping cepat</span>
                    </li>
                </ul>
            </div>
            
            <!-- Feature 2 -->
            <div class="feature-card bg-white p-8 rounded-xl">
                <div class="iot-icon bg-purple-100 text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Firmware Development</h3>
                <p class="text-gray-600 mb-4">
                    Pengembangan firmware efisien untuk mikrokontroler dengan fitur IoT seperti WiFi, Bluetooth, atau LoRa.
                </p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>ESP32, Arduino, Raspberry Pi</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Optimasi daya rendah</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Konektivitas nirkabel</span>
                    </li>
                </ul>
            </div>
            
            <!-- Feature 3 -->
            <div class="feature-card bg-white p-8 rounded-xl">
                <div class="iot-icon bg-green-100 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4">Cloud & Dashboard</h3>
                <p class="text-gray-600 mb-4">
                    Sistem cloud untuk mengumpulkan, menyimpan, dan memvisualisasikan data dari perangkat IoT Anda.
                </p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Integrasi MQTT/HTTP</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Dashboard real-time</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Notifikasi & alert</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Pilih Paket Anda</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Temukan solusi IoT yang sesuai dengan kebutuhan bisnis Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 text-center hover:scale-105 transition-transform duration-300">
                <h3 class="text-2xl font-bold mb-4">Paket Dasar</h3>
                <div class="mb-6">
                    <span class="text-4xl font-bold">Mulai dari<br>Rp 500.000</span>
                </div>
                <ul class="mb-8 space-y-4 text-gray-600">
                    <li>Konsultasi Awal</li>
                    <li>Desain Sederhana</li>
                    <li>Prototype Dasar</li>
                    <li>1x Revisi</li>
                </ul>
                <button class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition-colors">
                    Pilih Paket Dasar
                </button>
            </div>

            <!-- Advanced Plan -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 text-center hover:scale-105 transition-transform duration-300 transform">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-indigo-600 text-white px-4 py-1 rounded-full text-sm">
                    Paling Populer
                </div>
                <h3 class="text-2xl font-bold mb-4">Paket Profesional</h3>
                <div class="mb-6">
                    <span class="text-4xl font-bold">Mulai dari<br>Rp 1.000.000</span>
                </div>
                <ul class="mb-8 space-y-4 text-gray-600">
                    <li>Konsultasi Mendalam</li>
                    <li>Desain Kompleks</li>
                    <li>Prototype Lengkap</li>
                    <li>3x Revisi</li>
                    <li>Dukungan Teknis</li>
                </ul>
                <button class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition-colors">
                    Pilih Paket Profesional
                </button>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-8 text-center hover:scale-105 transition-transform duration-300">
                <h3 class="text-2xl font-bold mb-4">Paket Enterprise</h3>
                <div class="mb-6">
                    <span class="text-4xl font-bold">Custom</span>
                    <span class="text-gray-600 block">Sesuai Kebutuhan</span>
                </div>
                <ul class="mb-8 space-y-4 text-gray-600">
                    <li>Konsultasi Eksklusif</li>
                    <li>Desain Kustom</li>
                    <li>Solusi End-to-End</li>
                    <li>Unlimited Revisi</li>
                    <li>Dukungan Prioritas</li>
                </ul>
                <button class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition-colors">
                    Hubungi Tim Kami
                </button>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="contact" class="cta-section py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-700 to-purple-800 z-0"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto">
            <div class="cta-card rounded-3xl p-2">
                <div class="inner-card bg-gradient-to-br from-indigo-900/50 to-purple-900/50 rounded-2xl p-8 md:p-12">
                    <div class="text-center mb-10">
                        <h2 class="cta-title text-4xl md:text-5xl font-bold mb-6 text-white">
                            <span class="inline-block">Siap Mewujudkan</span>
                            <span class="inline-block ml-2 relative">
                                Ide IoT Anda?
                            </span>
                        </h2>
                        <p class="cta-description text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                            Konsultasikan kebutuhan IoT Anda dengan tim ahli kami dan dapatkan solusi terbaik.
                        </p>
                    </div>
                    
                    <div class="text-center">
                        <button id="ctaButton" class="relative px-8 py-4 bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-500 hover:to-blue-400 text-white font-semibold text-lg rounded-full shadow-lg hover:shadow-indigo-500/50 transform transition-all hover:-translate-y-1 active:translate-y-0">
                            <span class="relative z-10 flex items-center justify-center space-x-2">
                                <span>Konsultasi Gratis</span>
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
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hero animations
    function animateHero() {
        const elements = [
            ...document.querySelectorAll('.hero-title-word'),
            document.querySelector('.hero-description')
        ];

        elements.forEach((el, i) => {
            if (el) {
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 300 + i * 100);
            }
        });
    }
    
    // Scroll animations
    function initScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    }

    // CTA Button action
    const ctaButton = document.getElementById('ctaButton');
    if (ctaButton) {
        ctaButton.addEventListener('click', function() {
            window.location.href = '/kontak';
        });
    }

    // Initialize
    animateHero();
    initScrollAnimations();
});
</script>
@endpush