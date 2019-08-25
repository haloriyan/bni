@extends('layouts.dashboard')

@section('title', 'Kelas | Belajar Ngeweb ID')

@section('content')
<div class="lebar-100">
    <h1 class="d-inline-block">{{ $classData->title }}</h1>
</div>

@include('layouts.menuKelas')

<div class="row">
    <div class="content bg-putih rounded bayangan-5 p-1">
        <div class="wrap">
            <form action="{{ route('kelas.update', $classData->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="patch">
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <div class="bg-merah-transparan p-2 mb-1 rounded">
                            {{ $err }}
                        </div>
                    @endforeach
                @endif
                <div>Nama kelas :</div>
                <input type="text" class="box mt-1" name="title" placeholder="Misal : Membuat API dengan Laravel" value="{{ $classData->title }}">
                <div class="mt-2">Deskripsi :</div>
                <textarea name="description" class="box mt-1" placeholder="Ceritakan apa yang akan dipelajari di kelas ini">{{ $classData->description }}</textarea>
                <div class="mt-2">Harga :</div>
                <input type="hidden" name="price" id="price" value="0" value="{{ $classData->price }}">
                <input type="text" class="box mt-1" id="priceDisplay" placeholder="Kosongkan saja jika kelas ini gratis">
                <div class="mt-2">Ganti Cover :</div>
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
    angka = angka.toString()
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

function displayPrice() {
    let value = $("#price").isi().toString()
    let angka = formatRupiah(value, 'Rp. ')
    this.value = angka
    $("#priceDisplay").isi(this.value)
}
displayPrice()

$("#priceDisplay").di('ketik', function() {
    let value = this.value
    let angka = formatRupiah(value, 'Rp. ')
    this.value = angka
    $("#price").isi(toAngka(value))
})

</script>
@endsection 