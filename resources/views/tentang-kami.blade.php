@extends('layouts.app')

@section('title', 'Tentang Kami')

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
    
    /* About Specific Styles */
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
    .vision-mission-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .vision-mission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .vision-mission-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 0;
        background: #3b82f6;
        transition: all 0.4s ease;
    }
    
    .vision-mission-card:hover::before {
        height: 100%;
    }
    
    .history-timeline {
        position: relative;
    }
    
    .history-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 100%;
        background: #e5e7eb;
    }
    
    .timeline-item {
        position: relative;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        top: 24px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #3b82f6;
        border: 4px solid #e5e7eb;
    }
    
    .timeline-left::before {
        left: calc(50% - 40px);
    }
    
    .timeline-right::before {
        right: calc(50% - 40px);
    }
    
    .team-card {
        transition: all 0.3s ease;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .team-social {
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }
    
    .team-card:hover .team-social {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .history-timeline::before {
            left: 24px;
        }
        
        .timeline-item::before {
            left: 16px !important;
            right: auto !important;
        }
        
        .timeline-left, .timeline-right {
            padding-left: 56px;
            padding-right: 0;
        }
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

    /* Card hover effect */
    .cta-card {
        transition: transform 0.5s ease;
    }

    .cta-card:hover {
        transform: translateY(-5px);
    }

    /* Button effects */
    .cta-button {
        transition: all 0.3s ease;
    }

    .cta-button:hover::after {
        opacity: 1;
    }

    .cta-button::after {
        content: '';
        position: absolute;
        inset: -5px;
        border-radius: 9999px;
        background: linear-gradient(45deg, #4f46e5, #3b82f6, #8b5cf6, #4f46e5);
        background-size: 200% 200%;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
        animation: gradient-shift 3s ease infinite;
    }

    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Feature card hover effect */
    .cta-feature {
        transition: all 0.3s ease;
    }

    /* Text reveal animation */
    .cta-title, .cta-description {
        opacity: 0;
        transform: translateY(20px);
    }

    /* Particle styles */
    .cta-particle {
        position: absolute;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        pointer-events: none;
    }

    /* Video Section Specific Styles */
    .video-profile-section {
        position: relative;
        z-index: 1;
    }

    /* Video Card Animation */
    .video-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        transform: translateY(0);
    }

    .video-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Video Container */
    .video-container {
        transition: transform 0.3s ease;
    }

    .video-card:hover .video-container {
        transform: scale(1.005);
    }

    /* Play Button Animation */
    .play-button {
        box-shadow: 0 0 0 10px rgba(59, 130, 246, 0.2);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(59, 130, 246, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
        }
    }

    .play-button:hover {
        background-color: #2563eb;
    }

    /* Video Controls */
    .video-container:hover .video-controls {
        opacity: 1;
    }

    /* Video Control Buttons */
    .pause-button, .mute-button {
        transition: transform 0.2s ease;
    }

    .pause-button:hover, .mute-button:hover {
        transform: scale(1.1);
    }

    /* Progress Bar Animation */
    .progress-container {
        cursor: pointer;
        transition: height 0.2s ease;
    }

    .progress-container:hover {
        height: 3px;
    }

    .progress-bar {
        transition: width 0.1s linear;
    }

    /* Video Info Card Animation */
    .video-info {
        transform: translateY(0);
        transition: transform 0.3s ease;
    }

    .video-wrapper:hover .video-info {
        transform: translateY(-5px);
    }

    /* Share and Download Links */
    .share-button, .download-link {
        transition: all 0.2s ease;
    }

    .share-button:hover, .download-link:hover {
        transform: translateY(-2px);
    }

    /* Play button overlay fade out */
    .play-button-overlay.hidden {
        opacity: 0;
        pointer-events: none;
    }

    /* Responsive behavior */
    @media (max-width: 640px) {
        .video-info {
            padding: 1rem;
        }
        
        .video-duration {
            display: none;
        }
    }

    /* Blob animation for background elements */
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }

    .animate-blob {
        animation: blob 7s infinite alternate;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
@endpush

@section('content')
   <!-- Hero Section -->
    <section class="hero-section">
        <div class="particles-container absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 relative z-10 flex items-center min-h-screen">
            <div class="w-full max-w-5xl mx-auto">
                <!-- Flex Container -->
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <!-- Left Text Content -->
                    <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                        <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                            <span class="hero-title-word block">TENTANG</span>
                            <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">KAMI</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                            Menjadi partner teknologi Anda dalam mengakses solusi digital yang canggih, efisien, dan bernilai untuk memenangkan persaingan di era digital.
                        </p>
                        <div class="pt-4">
                            <a href="#visi-misi" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium rounded-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                                Pelajari Lebih Lanjut
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <!-- Visi & Misi Section yang Diperbarui -->
    <section class="py-20 bg-gradient-to-b from-blue-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-5xl font-bold mb-4 text-gray-900 relative inline-block">
                    <span class="relative z-10">Visi & Misi</span>
                    <span class="absolute -bottom-2 left-0 w-full h-3 bg-blue-200 opacity-70 z-0"></span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto mt-4">Komitmen kami untuk membangun masa depan teknologi yang berkelanjutan</p>
            </div>

            <div class="flex flex-col md:flex-row gap-10 max-w-5xl mx-auto">
                <!-- Card Visi -->
                <div class="vision-mission-card bg-white p-8 rounded-2xl shadow-lg border-t-4 border-blue-600 flex-1 transform transition-all duration-300 hover:scale-105 reveal-element">
                    <div class="bg-blue-100 text-blue-600 rounded-full p-4 inline-block mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-blue-700">Visi</h3>
                    <div class="w-16 h-1 bg-blue-600 mb-6"></div>
                    <p class="text-gray-700 text-lg">Menjadi partner terdepan dalam membuka akses teknologi modern yang canggih, efisien, dan bernilai untuk bersaing di era digital.</p>
                </div>
                
                <!-- Card Misi -->
                <div class="vision-mission-card bg-white p-8 rounded-2xl shadow-lg border-t-4 border-blue-600 flex-1 transform transition-all duration-300 hover:scale-105 reveal-element">
                    <div class="bg-blue-100 text-blue-600 rounded-full p-4 inline-block mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold mb-4 text-blue-700">Misi</h3>
                    <div class="w-16 h-1 bg-blue-600 mb-6"></div>
                    <ul class="text-gray-700 space-y-4">
                        <li class="flex items-start group">
                            <div class="bg-blue-100 rounded-full p-1 mr-3 mt-1 flex-shrink-0 group-hover:bg-blue-200 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span>Mengembangkan solusi teknologi yang inovatif dan berkelanjutan</span>
                        </li>
                        <li class="flex items-start group">
                            <div class="bg-blue-100 rounded-full p-1 mr-3 mt-1 flex-shrink-0 group-hover:bg-blue-200 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span>Berkolaborasi dengan mitra bisnis dalam mewujudkan visi bersama dengan pendekatan yang transparan dan responsif</span>
                        </li>
                        <li class="flex items-start group">
                            <div class="bg-blue-100 rounded-full p-1 mr-3 mt-1 flex-shrink-0 group-hover:bg-blue-200 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span>Mengembangkan pengetahuan dan ketrampilan secara berkala guna menciptakan tenaga profesional</span>
                        </li>
                        <li class="flex items-start group">
                            <div class="bg-blue-100 rounded-full p-1 mr-3 mt-1 flex-shrink-0 group-hover:bg-blue-200 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span>Membangun reputasi baik untuk mendapatkan relasi yang luas</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

     <!-- Latar Belakang Section  -->
    <section class="py-24 bg-gradient-to-b from-gray-50 to-gray-100">
        <div class="container mx-auto px-6 max-w-6xl">
            <!-- Section Header with Animated Underline -->
            <div class="text-center mb-20 relative">
                <h2 class="text-5xl font-bold mb-6 text-gray-900 tracking-tight">Latar Belakang</h2>
                <div class="w-32 h-1 bg-blue-600 mx-auto transform transition-all duration-500 hover:w-48"></div>
            </div>
            
            <!-- Content Card with Shadow Effects -->
            <div class="bg-white p-10 rounded-2xl shadow-lg border border-gray-100 transform transition-all duration-300 hover:shadow-xl">
                <!-- Timeline Design -->
                <div class="space-y-12">
                    <!-- Origin Story -->
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/4">
                            <div class="bg-blue-50 p-6 rounded-xl">
                                <h3 class="text-2xl font-semibold text-blue-700">Visi Awal</h3>
                                <p class="text-blue-600 font-medium">16 September 2024</p>
                            </div>
                        </div>
                        <div class="md:w-3/4">
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Ardhan Creative lahir dari pertemuan dua pikiran visioner yang melihat potensi luar biasa dalam revolusi digital Indonesia. Didirikan pada 16 September 2024, perusahaan kami memulai perjalanan dengan misi yang menggetarkan: mentransformasi lanskap digital untuk seluruh spektrum bisnis Indonesia. Di tengah era disrupsi teknologi yang tak tertahankan, kami hadir sebagai mitra strategis yang menawarkan solusi teknologi premium namun terjangkau, membuka gerbang kesempatan bagi setiap entitas bisnis—dari startup hingga korporasi, dari instansi pemerintah hingga perusahaan swasta—untuk bersaing dan unggul di panggung global.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Core Values -->
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/4">
                            <div class="bg-blue-50 p-6 rounded-xl">
                                <h3 class="text-2xl font-semibold text-blue-700">Nilai Inti</h3>
                                <p class="text-blue-600 font-medium">Fondasi Kokoh</p>
                            </div>
                        </div>
                        <div class="md:w-3/4">
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Meski baru dalam industri kreatif digital, Ardhan Creative berdiri di atas fondasi nilai yang tak tergoyahkan: inovasi yang berani dan tiada henti, integritas tanpa kompromi, dan kolaborasi transformatif yang bermakna. Kami meyakini bahwa transisi digital adalah perjalanan revolusioner—bukan sekadar adopsi teknologi, melainkan metamorfosis fundamental dalam cara organisasi beroperasi, berinovasi, dan menciptakan hubungan bermakna dengan audiensnya.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Team Expertise -->
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/4">
                            <div class="bg-blue-50 p-6 rounded-xl">
                                <h3 class="text-2xl font-semibold text-blue-700">Keahlian Tim</h3>
                                <p class="text-blue-600 font-medium">Kekuatan Kolektif</p>
                            </div>
                        </div>
                        <div class="md:w-3/4">
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Tim Ardhan Creative menghadirkan orkestra talenta digital paling brilian dengan latar belakang yang mempesona—mulai dari pengembangan perangkat lunak mutakhir hingga desain UX/UI yang memukau, dari strategi konten yang memicu aksi hingga analitik data yang mendalam. Keberagaman keahlian yang kami rangkul memungkinkan orkestrasi solusi digital yang holistik dan presisi, disesuaikan untuk menjawab tantangan unik setiap klien, dari skala startup hingga perusahaan multinasional, dari instansi publik hingga korporasi ternama.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Innovation Focus -->
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/4">
                            <div class="bg-blue-50 p-6 rounded-xl">
                                <h3 class="text-2xl font-semibold text-blue-700">Fokus Inovasi</h3>
                                <p class="text-blue-600 font-medium">Menatap Masa Depan</p>
                            </div>
                        </div>
                        <div class="md:w-3/4">
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Sejak awal berdiri, Ardhan Creative berkomitmen menghadirkan teknologi paling mutakhir yang mentransformasi. Solusi berbasis Artificial Intelligence dan Machine Learning menjadi tulang punggung inovasi kami, dengan visi membawa teknologi yang selama ini hanya terjangkau oleh perusahaan-perusahaan Fortune 500 menjadi alat yang dapat diakses dan dioptimalkan oleh berbagai skala dan jenis organisasi di Indonesia—mengubah tantangan menjadi peluang dan visi menjadi kenyataan.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Vision Forward -->
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/4">
                            <div class="bg-blue-50 p-6 rounded-xl">
                                <h3 class="text-2xl font-semibold text-blue-700">Visi Ke Depan</h3>
                                <p class="text-blue-600 font-medium">Peta Perjalanan</p>
                            </div>
                        </div>
                        <div class="md:w-3/4">
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Meski baru memulai perjalanan, Ardhan Creative telah melukiskan peta jalan yang menantang dan inspiratif untuk pertumbuhan yang tak terbendung. Kami bertekad menjadi katalisator revolusi digital di Indonesia, membangun ekosistem solusi teknologi yang memberdayakan setiap entitas bisnis—dari perusahaan startup yang energik hingga korporasi mapan, dari lembaga pemerintah hingga organisasi nirlaba—untuk berkembang pesat dan menciptakan jejak global dalam ekonomi digital yang semakin kompetitif.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Closing Statement -->
                    <div class="text-center mt-16">
                        <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent mb-8"></div>
                        <p class="text-gray-800 text-xl font-medium italic">
                            "Perjalanan Ardhan Creative baru dimulai, namun visi kami tak terbantahkan: menciptakan jembatan teknologi yang menghubungkan setiap bisnis dan organisasi Indonesia dengan masa depan digital yang cemerlang dan tak terbatas."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Meet Our Team Section yang Diperbaharui -->
    @php
    use App\Models\Team;
    $teamMembers = Team::all();
    @endphp

    <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                {{-- <span class="text-blue-600 font-medium uppercase tracking-wider mb-2 inline-block">Tim Kami</span> --}}
                <h2 class="text-5xl font-bold mb-6 text-gray-900 relative inline-block">
                    <span class="relative z-10">Meet Our Team</span>
                    <span class="absolute -bottom-2 left-0 w-full h-3 bg-blue-200 opacity-70 z-0"></span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Tim profesional kami siap membantu mewujudkan visi digital bisnis Anda</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach($teamMembers as $member)
                <div class="team-card bg-white rounded-2xl overflow-hidden shadow-xl transform transition-all duration-300 hover:-translate-y-2 group reveal-element">
                    <div class="relative overflow-hidden h-72">
                        <!-- Foto Tim dengan Efek Hover -->
                        <img src="{{ asset('storage/' . $member->foto) }}" alt="{{ $member->nama }}" 
                            class="w-full h-full object-cover transition-all duration-500 group-hover:scale-110">
                        
                        <!-- Overlay Gradien -->
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900 via-blue-900/40 to-transparent opacity-0 group-hover:opacity-90 transition-all duration-300"></div>
                        
                        <!-- Informasi Hover -->
                        <div class="absolute inset-0 flex flex-col justify-center items-center p-6 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <h3 class="text-2xl font-bold mb-2 text-white">{{ $member->nama }}</h3>
                            <p class="text-blue-200 mb-4">{{ $member->jabatan }}</p>
                            <p class="text-white text-sm text-center mb-6 hidden md:block">Profesional berpengalaman dengan keahlian di bidang teknologi dan pengembangan digital.</p>
                            
                            <!-- Social Media Icons -->
                            <div class="flex justify-center space-x-4">
                                @php
                                    // Default social links
                                    $socialLinks = [
                                        'linkedin' => '#',
                                        'twitter' => '#',
                                        'instagram' => '#'
                                    ];
                                @endphp
                                
                                @foreach($socialLinks as $platform => $url)
                                <a href="{{ $url }}" class="text-white hover:text-blue-300 transition-colors bg-white/20 p-2 rounded-full hover:bg-white/30">
                                    @if($platform === 'linkedin')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                    @elseif($platform === 'twitter')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                    @elseif($platform === 'instagram')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                    @endif
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Dasar (Terlihat tanpa Hover) -->
                    <div class="p-6 relative bg-white">
                        <h3 class="text-xl font-bold mb-1 text-gray-900 group-hover:text-blue-600 transition-colors">{{ $member->nama }}</h3>
                        <p class="text-blue-600">{{ $member->jabatan }}</p>
                        <div class="absolute top-0 right-0 h-12 w-12 bg-blue-600 rounded-bl-2xl flex items-center justify-center transform -translate-y-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- CTA Button -->
            <div class="text-center mt-16">
                <a href="#contact" class="inline-block px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    Hubungi Tim Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Video Company Profile Section -->
    <section class="video-profile-section py-20 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-purple-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Company Profile</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Tonton video profile kami untuk mengenal lebih dekat dengan visi, misi, dan budaya kerja tim Ardhan Creative</p>
            </div>

            <div class="max-w-4xl mx-auto reveal-element video-wrapper">
                <div class="bg-white rounded-2xl shadow-xl p-3 video-card">
                    <div class="relative pb-[56.25%] rounded-xl overflow-hidden video-container">
                        <!-- Video element -->
                        <video 
                            id="companyProfileVideo" 
                            class="absolute inset-0 w-full h-full object-cover"
                            poster="/images/video-thumbnail.jpg" 
                            preload="metadata">
                            <source src="/images/profile.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        
                        <!-- Play button overlay (shown before video plays) -->
                        <div class="play-button-overlay absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 transition-opacity">
                            <button class="play-button w-20 h-20 rounded-full bg-blue-600 text-white flex items-center justify-center transition-transform transform hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Video controls (shown when video is playing) -->
                        <div class="video-controls absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent opacity-0 transition-opacity">
                            <div class="flex items-center justify-between">
                                <button class="pause-button text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                                
                                <div class="progress-container flex-1 mx-4 bg-gray-200 h-1 rounded-full">
                                    <div class="progress-bar bg-blue-600 h-full rounded-full" style="width: 0%"></div>
                                </div>
                                
                                <button class="mute-button text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Video description card -->
                <div class="bg-white rounded-xl p-6 shadow-md mt-6 video-info">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">ARDHAN CREATIVE - TRANSFORM YOUR BRAND, ELEVATE YOUR FUTURE</h3>
                    <p class="text-gray-600">Video ini menyajikan perjalanan kolaboratif kami dalam mewujudkan visi digital yang kreatif. Dengan pendekatan yang inovatif, berkelanjutan, dan transparan, Ardhan Creative berkomitmen menghadirkan solusi kreatif yang membawa merek Anda mencapai potensi maksimalnya.
                        Bersama Kami, Visi Anda Menjadi Kenyataan.</p>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500 video-duration">-</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button class="share-button flex items-center text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                </svg>
                                Share
                            </button>
                            <a href="#" class="download-link flex items-center text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Enhanced CTA Section -->
    <section class="cta-section py-24 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-700 to-purple-800 z-0"></div>
        <div class="cta-particles absolute inset-0 z-1"></div>
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
                                <span class="inline-block">Siap Untuk Transformasi</span>
                                <span class="inline-block ml-2 relative">
                                    Digital?
                                    <svg class="absolute -bottom-3 left-0 w-full" height="6" viewBox="0 0 100 6" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.5 3C20 -1 40 8 50 3C60 -2 80 6 100 3" stroke="#4F46E5" stroke-width="5" fill="none" stroke-linecap="round"/>
                                    </svg>
                                </span>
                            </h2>
                            <p class="cta-description text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                                Konsultasikan kebutuhan digital bisnis Anda untuk solusi terbaik yang akan menumbuhkan perusahaan Anda.
                            </p>
                        </div>
                        
                        <!-- Two column layout for options -->
                        <div class="grid md:grid-cols-2 gap-8 mb-10">
                            <div class="cta-feature bg-white/5 hover:bg-white/10 rounded-xl p-6 transition-all transform hover:-translate-y-1 cursor-pointer border border-white/10 hover:border-white/20">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Konsultasi Gratis</h3>
                                <p class="text-blue-100">Diskusikan kebutuhan Anda dengan tim ahli kami tanpa biaya</p>
                            </div>
                            
                            <div class="cta-feature bg-white/5 hover:bg-white/10 rounded-xl p-6 transition-all transform hover:-translate-y-1 cursor-pointer border border-white/10 hover:border-white/20">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Layanan Cepat</h3>
                                <p class="text-blue-100">Proses pengerjaan efisien dengan hasil berkualitas tinggi</p>
                            </div>
                        </div>
                        
                        <!-- CTA Button -->
                        <div class="text-center">
                            <div class="cta-button-wrapper inline-block relative">
                                <div class="cta-button-glow absolute inset-0 rounded-full bg-blue-500 blur-md opacity-75 group-hover:opacity-100 transition-all animate-pulse"></div>
                                <button id="ctaButton" class="cta-button relative px-8 py-4 bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-500 hover:to-blue-400 text-white font-semibold text-lg rounded-full shadow-lg hover:shadow-indigo-500/50 transform transition-all hover:-translate-y-1 active:translate-y-0 overflow-hidden group">
                                    <span class="relative z-10 flex items-center justify-center space-x-2">
                                        <span>Hubungi Kami Sekarang</span>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </span>
                                    <span class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-blue-300 opacity-0 group-hover:opacity-20 transition-opacity"></span>
                                </button>
                            </div>
                            <p class="text-blue-200 mt-6 text-sm">*Tanpa kewajiban, batalkan kapan saja</p>
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
        
        // Team card hover effect
        const teamCards = document.querySelectorAll('.team-card');
        teamCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.querySelector('.team-social').style.opacity = '1';
                card.querySelector('.team-social').style.transform = 'translateY(0)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.querySelector('.team-social').style.opacity = '0';
                card.querySelector('.team-social').style.transform = 'translateY(10px)';
            });
        });
    });

    // Script to handle CTA section animations
document.addEventListener('DOMContentLoaded', function() {
    // Reveal animations when section comes into view
    const ctaSection = document.querySelector('.cta-section');
    const ctaTitle = document.querySelector('.cta-title');
    const ctaDesc = document.querySelector('.cta-description');
    const ctaFeatures = document.querySelectorAll('.cta-feature');
    const ctaButton = document.querySelector('.cta-button-wrapper');
    
    // Create intersection observer
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            // Animate title
            setTimeout(() => {
                ctaTitle.style.transition = 'all 0.8s ease-out';
                ctaTitle.style.opacity = '1';
                ctaTitle.style.transform = 'translateY(0)';
            }, 300);
            
            // Animate description
            setTimeout(() => {
                ctaDesc.style.transition = 'all 0.8s ease-out';
                ctaDesc.style.opacity = '1';
                ctaDesc.style.transform = 'translateY(0)';
            }, 500);
            
            // Animate features
            ctaFeatures.forEach((feature, index) => {
                setTimeout(() => {
                    feature.style.transition = 'all 0.6s ease-out';
                    feature.style.opacity = '0';
                    feature.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        feature.style.opacity = '1';
                        feature.style.transform = 'translateY(0)';
                    }, 100);
                }, 700 + (index * 200));
            });
            
            // Animate button
            setTimeout(() => {
                ctaButton.style.transition = 'all 0.8s ease-out';
                ctaButton.style.opacity = '0';
                ctaButton.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    ctaButton.style.opacity = '1';
                    ctaButton.style.transform = 'translateY(0)';
                }, 100);
            }, 1200);
            
            // Create particles
            createParticles();
            
            // Disconnect observer after animation
            observer.disconnect();
        }
    }, { threshold: 0.3 });
    
    observer.observe(ctaSection);
    
    // Button pulse effect
    const ctaButtonEl = document.getElementById('ctaButton');
    ctaButtonEl.addEventListener('mouseover', function() {
        this.style.transform = 'translateY(-4px)';
    });
    
    ctaButtonEl.addEventListener('mouseout', function() {
        this.style.transform = 'translateY(0)';
    });
    
    // Create particles
    function createParticles() {
        const particlesContainer = document.querySelector('.cta-particles');
        const particleCount = 20;
        
        for (let i = 0; i < particleCount; i++) {
            const size = Math.random() * 4 + 1;
            const particle = document.createElement('div');
            
            particle.classList.add('cta-particle');
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.opacity = Math.random() * 0.5 + 0.1;
            
            particlesContainer.appendChild(particle);
            
            // Random floating animation
            anime({
                targets: particle,
                translateX: [
                    { value: (Math.random() - 0.5) * 50, duration: 5000 },
                    { value: (Math.random() - 0.5) * 50, duration: 5000 }
                ],
                translateY: [
                    { value: (Math.random() - 0.5) * 50, duration: 5000 },
                    { value: (Math.random() - 0.5) * 50, duration: 5000 }
                ],
                opacity: [
                    { value: Math.random() * 0.5 + 0.5, duration: 2000 },
                    { value: Math.random() * 0.3 + 0.1, duration: 2000 }
                ],
                easing: 'easeInOutQuad',
                direction: 'alternate',
                loop: true
            });
        }
    }
    
    // Modified anime.js micro implementation - just enough for our particles
    function anime(params) {
        const targets = params.targets;
        const duration = params.translateX[0].duration;
        const startX = parseFloat(targets.style.transform.replace(/[^\d.-]/g, '') || 0);
        const startY = parseFloat(targets.style.transform.replace(/[^\d.-]/g, '') || 0);
        const targetX = params.translateX[0].value;
        const targetY = params.translateY[0].value;
        const startOpacity = parseFloat(targets.style.opacity || 0);
        const targetOpacity = params.opacity[0].value;
        
        let startTime;
        
        function animate(time) {
            if (!startTime) startTime = time;
            const elapsed = time - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function (easeInOutQuad)
            const eased = progress < 0.5 ? 2 * progress * progress : 1 - Math.pow(-2 * progress + 2, 2) / 2;
            
            // Apply transforms
            const currentX = startX + (targetX - startX) * eased;
            const currentY = startY + (targetY - startY) * eased;
            const currentOpacity = startOpacity + (targetOpacity - startOpacity) * eased;
            
            targets.style.transform = `translate(${currentX}px, ${currentY}px)`;
            targets.style.opacity = currentOpacity;
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else if (params.direction === 'alternate' && params.loop) {
                // Reverse values and continue animation
                params.translateX = [
                    { value: startX, duration: duration },
                    { value: targetX, duration: duration }
                ];
                params.translateY = [
                    { value: startY, duration: duration },
                    { value: targetY, duration: duration }
                ];
                params.opacity = [
                    { value: startOpacity, duration: duration / 2 },
                    { value: targetOpacity, duration: duration / 2 }
                ];
                anime(params);
            }
        }
        
        requestAnimationFrame(animate);
        
        return {
            pause: function() {},
            play: function() {}
        };
    }
});
// Video autoplay when section comes into view
document.addEventListener('DOMContentLoaded', function() {
    const videoSection = document.querySelector('.video-profile-section');
    const video = document.getElementById('companyProfileVideo');
    const playButtonOverlay = document.querySelector('.play-button-overlay');
    const playButton = document.querySelector('.play-button');
    const pauseButton = document.querySelector('.pause-button');
    const muteButton = document.querySelector('.mute-button');
    const progressBar = document.querySelector('.progress-bar');
    const progressContainer = document.querySelector('.progress-container');
    const shareButton = document.querySelector('.share-button');
    const downloadLink = document.querySelector('.download-link');
    
    // Check if video exists
    if (!video) return;
    
    // Set video to muted by default for autoplay to work on most browsers
    video.muted = true;
    
    // Function to handle video play
    function playVideo() {
        video.play()
            .then(() => {
                // Hide play button overlay once video is playing
                playButtonOverlay.classList.add('hidden');
            })
            .catch(error => {
                console.error("Video play failed:", error);
                // Keep play button visible if autoplay fails
            });
    }
    
    // Function to pause video
    function pauseVideo() {
        video.pause();
        // Show play button overlay again
        playButtonOverlay.classList.remove('hidden');
    }
    
    // Toggle mute
    function toggleMute() {
        video.muted = !video.muted;
        
        // Update mute button icon
        if (video.muted) {
            muteButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
                </svg>
            `;
        } else {
            muteButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                </svg>
            `;
        }
    }
    
    // Update progress bar as video plays
    function updateProgress() {
        const percent = (video.currentTime / video.duration) * 100;
        progressBar.style.width = `${percent}%`;
    }
    
    // Set video current time when clicking on progress bar
    function setProgress(e) {
        const progressWidth = progressContainer.clientWidth;
        const clickPosition = e.offsetX;
        const percentage = clickPosition / progressWidth;
        video.currentTime = percentage * video.duration;
    }
    
    // Share functionality
    function shareVideo() {
        if (navigator.share) {
            navigator.share({
                title: 'Ardhan Creative Company Profile',
                text: 'Tonton video company profile Ardhan Creative',
                url: window.location.href,
            })
            .catch(err => console.error('Error sharing:', err));
        } else {
            // Fallback - copy URL to clipboard
            const dummyInput = document.createElement('input');
            document.body.appendChild(dummyInput);
            dummyInput.value = window.location.href;
            dummyInput.select();
            document.execCommand('copy');
            document.body.removeChild(dummyInput);
            
            // Show tooltip or notification
            alert('URL copied to clipboard!');
        }
    }
    
    // Event Listeners
    playButton.addEventListener('click', playVideo);
    pauseButton.addEventListener('click', pauseVideo);
    muteButton.addEventListener('click', toggleMute);
    video.addEventListener('timeupdate', updateProgress);
    progressContainer.addEventListener('click', setProgress);
    shareButton.addEventListener('click', shareVideo);
    
    // Reset video state when it ends
    video.addEventListener('ended', function() {
        playButtonOverlay.classList.remove('hidden');
        progressBar.style.width = '0%';
    });
    
    // When video is clicked, toggle play/pause
    video.addEventListener('click', function() {
        if (video.paused) {
            playVideo();
        } else {
            pauseVideo();
        }
    });
    
    // IntersectionObserver to detect when video section is visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // If video section is in view
            if (entry.isIntersecting) {
                // Autoplay video when it comes into view
                playVideo();
                
                // Add active class to reveal animation
                const revealElements = videoSection.querySelectorAll('.reveal-element');
                revealElements.forEach(element => {
                    element.classList.add('active');
                });
            } else {
                // Pause video when it goes out of view
                pauseVideo();
            }
        });
    }, { threshold: 0.5 }); // 50% of the section needs to be visible
    
    // Start observing the video section
    observer.observe(videoSection);
    
    // Handle fullscreen toggle
    document.addEventListener('fullscreenchange', function() {
        if (document.fullscreenElement === video) {
            // Video is now fullscreen
        } else {
            // Video is no longer fullscreen
        }
    });
});
</script>
@endpush