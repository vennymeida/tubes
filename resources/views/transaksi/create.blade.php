@extends('transaksi.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
             Tambah Produk
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
                <form method="post" action="{{ route('transaksi.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label for="id_pembeli">Id Pembeli</label> 
                        <input type="id_pembeli" name="id_pembeli" class="form-control" id="id_pembeli" aria-describedby="id_pembeli" > 
                    </div>
                    <div class="form-group">
                        <label for="id_produk">Id Produk</label> 
                        <input type="id_produk" name="id_produk" class="form-control" id="id_produk" aria-describedby="id_produk" > 
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label> 
                        <input type="jumlah" name="jumlah" class="form-control" id="jumlah" aria-describedby="jumlah" > 
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label> 
                        <input type="harga" name="harga" class="form-control" id="harga" aria-describedby="harga" > 
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label> 
                        <input type="total" name="total" class="form-control" id="total" aria-describedby="total" > 
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 