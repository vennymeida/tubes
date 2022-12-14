@extends('pembeli.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
             Tambah Pembeli
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
                <form method="post" action="{{ route('pembeli.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="id_users">Id User</label> 
                        <input type="id_users" name="id_users" class="form-control" id="id_users" aria-describedby="id_users" > 
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label> 
                        <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="nama" > 
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label> 
                        <input type="alamat" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" > 
                    </div>
                    <div class="form-group">
                        <label for="no">No HP</label> 
                        <input type="no" name="no" class="form-control" id="no" aria-describedby="no" > 
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Profile</label>         
                        <input type="file" class="form-control" name="foto">
                    </div> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 