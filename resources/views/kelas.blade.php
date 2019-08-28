@extends('layouts.user')

@section('title', 'Belajar Ngeweb ID | Belajar Ngeweb ID')
@section('title.second', 'Kelas Saya')

@section('head.dependencies')
<style>
    .container { top: 120px; }
    .kelas .cover {
        height: 200px;
        background-size: cover !important;
        background-position: center center !important;
    }
    .kelas h4 { line-height: 25px; }
    .kelas .header {
        line-height: 50px;
        padding: 0px 25px;
        display: flex;
        align-items: center;
    }
    .kelas .authorsAvatar {
        width: 30px;
        height: 30px;
        float: left;
        margin-right: 10px;
    }
</style>
@endsection

@section('content')
<div class="container">
    {{-- <div class="kelas bag lebar-25">
        <div class="wrap">
            <div class="bg-putih rounded pb-1">
                <div class="header">
                    <img src="{{ asset('storage/avatars/riyan.jpg') }}" class="authorsAvatar rounded-circle">
                    belajarngewebid
                </div>
                <div class="cover" style="background: url({{ asset('storage/covers/cover.png') }})"></div>
                <div class="wrap">
                    <h4>Tutorial cara mendownload gambar di Instagram dengan mudah</h4>
                    <button class="oren-alt lebar-100 tinggi-50 p-0">Mulai Belajar</button>
                </div>
            </div>
        </div>
    </div> --}}
    @if($myClass->count() == 0)
        <div class="rata-tengah">
            <h2>Tidak ada kelas</h2>
            <form action="{{ route('user.cariKelas') }}" class="lebar-50 d-inline-block">
                <div class="bag bag-7">
                    <input type="text" class="box-2" name="term" placeholder="Cari tutorial favoritmu...">
                </div>
                <div class="bag bag-1">&nbsp;</div>
                <div class="bag bag-2">
                    <button class="oren lebar-100">Cari</button>
                </div>
            </form>
        </div>
    @else
        @foreach ($myClass as $item)
            <div class="kelas bag lebar-25">
                <div class="wrap">
                    <div class="bg-putih rounded pb-1">
                        <div class="header">
                            <img src="{{ asset('storage/avatars/riyan.jpg') }}" class="authorsAvatar rounded-circle">
                            {{ $item->kelas->users->name }}
                        </div>
                        <div class="cover" style="background: url({{ asset('storage/covers/cover.png') }})"></div>
                        <div class="wrap">
                            <h4>{{ $item->title }}</h4>
                            <button class="oren-alt lebar-100 tinggi-50 p-0">Mulai Belajar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection