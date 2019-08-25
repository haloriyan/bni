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
    <div class="kelas bag lebar-25">
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
    </div>
    <div class="kelas bag lebar-25">
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
    </div>
    <div class="kelas bag lebar-25">
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
    </div>
    <div class="kelas bag lebar-25">
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
    </div>
</div>
@endsection