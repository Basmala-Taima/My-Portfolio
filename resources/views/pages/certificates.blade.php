@extends('layouts.app')
@section('title', 'Certificates & Activities | Basmala Taima')
@section('content')
<section class="page-hero container">
    <p class="overline">LEARNING IN MOTION</p>
    <h1>Certificates & <em>milestones.</em></h1>
    <p class="lead">Courses, events, and experiences that are part of my learning journey.</p>
</section>
<section class="section container">
    <div class="certificate-grid">
        @forelse($certificates as $certificate)
            <article class="certificate-card">
                @if($certificate->image)
                    <img src="{{ asset('storage/'.$certificate->image) }}" alt="{{ $certificate->title }}">
                @else
                    <div class="certificate-placeholder">✳</div>
                @endif
                <div class="certificate-info">
                    <p class="overline">{{ $certificate->issuer }}</p>
                    <h3>{{ $certificate->title }}</h3>
                    @if($certificate->issued_at)
                        <p class="muted">{{ $certificate->issued_at->format('M Y') }}</p>
                    @endif
                    @if($certificate->description)
                        <p>{{ $certificate->description }}</p>
                    @endif
                    @if($certificate->credential_url)
                        <a class="text-link" href="{{ $certificate->credential_url }}" target="_blank" rel="noopener">View credential ↗</a>
                    @endif
                </div>
            </article>
            @empty
            <div class="empty-state">
                <h3>More milestones ahead.</h3>
                <p>Certificates and activities will be added here.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
