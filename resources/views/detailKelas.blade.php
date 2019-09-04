@extends('layouts.user')

@section('title', $classData->title.' | Belajar Ngeweb ID')
@section('title.second', $classData->title)

@section('head.dependencies')
<style>
    body { background-color: #ecf0f1 !important; }
    .cover {
        height: 350px;
        background-size: cover !important;
        background-position: center center !important;
        width: 100%;
        border-radius: 6px;
    }
    img.profil {
        width: 50px;
        height: 50px;
    }
    .atas.khusus {
        background: rgba(0, 0, 0, 0.4);
    }
    .konten {
        position: absolute;
        top: 0px;left: 0px;right: 0px;
        height: 570px;
    }
    .konten .covers {
        height: 500px;
        background-size: cover !important;
        background-position: center center !important;
        filter: blur(2px);
    }
    .konten .tutupCover {
        margin-top: -500px;
        background: rgba(0, 0, 0, 0.4);
        position: relative;
        height: 500px;
    }
    .container {
        top: 500px;left: 0px;right: 0px;
    }
    .authorSection .foto {
        width: 150px;
        height: 150px;
        margin-top: -100px;
        border: 15px solid #fff;
    }
</style>
@endsection

@section('content')
<div class="konten">
    <div class="covers" style="background: url('{{ asset('storage/covers/'.$classData->cover) }}')">&nbsp;</div>
    <div class="tutupCover"></div>
</div>

<div class="container">
    <div class="authorSection bg-putih bayangan-5 pb-1 pt-2 pl-5 pr-5">
        <div class="bag bag-2">
            <img src="{{ asset('storage/avatars/'.$classData->users->photo) }}" class="foto rounded-circle">
        </div>
        <div class="bag bag-6">
            <h2 class="mt-1">{{ $classData->title }}</h2>
            <p class="teks-transparan mb-0">{{ $classData->users->name }}</p>
        </div>
        <div class="bag bag-2 rata-tengah">
            @if (Auth::guard('user')->check())
                @php
                    $actionRoute = $isJoined == 1 ? "learn.start" : "kelas.join";
                    $actionMethod = $isJoined == 1 ? "GET" : "POST";
                    $csrfField = $isJoined == 1 ? "" : csrf_field();
                    $textButton = $isJoined == 1 ? "Mulai Belajar" : "Gabung Kelas";
                @endphp
                <form action="{{ route($actionRoute, $classData->id) }}" method="{{ $actionMethod }}">
                    {{ $csrfField }}
                    <button class="mt-2 oren lebar-100">{{ $textButton }}</button>
                </form>
            @else
                <div class="rata-tengah">
                    <p>Login dulu untuk mulai belajar</p>
                </div>
            @endif
        </div>
    </div>

    <div class="wrap">
        <div class="bag bag-5 bg-putih rounded bayangan-5">
            <div class="wrap">
                <p>{{ $classData->description }}</p>
            </div>
        </div>
        <div class="bag bag-5">
            <div class="wrap mt-0">
                <h3 class="teks-gelap">List Materi</h3>
                @foreach ($materials as $item)
                    <div class="bg-putih rounded bayangan-5 p-3 mb-2">
                        {{ $item->title }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="containers d-none teks-gelap">
    <div class="bag bag-5">
        
    </div>
    <div class="bag bag-1"></div>
    <div class="bag bag-4">
        <h2 class="mt-1">{{ $classData->title }}</h2>
        <p class="teks-transparan">
            {{ $classData->description }}
        </p>
        @if (Auth::guard('user')->check())
            @php
                $actionRoute = $isJoined == 1 ? "learn.start" : "kelas.join";
                $actionMethod = $isJoined == 1 ? "GET" : "POST";
                $csrfField = $isJoined == 1 ? "" : csrf_field();
            @endphp
            <form action="{{ route($actionRoute, $classData->id) }}" method="{{ $actionMethod }}">
                {{ $csrfField }}
                <button class="oren lebar-100">Mulai Belajar</button>
            </form>
        @else
            <div class="rata-tengah">
                <p>Login dulu untuk mulai belajar</p>
            </div>
        @endif
        <div class="mt-4">
            <h2>Kelas oleh :</h2>
            <div class="bag bag-2 rata-tengah">
                <img src="{{ asset('storage/avatars/'.$classData->users->photo) }}" class="d-inline-block rounded-circle profil">
            </div>
            <div class="bag bag-8">
                <h3 class="d-inline-block">{{ $classData->users->name }}</h3>
            </div>
        </div>
    </div>
    <div class="bag bag-10 rata-tengah">
        <div class="bag bag-8 d-inline-block rata-kiri">
            <h3>List Materi</h3>
            @foreach ($materials as $item)
                <div class="bg-putih rounded bayangan-5 p-3 mb-2">
                    {{ $item->title }}
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="{{ asset('js/embo.js') }}"></script>
<script>
    window.onscroll = (e) => {
        scrollHandler(e)
    };
    function scrollHandler() {
        let scrolled = document.body.scrollTop || document.documentElement.scrollTop
        let classToNavbar = (scrolled > 120) ? "atas" : "atas khusus"
        document.querySelector(".atas").className = classToNavbar
    }
    scrollHandler()
</script>
@endsection