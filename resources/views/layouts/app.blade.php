<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $meta_title ?? 'Ardhan Creative - Beranda' }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Ardhan Creative adalah perusahaan kreatif yang menyediakan solusi digital seperti desain grafis, pengembangan web, dan branding profesional.' }}">
    
    <link rel="icon" href="{{ asset('images/hero/logo1.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    @stack('styles')
</head>

<body class="font-sans antialiased">
    <div id="app">
        @include('partials.header')
        
        <main>
            @yield('content')
        </main>
        
        @include('partials.footer')
    </div>
    
    <!-- Tambahan Script khusus per halaman -->
    @stack('scripts')
</body>
</html>