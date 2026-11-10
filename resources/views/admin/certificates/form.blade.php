@extends('admin.layout')
@section('title','Certificate') 
@section('section','CERTIFICATES')
@section('content')
<div class="admin-heading">
    <h1>{{ $certificate->exists ? 'Edit certificate' : 'New certificate' }}<span class="purple">.</span></h1>
</div>
<form class="admin-form admin-panel" method="POST" enctype="multipart/form-data" action="{{ $certificate->exists ? route('admin.certificates.update',$certificate) : route('admin.certificates.store') }}">
    @csrf 
    @if($certificate->exists)
        @method('PUT')
    @endif
    <label>Certificate title
        <input name="title" required value="{{ old('title',$certificate->title) }}">
    </label>
    <label>Issuer
        <input name="issuer" required value="{{ old('issuer',$certificate->issuer) }}">
    </label>
    <label>Issue date
        <input type="date" name="issued_at" value="{{ old('issued_at',$certificate->issued_at?->format('Y-m-d')) }}">
    </label>
    <label>Credential URL
        <input type="url" name="credential_url" value="{{ old('credential_url',$certificate->credential_url) }}">
    </label>
    <label>Description
        <textarea name="description" rows="4">{{ old('description',$certificate->description) }}</textarea>
    </label>
    <label>Image
        <input type="file" name="image" accept="image/png,image/jpeg,image/webp">
    </label>
    <div class="form-actions">
        <button class="btn btn-primary">Save certificate ↗</button>
        <a class="btn btn-ghost" href="{{ route('admin.certificates.index') }}">Cancel</a>
    </div>
</form>
@endsection
