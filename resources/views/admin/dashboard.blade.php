@extends('admin.layout')
@section('title','Dashboard')
@section('content')
<div class="admin-heading">
    <p class="overline">YOUR SPACE</p>
    <h1>Dashboard<span class="purple">.</span></h1>
    <p class="muted">A quick overview of your portfolio content.</p>
</div>
<div class="stats-grid">
    @foreach([['Projects',$stats['projects']],['Skills',$stats['skills']],['Certificates',$stats['certificates']],['Unread messages',$stats['unread_messages']]] as [$label,$value])
    <div class="stat-card">
        <span>{{ $label }}</span>
        <strong>{{ $value }}</strong>  
    </div>
    @endforeach
</div>
<div class="admin-panel">
    <div class="panel-heading">
        <h2>Latest messages</h2>
        <a class="text-link" href="{{ route('admin.messages.index') }}">View all ↗</a>  
    </div>
    @forelse($latestMessages as $message)
        <div class="message-row">
            <div>
                <strong>{{ $message->name }}</strong>
                <p>{{ $message->subject ?: $message->email }}</p>   
            </div>
            <span class="muted">{{ $message->created_at->diffForHumans() }}</span>   
        </div>
        @empty
        <p class="muted">No messages yet.</p>
    @endforelse
</div>
@endsection
