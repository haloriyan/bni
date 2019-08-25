@extends('layouts.dashboard')

@section('title', 'Upload Materi | Belajar Ngeweb ID')

@section('head.dependencies')
<style>
    /*  */
</style>
@endsection

@section('content')
<div class="lebar-100">
    <h1 class="d-inline-block">Upload Materi</h1>
</div>
<div class="row mt-2">
    <div class="bg-putih rounded bayangan-5 p-1 mb-5">
        <div class="wrap">
            <form action="{{ route('material.store', $classData->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <div class="bg-merah-transparan p-2 mb-2 rounded">
                            {{ $err }}
                        </div>
                    @endforeach
                @endif
                <div>Title</div>
                <input type="text" class="box" name="title">
                <div class="mt-2">File :</div>
                <input type="file" name="video" class="box tinggi-50 mt-1">
                <button class="lebar-100 oren mt-3">Upload!</button>
            </form>
        </div>
    </div>
</div>
@endsection