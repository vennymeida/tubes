@extends('produk.layout')

@section('content')

    <div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Produk
            </div>
        <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        </div>
        @endif
            <form method="post" action="{{ route('produk.update', $produk->id) }}" id="myForm" }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_penjual">Id Penjual</label> 
                <input type="text" name="id_penjual" class="form-control" id="id_penjual" value="{{ $produk->id_penjual }}" aria-describedby="id_penjual" > 
            </div>
                <div class="form-group">
                <label for="nama">Nama</label> 
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $produk->nama }}" aria-describedby="nama" > 
            </div>
                <div class="form-group">
                <label for="deskripsi">Deskripsi</label> 
                <input type="deskripsi" name="deskripsi" class="form-control" id="Kelas" value="{{ $produk->deskripsi }}" aria-describedby="deskripsi" > 
            </div>
                <div class="form-group">
                <label for="harga">Harga</label> 
                <input type="harga" name="harga" class="form-control" id="harga" value="{{ $produk->harga }}" aria-describedby="harga" > 
            </div>
            </div>
                <div class="form-group">
                <label for="stok">Stok</label> 
                <input type="stok" name="stok" class="form-control" id="stok" value="{{ $produk->stok }}" aria-describedby="stok" > 
            </div>
            <div class="form-group">
                        <label for="foto">Foto Produk</label>         
                        <input type="file" class="form-control" name="foto" value="{{ $produk->foto}}">
                        <img width="150px" src="{{asset('storage/'.$produk->foto)}}"> 
                    </div> 
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 