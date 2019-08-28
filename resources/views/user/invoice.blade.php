@extends('layouts.user')

@section('title', 'Invoice | Belajar Ngeweb ID')
@section('title.second', 'Invoice')

@php
    function toIdr($angka) {
        return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
    }
@endphp

@section('content')
<div class="container">
    <div class="rata-tengah">
        <div class="rata-kiri d-inline-block lebar-60">
            @if ($inv->count() == 0)
                <div class="rata-tengah">
                    <h2>Tidak ada tagihan</h2>
                    <a href="{{ route('user.listKelas') }}">
                        <button class="oren">Lihat kelas saya</button>
                    </a>
                </div>
            @else
                <h3>List kelas yang belum dibayar</h3>
                @foreach ($inv as $item)
                    <div class="bg-putih rounded mb-2 p-2">
                        <div class="bag bag-7 d-inline-block">
                            <p>{{ $item->kelas->title }}</p>
                            <p class="teks-transparan">{{ toIdr($item->kelas->price) }}</p>
                        </div>
                        <div class="bag bag-3 d-inline-block rata-kanan">
                            <a href="{{ route('invoice.bayar', $item->id) }}">
                                <button class="oren mt-3">Bayar</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection