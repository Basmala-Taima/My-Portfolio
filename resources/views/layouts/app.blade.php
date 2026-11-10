<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#09070d">
    <title>@yield('title', 'Basmala Taima | Web Developer')</title>
    <meta name="description" content="Basmala Taima — Web Developer building modern digital experiences.">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
    @stack('styles')
</head>
<body>
<header class="site-header"><nav class="nav container">
    <a class="brand" href="{{ route('home') }}">BT<span>.</span></a>
    <button class="menu-toggle" aria-label="Toggle navigation" aria-expanded="false">☰</button>
    <div class="nav-links">
        <a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        <a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
        <a class="{{ request()->routeIs('skills') ? 'active' : '' }}" href="{{ route('skills') }}">Skills</a>
        <a class="{{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">Projects</a>
        <a class="{{ request()->routeIs('certificates') ? 'active' : '' }}" href="{{ route('certificates') }}">Certificates</a>
        <a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
    </div>
    <a class="btn btn-small btn-outline nav-cta" href="{{ route('contact') }}">Let's talk <span>↗</span></a>
</nav></header>
<main>@if(session('success'))<div class="container"><div class="alert success">{{ session('success') }}</div></div>@endif @yield('content')</main>
<footer class="footer"><div class="container footer-inner"><a class="brand" href="{{ route('home') }}">BT<span>.</span></a><p>Designed & built with purpose.</p><p>© {{ date('Y') }} Basmala Taima</p></div></footer>
<script src="{{ asset('js/portfolio.js') }}"></script>@stack('scripts')
</body></html>
