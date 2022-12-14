@extends('transaksi.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
        <center> <h2>Daftar Transaksi Toko PRuTa</h2> </center>
        </div >
        <div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{ route('transaksi.index') }}">
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
        <div class="float-left my-2">
            <a class="btn btn-warning" style="#A0522D" href="{{ route('cetak_transaksi') }}"> Cetak Laporan Produk</a>
        </div>&nbsp;
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
        <th>Id Transaksi</th>
        <!-- <th>Id Pembeli</th> -->
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Total Belanja</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($paginate as $tr)
    <tr>
        <td>{{ $tr ->id }}</td>
        <!-- <td>{{ $tr ->id_users }}</td> -->
        <td>{{ $tr ->user->name }}</td>
        <td>{{ $tr ->tanggal }}</td>
        <td>
                                    @if($tr->status == 0)
                                    Belum di bayar
                                    @else
                                    Sudah dibayar 
                                    @endif
                                </td>
        <td>{{ $tr ->total }}</td>
        <td>
            <!-- <form action="{{ route('transaksi.destroy',['transaksi'=>$tr->id]) }}" method="POST"> -->
                <a class="btn btn-info" href="{{ url('transaksi') }}/{{ $tr->id }}">Show</a>
                <!-- <a class="btn btn-primary" href="{{ route('transaksi.edit',$tr->id) }}">Edit</a> -->
                <!-- @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>  -->
        </td>
    </tr>
    @endforeach
    </table>
{!! $paginate->links() !!}
 @endsection
