@extends('produk.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            Detail Produk
         </div>
         <div class="card-body">
             <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nama Produk: </b>{{$Produk->nama}}</li>
                <li class="list-group-item"><b>Deskripsi: </b>{{$Produk->deskripsi}}</li>
                <li class="list-group-item"><b>Stok: </b>{{$Produk->stok}}</li>
                <li class="list-group-item"><b>Harga: </b>{{$Produk->harga}}</li>
                <li class="list-group-item"><b>Foto: </b><img style="width: 100%" src="{{ asset('./storage/'. $Produk->foto) }}" alt=""></li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('produk.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection 