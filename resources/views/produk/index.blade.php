@extends('produk.layout')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
        <center> <h2>Daftar Produk Toko PRuTa</h2> </center><br>
</div >
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{ route('produk.index') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search')}}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
        <!-- <div class="row"> -->
        <div class="float-left my-2">
            <a class="btn btn-success" style="#A0522D" href="{{ route('home') }}">Kembali</a>
        </div>&nbsp;
        <div class="float-right my-2">
            <a class="btn btn-warning" style="#A0522D" href="{{ route('cetak_pdf') }}"> Cetak Laporan Produk</a>
        </div>&nbsp;
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('produk.create') }}"> Input Produk</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Nama Produk</th>
        <th>Deskripsi Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Gambar</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($paginate as $pr)
    <tr>
        <td>{{ $pr ->nama }}</td>
        <td>{{ $pr ->deskripsi }}</td>
        <td>{{ $pr ->harga }}</td>
        <td>{{ $pr ->stok }}</td>
        <td><img width="150px" src="{{asset('storage/'.$pr->foto)}}"> 
        
        <td>
            <form action="{{ route('produk.destroy',['produk'=>$pr->id]) }}" method="POST">
                <a class="btn btn-info" href="{{ route('produk.show',$pr->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('produk.edit',$pr->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
{!! $paginate->links() !!}
 @endsection
