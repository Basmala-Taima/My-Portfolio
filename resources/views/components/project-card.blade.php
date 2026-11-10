<article class="project-card reveal">
    <a class="project-image" href="{{ route('projects.show', $project->slug) }}">
        @if($project->image)
            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}">
        @else
        <div class="image-placeholder"><span>BT<span class="purple">.</span></span></div>
        @endif
        <span class="image-arrow">↗</span>
    </a>
    <div class="project-meta">
        <span>{{ $project->category }}</span>
        <span>{{ $project->created_at?->format('Y') }}</span>
    </div>
    <h3>
        <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
    </h3>
    <p>{{ $project->short_description }}</p>
    <div class="tags">
        @foreach(($project->tech_stack ?? []) as $tech)
            <span>{{ $tech }}</span>
        @endforeach
    </div>
</article>