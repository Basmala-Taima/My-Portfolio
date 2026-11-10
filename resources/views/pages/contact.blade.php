@extends('layouts.app')
@section('title', 'Contact | Basmala Taima')
@section('content')
<section class="page-hero container">
    <p class="overline">LET'S CONNECT</p>
    <h1>Have a good idea?<br><em>Let's talk.</em></h1>
    <p class="lead">For collaborations, questions, or just to say hello.</p>
</section>
<section class="section container contact-layout">
    <div class="contact-aside">
        <p class="overline">FIND ME ONLINE</p>
        <a href="https://github.com/Basmala-Taima" target="_blank" rel="noopener">GitHub ↗</a>
        <a href="https://www.linkedin.com/in/basmala-taima-13153a378" target="_blank" rel="noopener">LinkedIn ↗</a>
        <p class="muted">You can also send a message using the form.</p>
    </div>
    <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
        @csrf
    <div class="form-row">
        <label>Your name
            <input name="name" value="{{ old('name') }}" required maxlength="100" placeholder="Name">
        </label>
        <label>Email address
            <input type="email" name="email" value="{{ old('email') }}" required maxlength="150" placeholder="you@example.com">
        </label>
    </div>
    <label>Subject <span class="muted">(optional)</span>
        <input name="subject" value="{{ old('subject') }}" maxlength="150" placeholder="What is this about?">
    </label>
    <label>Your message
        <textarea name="message" rows="6" required minlength="10" maxlength="5000" placeholder="Tell me a little about it..."></textarea>
    </label>
    @if($errors->any())
        <div class="alert error">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        </div>
    @endif
    <button class="btn btn-primary" type="submit">Send message <span>↗</span></button>
</form>
</section>
@endsection
