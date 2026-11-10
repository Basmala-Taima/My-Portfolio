@extends('admin.layout')
@section('title', $project->exists ? 'Edit Project' : 'Add Project')
@section('section','PROJECTS')
@section('content')
<div class="admin-heading">
    <p class="overline">CONTENT MANAGEMENT</p>
    <h1>{{ $project->exists ? 'Edit project' : 'New project' }}<span class="purple">.</span></h1>
</div>
<form class="admin-form admin-panel" method="POST" enctype="multipart/form-data" action="{{ $project->exists ? route('admin.projects.update',$project) : route('admin.projects.store') }}">
    @csrf
        @if($project->exists)
        @method('PUT')
    @endif
    <label>Project title
        <input name="title" required value="{{ old('title',$project->title) }}">
    </label>
    <label>Short description
        <textarea name="short_description" required maxlength="255">{{ old('short_description',$project->short_description) }}</textarea>
    </label>
    <label>Full description
        <textarea name="description" rows="7" required>{{ old('description',$project->description) }}</textarea>
    </label>
    <div class="form-row">
        <label>Category
            <input name="category" required value="{{ old('category',$project->category) }}" placeholder="Full Stack">
        </label>
        <label>Technologies <small>Comma-separated</small>
            <input name="tech_stack" value="{{ old('tech_stack',implode(', ',$project->tech_stack ?? [])) }}" placeholder="Laravel, MySQL, JavaScript">
        </label>
    </div>
    <div class="form-row">
        <label>GitHub URL
            <input type="url" name="github_url" value="{{ old('github_url',$project->github_url) }}">
        </label>
        <label>Live demo URL
            <input type="url" name="demo_url" value="{{ old('demo_url',$project->demo_url) }}">
        </label>
    </div>
    <label>Cover image
        <input type="file" name="image" accept="image/png,image/jpeg,image/webp">
    </label>
    <label>Sort order
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order',$project->sort_order ?? 0) }}">
    </label>
    <div class="check-row">
        <label>
            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured',$project->is_featured))> Featured
        </label>
        <label>
            <input type="checkbox" name="is_published" value="1" @checked(old('is_published',$project->is_published ?? true))> Published
        </label>
    </div>
    @if($errors->any())
    <div class="alert error">Please check the form fields.</div>
    @endif
    <div class="form-actions">
        <button class="btn btn-primary">Save project ↗</button>
        <a class="btn btn-ghost" href="{{ route('admin.projects.index') }}">Cancel</a>
    </div>
</form>
@endsection
