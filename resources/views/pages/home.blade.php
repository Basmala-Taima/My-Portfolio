@extends('layouts.app')
@section('title', 'Basmala Taima | Web Developer')
@section('content')
<section class="hero container">
    <div class="hero-copy reveal">
        <div class="eyebrow">
            <span class="status-dot"></span>
            AVAILABLE FOR LEARNING & COLLABORATION
        </div>
        <p class="overline">HELLO, I'M BASMALA TAIMA</p>
        <h1>Building digital<br>experiences with <em>purpose.</em></h1>
        <p class="lead">I'm a Web Developer passionate about turning ideas into functional, modern, and meaningful web applications.</p>
        <div class="hero-actions">
            <a class="btn btn-primary" href="{{ route('projects.index') }}">Explore my work <span>↗</span></a>
            <a class="btn btn-ghost" href="{{ route('contact') }}">Get in touch</a>
        </div>
        <div class="social-links">

            <!-- WhatsApp -->
            <a href="https://wa.me/201093381213" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
            </a>

            <!-- GitHub -->
            <a href="https://github.com/Basmala-Taima" target="_blank">
                <i class="fa-brands fa-github"></i>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/basmala-taima-13153a378"target="_blank">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
            </div>
    </div>
    <div class="hero-art reveal">
        <div class="orb orb-one"></div>
        <div class="orb orb-two"></div>
        <div class="hero-monogram">B<span>T.</span></div>
        <div class="art-caption">CREATIVE MIND<br>DEVELOPER'S LOGIC</div>
        <div class="orbit orbit-a"></div>
        <div class="orbit orbit-b"></div>
    </div>
    <a class="scroll-hint" href="#selected-work">SCROLL TO EXPLORE <span>↓</span></a>
</section>
<section class="section container" id="selected-work">
    <div class="section-heading">
        <div>
            <p class="overline">A FEW THINGS I'VE BUILT</p>
            <h2>Selected <em>work.</em></h2>
        </div>
        <a class="text-link" href="{{ route('projects.index') }}">View all projects ↗</a>
    </div>
    @if($featuredProjects->count())
        <div class="project-grid">
            @foreach($featuredProjects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <span class="empty-icon">✳</span>
            <h3>Good work is in progress.</h3>
            <p>Projects will appear here soon.</p>
        </div>
    @endif
</section>
<section class="statement-band">
    <div class="container statement-inner">
        <p class="overline">MY APPROACH</p>
        <h2>Thoughtful code.
            <br>
            <em>Meaningful impact.</em>
        </h2>
        <a class="btn btn-outline" href="{{ route('about') }}">A little about me ↗</a>
    </div>
</section>
<section class="section container mini-contact">
    <div>
        <p class="overline">HAVE A PROJECT IN MIND?</p>
        <h2>Let's create something
            <br>
            <em>remarkable.</em>
        </h2>
    </div>
    <a class="round-link" href="{{ route('contact') }}">↗</a>
</section>
@endsection
