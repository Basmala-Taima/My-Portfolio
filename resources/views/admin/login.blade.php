@extends('layouts.app')
@section('title','Admin Login')
@section('content')
<section class="login-wrap">
    <form class="login-card" method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <p class="overline">PRIVATE WORKSPACE</p>
        <h1>Welcome <em>back.</em></h1>
        <p class="muted">Sign in to manage your portfolio.</p>
        @if(session('error'))
            <div class="alert error">{{session('error') }}</div>
        @endif
        <label>Email
            <input type="email" name="email" value="{{ old('email') }}"required autocomplete="username">
        </label>
        <label>Password
            <input type="password" name="password" required autocomplete="current-password">
        </label>
        @if($errors->any())
            <div class="alert error">{{ $errors->first()}}</div>
        @endif
        <button class="btn btn-primary" type="submit">Sign in ↗</button>
    </form>
</section>
@endsection