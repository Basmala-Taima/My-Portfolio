@extends('layouts.app')
@section('title', 'About | Basmala Taima')
@section('content')
<section class="page-hero container">
    <p class="overline">GET TO KNOW ME</p>
    <h1>More than just <em>code.</em></h1>
    <p class="lead">I’m driven by curiosity, challenged by problems, and inspired by the process of turning ideas into reality.</p>
</section>
<section class="section container two-column">
    <div class="about-art">
        <div class="about-monogram">BT<span>.</span></div>
        <span class="art-caption">THINK · CREATE · GROW</span>
    </div>
    <div class="prose">
        <p class="overline">MY STORY</p>
        <h2>Hi, I'm <em>Basmala.</em></h2>
        <p>I'm a web developer in the making, passionate about building meaningful digital experiences and understanding what happens behind the screen.</p>
        <p>My journey started with curiosity about how websites work, and gradually grew into a passion for both frontend and backend development. I enjoy exploring how design, logic, and functionality come together to create something useful.</p>
        <p>I believe becoming a good developer is about more than learning technologies. It's about thinking critically, solving problems, staying curious, and never stopping the process of improvement.</p>
        <p>I'm still learning, experimenting, and building — one project at a time.</p>
        <a class="btn btn-primary" href="{{ route('projects.index') }}">Explore my projects ↗</a>
    </div>
</section>
<section class="section container">
    <div class="section-heading">
        <div>
            <p class="overline">WHAT DRIVES ME</p>
            <h2>The way I <em>think.</em></h2>
        </div>
    </div>
    <div class="value-grid">
        <article class="value-card">
            <span>01</span>
            <h3>Curiosity first</h3>
            <p>I love exploring how things work, asking questions, and discovering better ways to approach problems.</p>
        </article>
        <article class="value-card">
            <span>02</span>
            <h3>Learn by building</h3>
            <p>I believe real growth comes from applying knowledge, making mistakes, and turning lessons into working projects.</p>
        </article>
        <article class="value-card">
            <span>03</span>
            <h3> Progress over perfection</h3>
            <p>Every challenge is an opportunity to improve, strengthen my skills, and become a better developer.</p>
        </article>
    </div>
</section>
@endsection
