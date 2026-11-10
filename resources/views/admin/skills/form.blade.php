
@extends('admin.layout')

@section('title', 'Skill')
@section('section', 'SKILLS')

@section('content')

<div class="admin-heading">
    <h1>
        {{ $skill->exists ? 'Edit skill' : 'New skill' }}
        <span class="purple">.</span>
    </h1>
</div>

<form class="admin-form admin-panel"
    method="POST"
    enctype="multipart/form-data"
    action="{{ $skill->exists ? route('admin.skills.update', $skill) : route('admin.skills.store') }}">

    @csrf

    @if($skill->exists)
        @method('PUT')
    @endif

    <label>
        Skill name
        <input
            type="text"
            name="name"
            required
            value="{{ old('name', $skill->name) }}"
        >
    </label>

    <label>
        Category
        <input
            type="text"
            name="category"
            required
            value="{{ old('category', $skill->category) }}"
            placeholder="Frontend / Backend / Tools"
        >
    </label>

    <label>
        Sort order
        <input
            type="number"
            name="sort_order"
            min="0"
            value="{{ old('sort_order', $skill->sort_order ?? 0) }}"
        >
    </label>

    <label>
        Skill icon
        <input
            type="file"
            name="icon"
            id="icon"
            accept="image/png,image/jpeg,image/webp"
        >
    </label>

    @if($skill->icon)
        <div>
            <p>Current icon:</p>
            <img
                src="{{ asset('storage/' . $skill->icon) }}"
                alt="Current skill icon"
                width="80"
                height="80"
                id="currentIcon"
                style="object-fit: contain;"
            >
        </div>
    @endif

    <div>
        <p>New icon preview:</p>
        <img
            id="preview"
            src=""
            alt="Icon preview"
            width="80"
            height="80"
            style="display:none; object-fit:contain;"
        >
    </div>

    @error('icon')
        <p class="error">{{ $message }}</p>
    @enderror

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            Save skill ↗
        </button>

        <a class="btn btn-ghost" href="{{ route('admin.skills.index') }}">
            Cancel
        </a>
    </div>

</form>

<script>
    document.getElementById('icon').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    });
</script>

@endsection
