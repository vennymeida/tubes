@extends('transaksi.layout')

@section('content')

    <div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Transaksi
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
            <form method="post" action="{{ route('transaksi.update', $transaksi->id) }}" id="myForm" }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_pembeli">Id Pembeli</label> 
                <input type="text" name="id_pembeli" class="form-control" id="id_pembeli" value="{{ $transaksi->id_pembeli }}" aria-describedby="id_pembeli" > 
            </div>
                <div class="form-group">
                <label for="tanggal">Tanggal</label> 
                <input type="text" name="tanggal" class="form-control" id="tanggal" value="{{ $transaksi->tanggal }}" aria-describedby="tanggal" > 
            </div>
                <div class="form-group">
                <label for="total">Total</label> 
                <input type="total" name="total" class="form-control" id="Kelas" value="{{ $transaksi->total }}" aria-describedby="total" > 
                <button type="submit" class="btn btn-primary">Submit</button>    
            </form>
            </div>
        </div>
    </div>
</div>
@endsection 