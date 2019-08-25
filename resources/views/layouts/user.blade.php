<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @yield('head.dependencies')
</head>
<body class="bg-primer">
    
<div class="atas">
    <div class="icon">
        <img src="{{ asset('img/iconsBni.png') }}" alt="Icon BNI">
    </div>
    <h1>@yield('title.second')</h1>
    <div class="menu">
        @if(Auth::guard('user')->check())
            <div class="profile">
                <img src="{{ asset('/storage/avatars/' . $myData->photo) }}" class="avatar rounded-circle">
                <div class="menu-content rounded">
                    <a href="{{ route('user.listKelas') }}"><li>Kelas saya</li></a>
                    <a href="{{ route('pengajar.dashboard') }}"><li>Panel Pengajar</li></a>
                    <a href="{{ route('user.logout') }}"><li>Logout</li></a>
                </div>
            </div>
        @else
            <a href="{{ route('user.loginPage') }}"><li class="bg-oren rounded">Login</li></a>
        @endauth
    </div>
</div>

@yield('content')

</body>
</html>