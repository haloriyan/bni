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
</style>
@endsection

@section('content')
<div class="container teks-gelap">
    <div class="bag bag-5">
        <div class="cover mb-3" style="background: url('{{ asset('storage/covers/'.$classData->cover) }}')"></div>
    </div>
    <div class="bag bag-1"></div>
    <div class="bag bag-4">
        <h3>{{ $classData->title }}</h3>
        <p class="teks-transparan">
            {{ $classData->description }}
        </p>
        @if (Auth::guard('user')->check())
            <form action="{{ route('kelas.join') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="classId" value="{{ $classData->id }}">
                <button class="oren lebar-100">Mulai Belajar</button>
            </form>
        @else
            <div class="rata-tengah">
                <p>Login dulu untuk mulai belajar</p>
            </div>
        @endif
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
@endsection