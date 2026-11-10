<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','Admin') | BT.</title>
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>

<body class="admin-body">
    <div class="admin-shell">
        
        <aside class="admin-sidebar">
            <a class="brand" href="{{ route('admin.dashboard') }}">BT<span>.</span></a>
            <p class="overline">WORKSPACE</p>
            <a href="{{ route('admin.dashboard') }}">Overview</a>
            <a href="{{ route('admin.projects.index') }}">Projects</a>
            <a href="{{ route('admin.skills.index') }}">Skills</a>
            <a href="{{ route('admin.certificates.index') }}">Certificates</a>
            <a href="{{ route('admin.messages.index') }}">Messages</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="sidebar-logout">Log out\↗</button>
            </form>
            <a class="back-site" href="{{ route('home') }}">← View website</a>
        </aside>
        <main class="admin-main">
            <div class="admin-top">
                <span>ADMINISTRATION / @yield('section','OVERVIEW')</span>
                <span>{{session('admin_name') }}</span>
            </div>
            @if(session('success'))
                <div class="alert success">{{session('success') }}</div>
            @endif 
            @yield('content')
        </main>
    </div>
</body>

</html>