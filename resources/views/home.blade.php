@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
<style>
     /* Hero Section with Background Image */
    .hero-section {
        background-image: url('/images/hero/layer2.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, 
                rgba(30, 64, 175, 0.9) 0%, 
                rgba(88, 28, 135, 0.85) 50%, 
                rgba(15, 23, 42, 0.95) 100%);
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-title span {
        display: inline-block;
        opacity: 0;
        transform: translateY(30px);
    }
    
    .hero-description {
        opacity: 0;
        transform: translateY(20px);
    }
    
    .hero-buttons {
        opacity: 0;
    }
    
    .hero-images img {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    
    /* CTA Section with Background Image */
    .cta-section {
        background-image: url('/images/backgrounds/tech-pattern.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.9) 0%, rgba(67, 56, 202, 0.95) 100%);
        z-index: 1;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
    }
    
    .cta-title {
        opacity: 0;
        transform: translateY(20px);
    }
    
    .cta-description {
        opacity: 0;
        transform: translateY(20px);
    }
    
    .cta-counters {
        opacity: 0;
    }
    
    .cta-form {
        opacity: 0;
        transform: translateX(30px);
    }
    
    .cta-form-input {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .cta-form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
    
    /* Particle animation */
    .particles-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }
    
    .particle {
        position: absolute;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        pointer-events: none;
    }
    /* Base Animation & Effects */
    .reveal-element {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }
    .reveal-element.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Hero Section */
    .hero-gradient {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    }
    
    /* Service Cards */
    .service-card {
        transition: all 0.4s ease;
    }
    .service-card:hover {
        transform: translateY(-10px);
    }
    
    /* Client Logos */
    .logo-container {
        display: flex;
        overflow: hidden;
        width: 100%;
    }

    .logo-slider {
        display: flex;
        animation: marquee 20s linear infinite;
        width: 200%; /* Make room for duplicate logos */
    }

    .logo-slider:hover {
        animation-play-state: paused;
    }

    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); } /* Move exactly half of the width */
    }

    /* Ensure items don't get squished on mobile */
    .logo-slider > div {
        min-width: 150px;
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .logo-slider > div {
            min-width: 120px;
        }
    }
    
    /* Counter Animation */
    .counter {
        transition: all 0.5s ease;
    }
    
    /* Testimonials */
    .testimonial-card {
        transition: all 0.3s ease;
    }
    .testimonial-card:hover {
        transform: translateY(-5px);
    }

    /* CTA Section */
    .cta-button {
        transition: all 0.3s ease;
    }
    .cta-button:hover {
        transform: translateY(-3px);
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .animate-fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
    }
    
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }

    /* Custom animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes scaleX {
        from {
            transform: scaleX(0);
        }
        to {
            transform: scaleX(1);
        }
    }
    
    @keyframes pulseSlow {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    @keyframes bounceSlow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    @keyframes spinSlow {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    @keyframes tadaSlow {
        0% {
            transform: scale(1);
        }
        10%, 20% {
            transform: scale(0.9) rotate(-3deg);
        }
        30%, 50%, 70%, 90% {
            transform: scale(1.1) rotate(3deg);
        }
        40%, 60%, 80% {
            transform: scale(1.1) rotate(-3deg);
        }
        100% {
            transform: scale(1) rotate(0);
        }
    }
    
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
        70% {
            transform: scale(0.9);
        }
        100% {
            transform: scale(1);
        }
    }
    
    /* Animation classes */
    .animate-fade-in-down {
        animation: fadeInDown 1s ease-out forwards;
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out forwards;
    }
    
    .animate-fade-in-left {
        animation: fadeInLeft 1s ease-out forwards;
    }
    
    .animate-fade-in-right {
        animation: fadeInRight 1s ease-out forwards;
    }
    
    .animate-scale-x {
        animation: scaleX 0.8s ease-out forwards;
    }
    
    .animate-pulse-slow {
        animation: pulseSlow 3s infinite;
    }
    
    .animate-bounce-slow {
        animation: bounceSlow 3s infinite;
    }
    
    .animate-spin-slow {
        animation: spinSlow 8s linear infinite;
    }
    
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
    
    .animate-tada-slow {
        animation: tadaSlow 2s ease-in-out infinite;
    }
    
    .animate-bounce-in {
        animation: bounceIn 1s ease-out forwards;
    }
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section relative min-h-screen overflow-hidden">
        <div class="particles-container"></div>
        <div class="container mx-auto px-4 relative z-10 flex items-center min-h-screen">
            <div class="w-full max-w-5xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center">
                    <!-- Left Text Content -->
                    <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-white bg-opacity-10 backdrop-filter backdrop-blur-sm border border-white border-opacity-20 mb-4 hero-badge">
                            <span class="w-3 h-3 rounded-full bg-blue-400 mr-2"></span>
                            <span class="text-sm font-medium">Solusi Digital</span>
                        </div>
                        
                        <h1 class="text-5xl md:text-7xl font-bold leading-tight hero-title">
                            <span class="hero-title-word">TRANSFORM YOUR</span>
                            <span class="hero-title-word">BRAND,</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">ELEVATE</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">YOURE</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">FUTURE.</span>
                        </h1>
                        
                        <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                            Transformasi digital yang membawa brand Anda lebih kuat, relevan, dan siap hadapi Era Digital.<br><strong>Trasformasi digital dimulai dari sini !</strong>
                        </p>
                        
                        <div class="flex flex-wrap gap-6 mt-4 hero-buttons">
                            <a href="https://wa.me/6282227121942" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="px-8 py-4 rounded-full bg-white text-blue-800 font-medium shadow-lg hover:shadow-blue-500/30 hover:scale-105 transition-all">
                            Konsultasi Gratis
                            </a>

                            <a href="{{ route('portfolio') }}" class="px-8 py-4 rounded-full border border-white font-medium text-white hover:bg-white hover:bg-opacity-10 transition-all">
                                Lihat Portfolio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Client Logo Slider -->
   @php
    $clients = App\Models\Klien::all();
    @endphp

        <section class="py-10 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 inline-block relative pb-2">
                        Klien Kami
                        <!-- Garis biru muda -->
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-blue-200 rounded-full"></span>
                    </h2>
                </div>
                <div class="logo-container">
                    <div class="logo-slider">
                        @foreach($clients as $client)
                        <div class="px-4 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->klien }}"
                                class="h-16 w-auto object-contain grayscale hover:grayscale-0 transition-all" loading="lazy">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    <!-- Layanan Utama -->
    @php
        use App\Models\Layanan;
        $layanans = Layanan::all();
    @endphp

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Layanan Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Solusi digital komprehensif untuk membantu bisnis Anda tumbuh lebih cepat</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 reveal-element">
                @foreach($layanans as $layanan)
                <div class="service-card bg-gradient-to-b from-transparent to-black relative rounded-lg overflow-hidden group h-96">
                    <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="{{ $layanan->layanan }}" class="w-full h-full object-cover absolute inset-0" loading="lazy">
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 transition-all"></div>
                    <div class="relative z-10 flex flex-col justify-end h-full p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $layanan->layanan }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Proses Kerja Sama -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Alur Produksi di Ardhan Creative</h2>
            </div>

            <div class="relative">
                <div class="mb-16">
                    <h3 class="text-4xl font-light text-gray-400 mb-10">Tahap Pra Produksi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach([
                            '01' => 'Perancangan dan Diskusi Konsep',
                            '02' => 'Analisis Kebutuhan dan Fitur',
                            '03' => 'Spesifikasi Sistem',
                            '04' => 'Kesepakatan SLA'
                        ] as $num => $title)
                        <div class="bg-white p-6 rounded-lg shadow-sm reveal-element">
                            <div class="text-xl font-semibold text-gray-500 mb-2">{{ $num }}</div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $title }}</h4>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="flex justify-end mt-4">
                        <div class="bg-gray-200 p-6 rounded-lg shadow-sm reveal-element max-w-xs">
                            <div class="text-xl font-semibold text-gray-500 mb-2">05</div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2"> Persetujuan dan Deal Proyek</h4>
                        </div>
                    </div>
                </div>
                
                <div class="mb-16">
                    <h3 class="text-4xl font-light text-gray-400 mb-10">Tahap Produksi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach([
                            '09' => 'Desain UI/UX',
                            '08' => 'Pemrograman',
                            '07' => 'Testing',
                            '06' => 'Revisi & Finalisasi'
                        ] as $num => $title)
                        <div class="bg-white p-6 rounded-lg shadow-sm reveal-element">
                            <div class="text-xl font-semibold text-gray-500 mb-2">{{ $num }}</div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $title }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div>
                    <h3 class="text-4xl font-light text-gray-400 mb-10">Tahap Pasca Produksi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach([
                            '13' => 'Deployment',
                            '12' => 'Pelatihan & Serah Terima',
                            '11' => 'Monitoring Awal',
                            '10' => 'Dukungan & Pemeliharaan'
                        ] as $num => $title)
                        <div class="{{ $num == '10' ? 'bg-blue-600 text-white' : 'bg-white' }} p-6 rounded-lg shadow-sm reveal-element">
                            <div class="text-xl font-semibold mb-2">{{ $num }}</div>
                            <h4 class="text-xl font-semibold mb-2">{{ $title }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section Kenapa Memilih Kami -->
    <section id="why-choose-us" class="why-choose-us py-16 bg-gray-50 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 transform transition-all duration-500 ease-in-out hover:scale-105">
                <h2 class="text-3xl font-bold mb-4 text-gray-800 animate-fade-in-down">Kenapa Memilih Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 animate-scale-x"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto animate-fade-in-up">Kami hadir untuk memberikan solusi yang unggul, inovatif, dan berkualitas untuk mendukung kesuksesan bisnis Anda. Inilah alasan kenapa kami pilihan terbaik untuk Anda!</p>
            </div>
            
            <!-- First row - 3 cards (Acak) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <!-- Card 1: Inovatif -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-left">
                    <div class="flex items-center p-6">
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-pulse-slow">
                            <div class="w-full h-full bg-blue-100 rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/hero/inovatif.png') }}" alt="Inovatif Icon" class="w-16 h-16" loading="lazy" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Inovatif</h3>
                            <p class="text-gray-600">Kami selalu berinovasi untuk memberikan solusi yang segar dan sesuai dengan perkembangan terkini.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Berkualitas -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-down">
                    <div class="flex items-center p-6">
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-bounce-slow">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/hero/kualitas.jpg') }}" alt="Berkualitas Icon" class="w-16 h-16" loading="lazy" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-white">Berkualitas</h3>
                            <p class="text-white">Kami selalu mengutamakan kualitas tinggi dalam setiap pekerjaan untuk memberikan dampak positif pada brand Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Handal -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-right">
                    <div class="flex items-center p-6">
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-spin-slow">
                            <div class="w-full h-full bg-blue-100 rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/hero/percaya.jpg') }}" alt="Handal Icon" class="w-16 h-16" loading="lazy" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Handal</h3>
                            <p class="text-gray-600">Kami memastikan setiap proyek dikelola dengan penuh pengawasan untuk hasil yang dapat diandalkan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second row - 3 cards (Acak) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <!-- Card 4: Cepat -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-left">
                    <div class="flex items-center p-6">
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-pulse-slow">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/hero/respon.jpg') }}" alt="Cepat Icon" class="w-16 h-16" loading="lazy" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-white">Cepat</h3>
                            <p class="text-white">Dengan pendekatan agile, kami memberikan respon yang cepat dan solusi yang tepat waktu.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5: Kreatif -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-down">
                    <div class="flex items-center p-6">
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-bounce-slow">
                            <div class="w-full h-full bg-blue-100 rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/hero/kreatif.png') }}" alt="Kreatif Icon" class="w-16 h-16" loading="lazy" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Kreatif</h3>
                            <p class="text-gray-600">Kami menghadirkan solusi kreatif yang berbeda dan penuh inspirasi untuk brand Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Profesional -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-right">
                    <div class="flex items-center p-6">
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-spin-slow">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/hero/pro.jpg') }}" alt="Profesional Icon" class="w-16 h-16" loading="lazy" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-white">Profesional</h3>
                            <p class="text-white">Tim kami terdiri dari para ahli yang berdedikasi untuk hasil berkualitas tinggi.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Apa Kata Klien</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Testimoni dari mereka yang telah merasakan manfaat layanan kami</p>
            </div>

            <div class="max-w-4xl mx-auto reveal-element">
                <div class="testimonial-slider overflow-hidden">
                    <div id="testimonial-container" class="flex transition-all duration-500">
                        <!-- Testimonials will be generated by JS -->
                    </div>
                </div>
                
                <div class="flex justify-center mt-10 gap-2">
                    <button id="prev-btn" class="p-3 rounded-full bg-gray-100 hover:bg-blue-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <div id="pagination" class="flex items-center gap-2">
                        <!-- Pagination dots will be generated by JS -->
                    </div>
                    <button id="next-btn" class="p-3 rounded-full bg-gray-100 hover:bg-blue-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-24 relative overflow-hidden">
        <div class="particles-container"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <!-- Text Content -->
                <div class="lg:w-1/2 mb-10 lg:mb-0 text-center lg:text-left cta-content">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white leading-tight cta-title">
                        <span class="block">Siap <span class="text-yellow-300">Transformasi</span></span>
                        <span class="block"><span class="text-yellow-300">Digital</span> Bisnis Anda?</span>
                    </h2>
                    <p class="text-xl text-blue-100 mb-8 max-w-lg mx-auto lg:mx-0 cta-description">
                        Konsultasikan kebutuhan bisnis Anda dengan tim ahli kami untuk solusi terbaik.
                    </p>
                    
                    <!-- Counters -->
                    <div class="grid grid-cols-3 gap-4 mb-10 cta-counters">
                        @foreach([
                            '50' => '++ Proyek Selesai',
                            '45' => '++ Klien Puas',
                            '5' => '++ Ahli'
                        ] as $count => $label)
                        <div class="counter-item">
                            <span class="text-4xl font-bold text-white counter" data-target="{{ $count }}">0</span>
                            <span class="text-lg text-blue-200 block">{{ $label }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Form Card -->
                <div class="lg:w-5/12 w-full cta-form">
                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Mulai Proyek Anda</h3>
                        
                        <form id="cta-form">
                            <div class="mb-4">
                                <label class="text-gray-700 mb-2 block">Nama Anda</label>
                                <input type="text" placeholder="Masukkan nama lengkap" class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none">
                            </div>
                            
                            <div class="mb-4">
                                <label class="text-gray-700 mb-2 block">Email</label>
                                <input type="email" placeholder="email@perusahaan.com" class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none">
                            </div>
                            
                            <div class="mb-6">
                                <label class="text-gray-700 mb-2 block">Jenis Layanan</label>
                                <select class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none">
                                    <option value="">Pilih layanan yang dibutuhkan</option>
                                    <option value="web">Web Development</option>
                                    <option value="app">Mobile Development</option>
                                    <option value="seo">SEO</option>
                                    <option value="design">UI/UX & Brand Design</option>
                                    <option value="sosmedads">Sosial Media ADS</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="cta-button w-full bg-blue-600 text-white font-medium py-3 rounded-lg hover:bg-blue-700 transform transition-all">
                                Konsultasi Gratis
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll reveal animation
        const setupRevealElements = function() {
            const revealElements = document.querySelectorAll('.reveal-element');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.1 });
            
            revealElements.forEach(element => {
                observer.observe(element);
            });
        };
        setupRevealElements();
        
        // Testimonial slider
        const setupTestimonials = function() {
            const testimonials = [
                {
                    name: "Poltekkes Kemenkes Semarang",
                    position: "Ruang Radiologi",
                    image: "/images/testi/1.jpg",
                    text: "Kerja sama yang sangan memuaskan dengan Ardhan Creative dalam pembuatan sistem IOT untuk kontrol dan monitor suhu ruangan radiolgi di poltekkes kemenkes semarang",
                    rating: 5
                },
                {
                    name: "Dinas Sosial P3AKB",
                    position: "Subbag",
                    image: "/images/testi/2.jpg",
                    text: "Aplikasi absensi mahasiswa magang yang diciptakan Ardhan Creative sangat membantu kita dalam melakukan rekap kehadiran pserta magang di kantor kami.",
                    rating: 5
                },
                {
                    name: "Andi Rahman",
                    position: "Founder Startup",
                    image: "/images/testi/3.jpg",
                    text: "Logo yang di ciptakan oleh Ardhan Creative untuk usaha kami sangat elegan dan moderen, layanan yang diberikan sangat baik.",
                    rating: 4
                },
                {
                    name: "Amran Hadi",
                    position: "Founder UMKM",
                    image: "/images/testi/4.jpg",
                    text: "Layanan SEO yang luar biasa! Kami sekarang berada di halaman pertama Google untuk keyword utama.",
                    rating: 5
                }
            ];
            
            const testimonialContainer = document.getElementById('testimonial-container');
            const pagination = document.getElementById('pagination');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            
            if (testimonialContainer && pagination && prevBtn && nextBtn) {
                let currentIndex = 0;
                let autoSlideInterval;
                
                // Generate testimonial cards
                testimonials.forEach((testimonial, index) => {
                    const testimonialCard = document.createElement('div');
                    testimonialCard.className = 'testimonial-card min-w-full px-4';
                    
                    let starsHTML = '';
                    for (let i = 0; i < 5; i++) {
                        starsHTML += `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ${i < testimonial.rating ? 'text-yellow-400' : 'text-gray-300'}" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>`;
                    }
                    
                    testimonialCard.innerHTML = `
                        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                            <div class="flex items-center mb-6">
                                <img src="${testimonial.image}" alt="${testimonial.name}" class="w-16 h-16 rounded-full object-cover mr-4" loading="lazy">
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-900">${testimonial.name}</h4>
                                    <p class="text-gray-600">${testimonial.position}</p>
                                </div>
                            </div>
                            <div class="flex mb-4">
                                ${starsHTML}
                            </div>
                            <blockquote class="text-gray-700 italic">
                                "${testimonial.text}"
                            </blockquote>
                        </div>
                    `;
                    
                    testimonialContainer.appendChild(testimonialCard);
                    
                    // Add pagination dot
                    const dot = document.createElement('button');
                    dot.className = `w-3 h-3 rounded-full ${index === 0 ? 'bg-blue-500' : 'bg-gray-300'}`;
                    dot.addEventListener('click', () => {
                        goToSlide(index);
                    });
                    pagination.appendChild(dot);
                });
                
                // Testimonial slider navigation
                function updateSlider() {
                    testimonialContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
                    
                    // Update pagination dots
                    const dots = pagination.querySelectorAll('button');
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.remove('bg-gray-300');
                            dot.classList.add('bg-blue-500');
                        } else {
                            dot.classList.remove('bg-blue-500');
                            dot.classList.add('bg-gray-300');
                        }
                    });
                }
                
                function goToSlide(index) {
                    currentIndex = index;
                    updateSlider();
                    resetAutoSlide();
                }
                
                function resetAutoSlide() {
                    clearInterval(autoSlideInterval);
                    autoSlideInterval = setInterval(() => {
                        currentIndex = (currentIndex + 1) % testimonials.length;
                        updateSlider();
                    }, 5000);
                }
                
                prevBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
                    updateSlider();
                    resetAutoSlide();
                });
                
                nextBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % testimonials.length;
                    updateSlider();
                    resetAutoSlide();
                });
                
                // Start auto slide
                resetAutoSlide();
            }
        };
        setupTestimonials();
        
        // Counter animation
        const setupCounters = function() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const target = counter.getAttribute('data-target') || counter.getAttribute('data-count');
                if (!target) return;
                
                const numTarget = +target;
                const increment = numTarget / 200;
                
                let currentCount = 0;
                const updateCount = () => {
                    if (currentCount < numTarget) {
                        currentCount += increment;
                        counter.innerText = Math.ceil(currentCount);
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = numTarget;
                    }
                };
                
                updateCount();
            });
        };
        
        // Initialize counters when they come into view
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setupCounters();
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        document.querySelectorAll('.counter-section, .cta-section, .why-choose-us').forEach(section => {
            counterObserver.observe(section);
        });
    });
     document.addEventListener('DOMContentLoaded', function() {
        // Add these to your existing DOMContentLoaded function
        
        // Hero section animations
        setTimeout(() => {
            animateHeroSection();
            createParticles();
        }, 100);
        
        // CTA section animations
        const ctaSection = document.querySelector('.cta-section');
        if (ctaSection) {
            const ctaObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCTASection();
                        ctaObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });
            
            ctaObserver.observe(ctaSection);
        }
    });

    // Hero Section Animation
    function animateHeroSection() {
        // Animate badge
        const heroBadge = document.querySelector('.hero-badge');
        if (heroBadge) {
            heroBadge.style.opacity = '0';
            heroBadge.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                heroBadge.style.transition = 'all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1)';
                heroBadge.style.opacity = '1';
                heroBadge.style.transform = 'translateY(0)';
            }, 200);
        }
        
        // Animate title words with delay
        const titleWords = document.querySelectorAll('.hero-title-word');
        titleWords.forEach((word, index) => {
            setTimeout(() => {
                word.style.transition = 'all 0.7s cubic-bezier(0.215, 0.61, 0.355, 1)';
                word.style.opacity = '1';
                word.style.transform = 'translateY(0)';
            }, 300 + (index * 150));
        });
        
        // Animate description
        const heroDesc = document.querySelector('.hero-description');
        if (heroDesc) {
            setTimeout(() => {
                heroDesc.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
                heroDesc.style.opacity = '1';
                heroDesc.style.transform = 'translateY(0)';
            }, 1000);
        }
        
        // Animate buttons
        const heroButtons = document.querySelector('.hero-buttons');
        if (heroButtons) {
            setTimeout(() => {
                heroButtons.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
                heroButtons.style.opacity = '1';
            }, 1200);
        }
        
        // Animate images
        const heroImages = document.querySelectorAll('.hero-image');
        heroImages.forEach(img => {
            const delay = parseFloat(img.getAttribute('data-delay')) || 0;
            setTimeout(() => {
                img.querySelector('img').style.opacity = '1';
                img.querySelector('img').style.transform = 'scale(1)';
            }, 1200 + (delay * 1000));
        });
    }
    
    // CTA Section Animation
    function animateCTASection() {
        // Animate title
        const ctaTitle = document.querySelector('.cta-title');
        if (ctaTitle) {
            ctaTitle.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
            ctaTitle.style.opacity = '1';
            ctaTitle.style.transform = 'translateY(0)';
        }
        
        // Animate description
        const ctaDesc = document.querySelector('.cta-description');
        if (ctaDesc) {
            setTimeout(() => {
                ctaDesc.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
                ctaDesc.style.opacity = '1';
                ctaDesc.style.transform = 'translateY(0)';
            }, 200);
        }
        
        // Animate counters
        const ctaCounters = document.querySelector('.cta-counters');
        if (ctaCounters) {
            setTimeout(() => {
                ctaCounters.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
                ctaCounters.style.opacity = '1';
                
                // Start counter animation
                const counters = ctaCounters.querySelectorAll('.counter');
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'), 10);
                    const increment = target / 60;
                    let currentCount = 0;
                    
                    const updateCount = () => {
                        if (currentCount < target) {
                            currentCount += increment;
                            counter.textContent = Math.ceil(currentCount);
                            setTimeout(updateCount, 30);
                        } else {
                            counter.textContent = target;
                        }
                    };
                    
                    updateCount();
                });
            }, 400);
        }
        
        // Animate form
        const ctaForm = document.querySelector('.cta-form');
        if (ctaForm) {
            setTimeout(() => {
                ctaForm.style.transition = 'all 0.9s cubic-bezier(0.215, 0.61, 0.355, 1)';
                ctaForm.style.opacity = '1';
                ctaForm.style.transform = 'translateX(0)';
            }, 600);
            
            // Add form input animation
            const formInputs = ctaForm.querySelectorAll('.cta-form-input');
            formInputs.forEach((input, index) => {
                input.style.transform = 'translateY(20px)';
                input.style.opacity = '0';
                
                setTimeout(() => {
                    input.style.transition = 'all 0.5s ease';
                    input.style.transform = 'translateY(0)';
                    input.style.opacity = '1';
                }, 800 + (index * 100));
            });
            
            // Add button animation
            const formButton = ctaForm.querySelector('.cta-button');
            if (formButton) {
                formButton.style.transform = 'translateY(20px)';
                formButton.style.opacity = '0';
                
                setTimeout(() => {
                    formButton.style.transition = 'all 0.5s ease';
                    formButton.style.transform = 'translateY(0)';
                    formButton.style.opacity = '1';
                }, 1200);
                
                // Add button hover effect
                formButton.addEventListener('mouseenter', () => {
                    formButton.style.transform = 'translateY(-5px)';
                });
                
                formButton.addEventListener('mouseleave', () => {
                    formButton.style.transform = 'translateY(0)';
                });
            }
        }
    }
</script>
@endpush