@extends('layouts.app')

@section('title', 'Portfolio')

@section('meta_description', 'Ardhan Creative menyediakan jasa pembuatan website profesional di Pati. Cepat, responsif, dan SEO friendly.')

@section('meta_keywords', 'jasa pembuatan website, web development pati, jasa web pati')

@push('styles')
<style>
    /* Core animations */
    .fade-in {opacity:0; transform:translateY(20px); transition:all 0.6s ease;}
    .fade-in.visible {opacity:1; transform:translateY(0);}
    
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
    
    /* Project Cards & Categories */
    .category-btn {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .category-btn.active {background-color:#4f46e5; color:white;}
    .project-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
    }
    .project-card.hidden {display:none;}
    .project-card:hover {transform:translateY(-8px); box-shadow:0 15px 30px rgba(0,0,0,0.1);}
    .card-overlay {
        position: absolute;
        inset: 0;
        background: rgba(79,70,229,0.9);
        opacity: 0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .project-card:hover .card-overlay {opacity:1;}
    
    /* Modal */
    .project-modal {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.8);
        z-index: 50;
        display: none;
        overflow-y: auto;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .project-modal.open {opacity:1;}
    .modal-box {
        background: white;
        margin: 5vh auto;
        width: 90%;
        max-width: 900px;
        border-radius: 1rem;
        overflow: hidden;
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.3s ease;
    }
    .project-modal.open .modal-box {transform:scale(1); opacity:1;}
    
    /* Particles */
    .particle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
        pointer-events: none;
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
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="particles-container absolute inset-0 z-0"></div>
    <div class="container mx-auto px-4 relative z-10 flex items-center min-h-screen">
        <div class="w-full max-w-5xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <!-- Left Text Content -->
                <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                    <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                        <span class="hero-title-word block">PROJECT</span>
                        <span class="hero-title-word block">YANG TELAH</span>
                        <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">KAMI</span>
                        <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">SELESAIKAN</span>
                    </h1>
                    
                    <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                        Kami telah menyelesaikan berbagai proyek digital dengan kualitas tinggi dan hasil nyata. Setiap karya mencerminkan komitmen kami terhadap inovasi, detail, dan kepercayaan klien.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Portfolio Section -->
<section class="py-16 bg-gray-50 projects-section">
    <div class="container mx-auto px-4">

        @php
            use App\Models\Portfolio;
            $portfolios = Portfolio::all();
            $categories = Portfolio::select('category')->distinct()->pluck('category');
        @endphp

        <!-- Filter -->
        <div class="flex justify-center mb-12 fade-in">
            <div class="inline-flex p-1 bg-white rounded-full shadow-md">
                <button class="category-btn px-6 py-3 rounded-full font-medium active" data-filter="semua">
                    Semua
                </button>
                @foreach($categories as $filter)
                <button class="category-btn px-6 py-3 rounded-full font-medium" data-filter="{{ strtolower($filter) }}">
                    {{ ucfirst($filter) }}
                </button>
                @endforeach
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 fade-in">
            @foreach($portfolios as $project)
            <div class="project-card bg-white shadow-md relative" data-category="{{ strtolower($project->category) }}">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-60 object-cover">
                <div class="p-6">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                        {{ ucfirst($project->category) }}
                    </span>
                    <h3 class="text-xl font-bold mt-2">{{ $project->title }}</h3>
                </div>
                <div class="card-overlay">
                    <h3 class="text-white text-2xl font-bold mb-4">{{ $project->title }}</h3>
                    <button class="detail-btn px-6 py-3 bg-white text-indigo-600 rounded-full font-medium"
                    data-project='{"title": "{{ $project->title }}", "category": "{{ $project->category }}", "image": "{{ asset("storage/" . $project->image) }}", "deskripsi": "{{ $project->deskripsi }}", "link": "{{ $project->link }}"}'>
                        Lihat Detail
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="project-modal" class="project-modal">
    <div class="modal-box">
        <button id="close-modal" class="absolute top-4 right-4 bg-gray-100 p-2 rounded-full hover:bg-gray-200 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="h-64 lg:h-full">
                <img id="modal-image" src="" alt="" class="w-full h-full object-cover">
            </div>
            <div class="p-8">
                <span id="modal-category" class="inline-block px-3 py-1 rounded-full text-xs font-semibold mb-4"></span>
                <h3 id="modal-title" class="text-3xl font-bold mb-4"></h3>
                <p id="modal-description" class="text-gray-600 mb-6"></p>
                
                <div class="mb-6">
                    <h4 class="font-bold text-lg mb-2">Teknologi</h4>
                    <div id="modal-tech" class="flex flex-wrap gap-2"></div>
                </div>
                
                <a id="modal-link" href="#" class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-all">
                    Lihat Proyek
                </a>
            </div>
        </div>
    </div>
</div>
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
                    if (entry.target.classList.contains('fade-in')) {
                        entry.target.classList.add('visible');
                    }
                    // Tambahkan CTA animation logic di sini jika perlu
                    else if (entry.target.classList.contains('cta-section')) {
                        document.querySelector('.cta-title').style.opacity = '1';
                        document.querySelector('.cta-title').style.transform = 'translateY(0)';
                        
                        setTimeout(() => {
                            document.querySelector('.cta-description').style.opacity = '1';
                            document.querySelector('.cta-description').style.transform = 'translateY(0)';
                        }, 300);
                    }
                }
            });
        }, { threshold: 0.1 });

        // Observer untuk fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
        
        // Observer untuk CTA section
        const ctaSection = document.querySelector('.cta-section');
        if (ctaSection) observer.observe(ctaSection);
    }

    // Project filtering
    function initProjectFilter() {
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.dataset.filter;
                
                // Update active button
                document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Filter projects
                document.querySelectorAll('.project-card').forEach(project => {
                    if (filter === 'semua' || project.dataset.category === filter) {
                        project.classList.remove('hidden');
                    } else {
                        project.classList.add('hidden');
                    }
                });
            });
        });
    }

    // Modal functionality (disederhanakan)
    function initModal() {
        const modal = document.getElementById('project-modal');
        const closeBtn = document.getElementById('close-modal');
        
        // Open modal with project data
        document.querySelectorAll('.detail-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const project = JSON.parse(this.dataset.project);
                
                // Update modal content
                document.getElementById('modal-title').textContent = project.title;
                document.getElementById('modal-image').src = project.image;
                document.getElementById('modal-description').textContent = project.deskripsi;
                document.getElementById('modal-category').textContent = project.category.toUpperCase();
                
                // Set link
                const linkBtn = document.getElementById('modal-link');
                if (project.link) {
                    linkBtn.href = project.link;
                    linkBtn.classList.remove('hidden');
                } else {
                    linkBtn.classList.add('hidden');
                }
                
                // Show modal
                modal.style.display = 'block';
                setTimeout(() => modal.classList.add('open'), 10);
            });
        });
        
        // Close modal
        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
        
        function closeModal() {
            modal.classList.remove('open');
            setTimeout(() => modal.style.display = 'none', 300);
        }
    }

    // Initialize all functions
    animateHero();
    initScrollAnimations();
    initProjectFilter();
    initModal();
});
</script>
@endpush