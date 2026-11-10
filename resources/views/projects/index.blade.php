@extends('layouts.app')
@section('title', 'Projects | Basmala Taima')
@section('content')
<section class="page-hero container">
    <p class="overline">A COLLECTION OF BUILDS</p>
    <h1>Selected <em>projects.</em></h1>
    <p class="lead">A look at experiments, learning projects, and solutions I've worked on.</p>
</section>
<section class="section container">
    <div class="project-grid">
        @forelse($projects as $project)
            <x-project-card :project="$project" />
            @empty
            <div class="empty-state">
                <h3>Projects are coming soon.</h3>
                <p>I'm working on adding selected work here.</p>
            </div>
        @endforelse
    </div>
    <div class="pagination">{{ $projects->links() }}</div>
</section>
@endsection
