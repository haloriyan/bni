@extends('layouts.dashboard')

@section('title', 'Kelas | Belajar Ngeweb ID')

@section('head.dependencies')
<style>
    .kelas { width: 33.3%; }
    .kelas .cover {
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
        height: 200px;
        background-size: cover !important;
        background-position: center center !important;
    }
    .kelas h4 { line-height: 25px; }
</style>
@endsection

@section('content')
<div class="lebar-100">
    <h1 class="d-inline-block">Buat Kelas</h1>
</div>
<div class="row mt-2">
    <div class="bg-putih rounded bayangan-5 p-1 mb-5">
        <div class="wrap">
            <form action="{{ route('kelas.create') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <div class="bg-merah-transparan p-2 mb-1 rounded">
                            {{ $err }}
                        </div>
                    @endforeach
                @endif
                <div>Nama kelas :</div>
                <input type="text" class="box mt-1" name="title" placeholder="Misal : Membuat API dengan Laravel">
                <div class="mt-2">Deskripsi :</div>
                <textarea name="description" class="box mt-1" placeholder="Ceritakan apa yang akan dipelajari di kelas ini"></textarea>
                <div class="mt-2">Harga :</div>
                <input type="hidden" name="price" id="price" value="0">
                <input type="text" class="box mt-1" id="priceDisplay" placeholder="Kosongkan saja jika kelas ini gratis">
                <div class="mt-2">Cover :</div>
                <input type="file" name="cover" class="box mt-1">
                <button class="oren mt-3">Buat!</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
function toAngka(angka) {
	return parseInt(angka.replace(/,.*|[^0-9]/g, ''), 10);
}
$("#priceDisplay").di('ketik', function() {
    let value = this.value
    let angka = formatRupiah(value, 'Rp. ')
    this.value = angka
    $("#price").isi(toAngka(value))
})

</script>
@endsection 