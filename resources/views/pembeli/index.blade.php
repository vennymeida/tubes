@extends('pembeli.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
        <center> <h2>Halaman Pembeli Toko PRuTa</h2> </center>
        </div>
        <div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{ route('pembeli.index') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search')}}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

    <div class="row">
        <div style="margin:0px 0px 0px 70px;">
            <a class="btn btn-warning" href="{{ route('cetak') }}"> Cetak PDF </a>
        </div>
    </div><br/>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('pembeli.create') }}"> Input Pembeli</a>
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
        <th>Id Pembeli</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Foto</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($paginate as $pbl)
    <tr>
        <td>{{ $pbl ->id }}</td>
        <td>{{ $pbl ->nama }}</td>
        <td>{{ $pbl ->alamat }}</td>
        <td>{{ $pbl ->no }}</td>
        <td><img width="110px" src="{{asset('storage/'.$pbl->foto)}}">
        
        <td>
            <form action="{{ route('pembeli.destroy',['pembeli'=>$pbl->id]) }}" method="POST">
                <a class="btn btn-info" href="{{ route('pembeli.show',$pbl->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('pembeli.edit',$pbl->id) }}">Edit</a>
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