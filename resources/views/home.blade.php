@extends('layouts.app')

@section('title', 'Jasa Pembuatan Website di Pati | Ardhan Creative')

@section('meta_description', 'Jasa pembuatan website profesional di Pati, cepat, responsif, dan SEO friendly. Ardhan Creative siap membantu bisnis Anda online.')

@section('meta_keywords', 'jasa pembuatan website, web development pati, jasa web pati')

@push('preload')
    <!-- Preload critical resources -->
    <link rel="preload" href="/images/hero/layer2.webp" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('css/critical.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('css/critical.css') }}"></noscript>
@endpush

@push('styles')
<style>
    /* Critical Above-the-fold CSS Only */
    .hero-section {
        background-image: url('/images/hero/layer2.webp');
        background-size: cover;
        background-position: center;
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
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
    
    /* Defer non-critical animations */
    .hero-title span {
        display: inline-block;
    }
    
    .reveal-element {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }
    .reveal-element.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Essential layout styles only */
    .service-card {
        position: relative;
        overflow: hidden;
        border-radius: 0.5rem;
        height: 24rem;
    }
    
    .service-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        inset: 0;
    }
    
    .logo-container {
        display: flex;
        overflow: hidden;
        width: 100%;
    }

    .logo-slider {
        display: flex;
        width: 200%;
    }

    .logo-slider > div {
        min-width: 150px;
    }
    
    /* Responsive base */
    @media (max-width: 640px) {
        .logo-slider > div {
            min-width: 120px;
        }
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10 flex items-center min-h-screen">
            <div class="w-full max-w-5xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center">
                    <!-- Left Text Content -->
                    <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-white bg-opacity-10 backdrop-filter backdrop-blur-sm border border-white border-opacity-20 mb-4 hero-badge">
                            <span class="w-3 h-3 rounded-full bg-blue-400 mr-2" aria-hidden="true"></span>
                            <span class="text-sm font-medium">Solusi Digital</span>
                        </div>
                        
                        <h1 class="text-5xl md:text-7xl font-bold leading-tight hero-title">
                            <span class="hero-title-word">TRANSFORM YOUR</span>
                            <span class="hero-title-word">BRAND,</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">ELEVATE</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">YOUR</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">FUTURE.</span>
                        </h1>
                        
                        <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                            Transformasi digital yang membawa brand Anda lebih kuat, relevan, dan siap hadapi Era Digital.<br><strong>Transformasi digital dimulai dari sini!</strong>
                        </p>
                        
                        <div class="flex flex-wrap gap-6 mt-4 hero-buttons">
                            <a href="https://wa.me/6282227121942" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="px-8 py-4 rounded-full bg-white text-blue-800 font-medium shadow-lg hover:shadow-blue-500/30 hover:scale-105 transition-all"
                            aria-label="Konsultasi Gratis via WhatsApp">
                            Konsultasi Gratis
                            </a>

                            <a href="{{ route('portfolio') }}" 
                               class="px-8 py-4 rounded-full border border-white font-medium text-white hover:bg-white hover:bg-opacity-10 transition-all"
                               aria-label="Lihat Portfolio Kami">
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
                        <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-blue-200 rounded-full" aria-hidden="true"></span>
                    </h2>
                </div>
                <div class="logo-container">
                    <div class="logo-slider" id="logo-slider">
                        @foreach($clients as $client)
                        <div class="px-4 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $client->logo) }}" 
                                 alt="{{ $client->klien }}"
                                 class="h-16 w-auto object-contain grayscale hover:grayscale-0 transition-all" 
                                 loading="lazy"
                                 width="120"
                                 height="64">
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
                @foreach($layanans as $index => $layanan)
                <div class="service-card bg-gradient-to-b from-transparent to-black relative rounded-lg overflow-hidden group h-96">
                    <img src="{{ asset('storage/' . $layanan->gambar) }}" 
                         alt="{{ $layanan->layanan }}" 
                         class="w-full h-full object-cover absolute inset-0" 
                         loading="{{ $index < 4 ? 'eager' : 'lazy' }}"
                         width="300"
                         height="384">
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
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Persetujuan dan Deal Proyek</h4>
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
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Kenapa Memilih Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6" aria-hidden="true"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Kami hadir untuk memberikan solusi yang unggul, inovatif, dan berkualitas untuk mendukung kesuksesan bisnis Anda.</p>
            </div>
            
            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                @php
                $features = [
                    ['title' => 'Inovatif', 'desc' => 'Kami selalu berinovasi untuk memberikan solusi yang segar dan sesuai dengan perkembangan terkini.', 'icon' => 'inovatif.png', 'featured' => false],
                    ['title' => 'Berkualitas', 'desc' => 'Kami selalu mengutamakan kualitas tinggi dalam setiap pekerjaan untuk memberikan dampak positif pada brand Anda.', 'icon' => 'kualitas.jpg', 'featured' => true],
                    ['title' => 'Handal', 'desc' => 'Kami memastikan setiap proyek dikelola dengan penuh pengawasan untuk hasil yang dapat diandalkan.', 'icon' => 'percaya.jpg', 'featured' => false],
                    ['title' => 'Cepat', 'desc' => 'Dengan pendekatan agile, kami memberikan respon yang cepat dan solusi yang tepat waktu.', 'icon' => 'respon.jpg', 'featured' => true],
                    ['title' => 'Kreatif', 'desc' => 'Kami menghadirkan solusi kreatif yang berbeda dan penuh inspirasi untuk brand Anda.', 'icon' => 'kreatif.png', 'featured' => false],
                    ['title' => 'Profesional', 'desc' => 'Tim kami terdiri dari para ahli yang berdedikasi untuk hasil berkualitas tinggi.', 'icon' => 'pro.jpg', 'featured' => true]
                ];
                @endphp
                
                @foreach($features as $index => $feature)
                <div class="{{ $feature['featured'] ? 'bg-gradient-to-br from-blue-600 to-blue-800 text-white' : 'bg-white' }} rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex items-center p-6">
                        <div class="w-24 h-24 flex-shrink-0 mr-4">
                            <div class="w-full h-full {{ $feature['featured'] ? 'bg-white' : 'bg-blue-100' }} rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/hero/' . $feature['icon']) }}" 
                                     alt="{{ $feature['title'] }} Icon" 
                                     class="w-16 h-16" 
                                     loading="lazy"
                                     width="64"
                                     height="64">
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">{{ $feature['title'] }}</h3>
                            <p class="{{ $feature['featured'] ? 'text-white' : 'text-gray-600' }}">{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
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
                    <button id="prev-btn" 
                            class="p-3 rounded-full bg-gray-100 hover:bg-blue-100 transition-colors"
                            aria-label="Previous testimonial">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <div id="pagination" class="flex items-center gap-2">
                        <!-- Pagination dots will be generated by JS -->
                    </div>
                    <button id="next-btn" 
                            class="p-3 rounded-full bg-gray-100 hover:bg-blue-100 transition-colors"
                            aria-label="Next testimonial">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-24 relative overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800">
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
                                <label for="nama" class="text-gray-700 mb-2 block">Nama Anda</label>
                                <input type="text" 
                                       id="nama"
                                       name="nama"
                                       placeholder="Masukkan nama lengkap" 
                                       class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                       required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="email" class="text-gray-700 mb-2 block">Email</label>
                                <input type="email" 
                                       id="email"
                                       name="email"
                                       placeholder="email@perusahaan.com" 
                                       class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                       required>
                            </div>
                            
                            <div class="mb-6">
                                <label for="layanan" class="text-gray-700 mb-2 block">Jenis Layanan</label>
                                <select id="layanan" 
                                        name="layanan"
                                        class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                                        required>
                                    <option value="">Pilih layanan yang dibutuhkan</option>
                                    <option value="web">Web Development</option>
                                    <option value="app">Mobile Development</option>
                                    <option value="seo">SEO</option>
                                    <option value="design">UI/UX & Brand Design</option>
                                    <option value="sosmedads">Sosial Media ADS</option>
                                </select>
                            </div>
                            
                            <button type="submit" 
                                    class="cta-button w-full bg-blue-600 text-white font-medium py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all">
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