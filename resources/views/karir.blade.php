@extends('layouts.app')

@section('title', 'Karir')

@section('meta_description', 'Ardhan Creative menyediakan jasa pembuatan website profesional di Pati. Cepat, responsif, dan SEO friendly.')

@section('meta_keywords', 'jasa pembuatan website, web development pati, jasa web pati')

@push('styles')
<style>
    /* Inherit animations from home page */
    .reveal-element {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }
    .reveal-element.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Career Specific Styles */
    /* Hero Section */
    .hero-section {
        background-image: url('/images/hero/layer2.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
        min-height: 100vh;
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
    
    .benefit-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .benefit-card:hover {
        transform: translateY(-5px);
    }
    
    .benefit-card::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: #3b82f6;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }
    
    .benefit-card:hover::before {
        transform: scaleX(1);
    }
    
    .job-card {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }
    
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        border-left-color: #3b82f6;
    }
    
    .job-type {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 9999px;
    }
    
    .full-time {
        background-color: #dbeafe;
        color: #1e40af;
    }
    
    .part-time {
        background-color: #f0fdf4;
        color: #166534;
    }
    
    .internship {
        background-color: #fef2f2;
        color: #991b1b;
    }
    
    .application-form {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .form-input {
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }
    
    .form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    
    .file-upload {
        border: 2px dashed #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .file-upload:hover {
        border-color: #3b82f6;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .job-card {
            flex-direction: column;
        }
        
        .job-info {
            border-right: none;
            border-bottom: 1px solid #e5e7eb;
            padding-right: 0;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }
    }
    /* Optional Animation Keyframes */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    /* Add this class to elements you want to animate */
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="particles-container absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 relative z-10 flex items-center min-h-screen">
            <div class="w-full max-w-5xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center">
                    <!-- Left Text Content -->
                    <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                        <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                            <span class="hero-title-word block">ARDHAN CREATIVE</span>
                            <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">CAREER</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                            Bergabunglah dengan tim yang menginspirasi. Kepuasan klien kami adalah bukti komitmen dan keunggulan kerja kami.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Join Us Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Kenapa Bergabung Dengan Kami?</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Kami menawarkan lingkungan kerja yang dinamis dan kesempatan pengembangan karir yang luas</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="benefit-card bg-white p-8 rounded-xl shadow-sm border border-gray-100 reveal-element">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Lingkungan Kerja Profesional</h3>
                    <p class="text-gray-600">Bekerja dengan tim yang kompeten dan berpengalaman di industri teknologi</p>
                </div>
                
                <div class="benefit-card bg-white p-8 rounded-xl shadow-sm border border-gray-100 reveal-element">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Pengembangan Karir</h3>
                    <p class="text-gray-600">Program pelatihan dan sertifikasi untuk meningkatkan kompetensi Anda</p>
                </div>
                
                <div class="benefit-card bg-white p-8 rounded-xl shadow-sm border border-gray-100 reveal-element">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Tim Yang Solid</h3>
                    <p class="text-gray-600">Budaya kerja kolaboratif dan hubungan antar tim yang baik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Openings Section -->
    @php
        use App\Models\Karir;
        $lokerList = Karir::all();
    @endphp

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Lowongan Posisi</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Temukan posisi yang sesuai dengan keahlian dan minat Anda</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-6">
                @foreach($lokerList as $loker)
                <div class="job-card bg-white rounded-lg overflow-hidden shadow-sm reveal-element">
                    <div class="p-6 flex flex-col md:flex-row md:items-center">
                        <div class="job-info md:border-r md:border-gray-200 md:pr-6 md:w-1/2">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-xl font-bold text-gray-900">{{ $loker->posisi }}</h3>
                                <span class="job-type {{ str_replace('-', ' ', $loker->tipe) }}">{{ ucfirst($loker->tipe) }}</span>
                            </div>
                            <div class="flex items-center text-gray-600 space-x-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $loker->lokasi }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>RP {{ $loker->gaji }} Juta</span>
                                </div>
                            </div>
                        </div>
                        <div class="md:pl-6 md:w-1/2 mt-4 md:mt-0">
                            <p class="text-gray-600 mb-4">{{ $loker->deskripsi }}</p>
                            <button class="apply-btn px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                                    data-job="{{ $loker->posisi }}">
                                Lamar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="py-12 bg-gray-50" id="application-form">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <!-- Form Header -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Bergabung Dengan Tim Kami</h2>
                    <p class="text-gray-600">Isi formulir di bawah ini untuk melamar pekerjaan</p>
                </div>
                
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        {{ session('error') }}
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Form Card -->
                <div class="bg-white rounded-lg shadow-md p-8">
                    <form action="{{ route('lamaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="posisi" style="font-weight: bold; color: #333; margin-bottom: 5px; display: block;">Posisi Pekerjaan *</label>
                            <select name="posisi" id="posisi" class="form-control" required 
                                    style="width: 100%; padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; background-color: white; outline: none; transition: border-color 0.3s ease;">
                                <option value="">-- Pilih Posisi --</option>
                                @if(isset($lokerList) && $lokerList->count() > 0)
                                    @foreach($lokerList as $loker)
                                        <option value="{{ $loker->posisi }}" 
                                            {{ old('posisi') == $loker->posisi ? 'selected' : '' }}>
                                            {{ $loker->posisi }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        
                        <!-- Section 1: Data Diri -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                                1. Data Diri
                            </h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nama Lengkap *
                                    </label>
                                    <input type="text" 
                                        id="nama" 
                                        name="nama" 
                                        value="{{ old('nama') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        placeholder="Masukkan nama lengkap Anda"
                                        required>
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                        Email *
                                    </label>
                                    <input type="email" 
                                        id="email" 
                                        name="email" 
                                        value="{{ old('email') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        placeholder="contoh@email.com"
                                        required>
                                </div>
                                
                                <div>
                                    <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nomor Telepon *
                                    </label>
                                    <input type="tel" 
                                        id="no_telepon" 
                                        name="no_telepon" 
                                        value="{{ old('no_telepon') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        placeholder="08123456789"
                                        required>
                                </div>
                                
                                <div>
                                    <label for="domisili" class="block text-sm font-medium text-gray-700 mb-1">
                                        Domisili *
                                    </label>
                                    <input type="text" 
                                        id="domisili" 
                                        name="domisili" 
                                        value="{{ old('domisili') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        placeholder="Kota, Provinsi"
                                        required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section 2: Pengalaman -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                                2. Pengalaman & Profil
                            </h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="pengalaman" class="block text-sm font-medium text-gray-700 mb-1">
                                        Pengalaman Kerja (tahun) *
                                    </label>
                                    <select id="pengalaman" 
                                            name="pengalaman" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            required>
                                        <option value="">-- Pilih Pengalaman --</option>
                                        <option value="0" {{ old('pengalaman') == '0' ? 'selected' : '' }}>Belum ada pengalaman</option>
                                        <option value="1" {{ old('pengalaman') == '1' ? 'selected' : '' }}>1 tahun</option>
                                        <option value="2" {{ old('pengalaman') == '2' ? 'selected' : '' }}>2 tahun</option>
                                        <option value="3" {{ old('pengalaman') == '3' ? 'selected' : '' }}>3 tahun</option>
                                        <option value="4" {{ old('pengalaman') == '4' ? 'selected' : '' }}>4 tahun</option>
                                        <option value="5" {{ old('pengalaman') == '5' ? 'selected' : '' }}>5 tahun</option>
                                        <option value="6-10" {{ old('pengalaman') == '6-10' ? 'selected' : '' }}>6-10 tahun</option>
                                        <option value="10+" {{ old('pengalaman') == '10+' ? 'selected' : '' }}>Lebih dari 10 tahun</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="link_porto" class="block text-sm font-medium text-gray-700 mb-1">
                                        Portfolio/LinkedIn (URL)
                                    </label>
                                    <input type="url" 
                                        id="link_porto" 
                                        name="link_porto" 
                                        value="{{ old('link_porto') }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                        placeholder="https://www.linkedin.com/in/username">
                                </div>
                                
                                <div>
                                    <label for="surat_lamaran" class="block text-sm font-medium text-gray-700 mb-1">
                                        Surat Lamaran *
                                    </label>
                                    <textarea id="surat_lamaran" 
                                            name="surat_lamaran" 
                                            rows="4" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                                            placeholder="Ceritakan tentang diri Anda dan mengapa Anda tertarik dengan posisi ini..."
                                            required>{{ old('surat_lamaran') }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section 3: Dokumen -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                                3. Upload Dokumen
                            </h3>
                            
                            <div>
                                <label for="cv" class="block text-sm font-medium text-gray-700 mb-1">
                                    CV/Resume (PDF) *
                                </label>
                                <input type="file" 
                                    id="cv" 
                                    name="cv" 
                                    accept=".pdf"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">Format PDF, maksimal 5MB</p>
                            </div>
                        </div>
                        
                        <!-- Agreement -->
                        <div class="mb-6">
                            <label class="flex items-start">
                                <input type="checkbox" 
                                    id="agree" 
                                    name="agree" 
                                    value="1"
                                    class="mt-1 mr-3 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    required>
                                <span class="text-sm text-gray-700">
                                    Saya menyetujui pengolahan data pribadi sesuai dengan kebijakan privasi perusahaan *
                                </span>
                            </label>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" 
                                class="bg-blue-600 text-white px-8 py-3 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                                Kirim Lamaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-80 h-80 bg-white rounded-full blur-3xl transform translate-x-1/4 translate-y-1/4"></div>
        </div>
        
        <!-- Animated Dots Background -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-10 left-10 w-4 h-4 bg-white rounded-full opacity-20"></div>
            <div class="absolute top-20 right-40 w-2 h-2 bg-white rounded-full opacity-30"></div>
            <div class="absolute bottom-40 left-1/4 w-3 h-3 bg-white rounded-full opacity-25"></div>
            <div class="absolute bottom-10 right-1/3 w-5 h-5 bg-white rounded-full opacity-20"></div>
            <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-white rounded-full opacity-30"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 md:p-12 shadow-xl border border-white/20">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white leading-tight">
                            Pertanyaan Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-100">Rekrutmen?</span>
                        </h2>
                        <p class="text-lg md:text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                            Tim HR kami siap membantu menjawab pertanyaan Anda tentang proses rekrutmen dan kesempatan karir.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="https://wa.me/6282134826759" target="_blank" class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-white text-indigo-700 font-medium shadow-lg hover:shadow-indigo-500/30 hover:scale-105 transition-all duration-300 group">
                                <span>Hubungi HR Kami</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                            <a href="#" class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-transparent text-white border border-white/40 font-medium hover:bg-white/10 hover:scale-105 transition-all duration-300">
                                Lihat Lowongan
                            </a>
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
        // Scroll reveal animation
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
        
        // Job application handling
        const applyButtons = document.querySelectorAll('.apply-btn');
        const selectedJobText = document.getElementById('selected-job-text');
        const selectedJobInput = document.getElementById('selected-job');
        const formSection = document.getElementById('application-form');
        
        applyButtons.forEach(button => {
            button.addEventListener('click', () => {
                const jobTitle = button.dataset.job;
                selectedJobText.textContent = `Melamar untuk posisi: ${jobTitle}`;
                selectedJobInput.value = jobTitle;
                
                // Scroll to form section
                formSection.scrollIntoView({ behavior: 'smooth' });
            });
        });
        
        // File upload styling
        const fileUpload = document.querySelector('.file-upload');
        const fileInput = document.getElementById('resume');
        
        fileUpload.addEventListener('click', () => {
            fileInput.click();
        });
        
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                fileUpload.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-green-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-gray-700 font-medium">${fileInput.files[0].name}</p>
                    <p class="text-sm text-gray-500 mt-1">${(fileInput.files[0].size / 1024 / 1024).toFixed(2)} MB</p>
                `;
            }
        });
        
        // Drag and drop for file upload
        fileUpload.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileUpload.classList.add('border-blue-500', 'bg-blue-50');
        });
        
        fileUpload.addEventListener('dragleave', () => {
            fileUpload.classList.remove('border-blue-500', 'bg-blue-50');
        });
        
        fileUpload.addEventListener('drop', (e) => {
            e.preventDefault();
            fileUpload.classList.remove('border-blue-500', 'bg-blue-50');
            
            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        });
        
        // Form submission
        const careerForm = document.getElementById('career-form');
        
        careerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Validate form
            if (!selectedJobInput.value) {
                alert('Silakan pilih posisi terlebih dahulu');
                return;
            }
            
            // Here you would typically send the form data to your server
            // For demo purposes, we'll just show an alert
            alert(`Lamaran untuk posisi ${selectedJobInput.value} berhasil dikirim!`);
            careerForm.reset();
            fileUpload.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <p class="text-gray-500">Drag & drop file atau <span class="text-blue-600">browse</span></p>
                <p class="text-sm text-gray-400 mt-1">Format PDF (max. 5MB)</p>
            `;
            selectedJobText.textContent = 'Pilih posisi terlebih dahulu';
            selectedJobInput.value = '';
        });
    });
    // Experience range slider
const experienceRange = document.getElementById('experience-range');
const experienceValue = document.getElementById('experience-value');
const experienceInput = document.getElementById('experience');

experienceRange.addEventListener('input', function() {
    const value = this.value;
    experienceValue.textContent = value + ' tahun';
    experienceInput.value = value;
});

// Character counter for cover letter
const coverLetter = document.getElementById('cover-letter');
const letterCount = document.getElementById('letter-count');

coverLetter.addEventListener('input', function() {
    const count = this.value.length;
    letterCount.textContent = count;
    
    if (count > 500) {
        letterCount.classList.add('text-red-500');
    } else {
        letterCount.classList.remove('text-red-500');
    }
});

// File upload preview
const fileInput = document.getElementById('resume');
const filePreview = document.getElementById('file-preview');
const fileName = document.getElementById('file-name');
const removeFile = document.getElementById('remove-file');
const fileUpload = document.querySelector('.file-upload');

fileInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
        fileName.textContent = this.files[0].name;
        filePreview.classList.remove('hidden');
        fileUpload.classList.add('border-blue-500', 'bg-blue-50');
    }
});

removeFile.addEventListener('click', function() {
    fileInput.value = '';
    filePreview.classList.add('hidden');
    fileUpload.classList.remove('border-blue-500', 'bg-blue-50');
});

// Make the file upload area also respond to drag and drop
fileUpload.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.classList.add('border-blue-500', 'bg-blue-50');
});

fileUpload.addEventListener('dragleave', function(e) {
    e.preventDefault();
    if (!fileInput.files || !fileInput.files[0]) {
        this.classList.remove('border-blue-500', 'bg-blue-50');
    }
});

fileUpload.addEventListener('drop', function(e) {
    e.preventDefault();
    
    if (e.dataTransfer.files && e.dataTransfer.files[0]) {
        fileInput.files = e.dataTransfer.files;
        fileName.textContent = e.dataTransfer.files[0].name;
        filePreview.classList.remove('hidden');
    }
});

fileUpload.addEventListener('click', function() {
    fileInput.click();
});

</script>
@endpush