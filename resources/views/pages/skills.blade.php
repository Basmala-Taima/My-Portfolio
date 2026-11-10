@extends('layouts.app')
@section('title', 'Skills | Basmala Taima')
@section('content')
<section class="page-hero container">
    <p class="overline">TOOLS OF THE TRADE</p>
    <h1>My technical <em>toolkit.</em></h1>
    <p class="lead">Technologies and tools I use, explore, and continue developing.</p>
</section>
<section class="section container">
    @forelse($skills as $category => $items)
        <div class="skill-group">
            <div class="skill-group-title">
                <span class="purple-line"></span>
                <h2>{{ $category }}</h2>
            </div>
            <div class="skill-list">
                @foreach($items as $skill)
                    <div class="skill-chip">
                        @if($skill->icon)
                            <img
                                src="{{ asset('storage/' . $skill->icon) }}"
                                alt="{{ $skill->name }}"
                                class="skill-icon"
                                width="95" height="95"
                            >
                        @endif
                        <h5>{{ $skill->name }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
        @empty
        <div class="empty-state">
            <h3>Skills are being updated.</h3>
            <p>Check back soon.</p>
        </div>
    @endforelse
</section>
@endsection
