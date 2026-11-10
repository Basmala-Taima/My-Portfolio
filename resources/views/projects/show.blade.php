@extends('layouts.app')
@section('title', $project->title.' | Basmala Taima')
@section('content')
<section class="page-hero container">
    <a class="back-link" href="{{ route('projects.index') }}">← Back to projects</a>
    <p class="overline">{{ $project->category }}</p>
    <h1>{{ $project->title }}<em>.</em></h1>
    <p class="lead">{!! nl2br(e($project->short_description)) !!}</p>
</section>
<section class="section container">
    <div class="detail-image">
        @if($project->image)
            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">
        @else
            <div class="image-placeholder">
                <span>BT<span class="purple">.</span></span>
            </div>
        @endif
    </div>
    <div class="detail-layout">
        <article class="prose">
            <p class="overline">OVERVIEW</p>
            <h2>About this <em>project.</em></h2>
            <div class="description-text">{!! nl2br(e($project->description)) !!}</div>
        </article>
        <aside class="detail-sidebar">
            <p class="overline">TECHNOLOGIES</p>
            <div class="tags">
                @foreach(($project->tech_stack ?? []) as $tech)
                    <span>{{ $tech }}</span>
                @endforeach
            </div>
            <div class="detail-links">
                @if($project->demo_url)
                    <a class="btn btn-primary" href="{{ $project->demo_url }}" target="_blank" rel="noopener">Live demo ↗</a>
                @endif 
                @if($project->github_url)
                    <a class="btn btn-outline" href="{{ $project->github_url }}" target="_blank" rel="noopener">GitHub ↗</a>
                @endif
            </div>
        </aside>
    </div>
</section>
@endsection
