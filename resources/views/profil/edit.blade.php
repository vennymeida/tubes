@extends('profil.layout')

@section('content')

    <div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Profil
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
            <form method="post" action="{{ route('profil.update', $pembeli->id) }}" id="myForm" }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label> 
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $pembeli->nama }}" aria-describedby="nama" > 
            </div>
                <div class="form-group">
                <label for="alamat">Alamat</label> 
                <input type="alamat" name="alamat" class="form-control" id="alamat" value="{{ $pembeli->alamat }}" aria-describedby="alamat" > 
            </div>
                <div class="form-group">
                <label for="no">No. HP</label> 
                <input type="no" name="no" class="form-control" id="no" value="{{ $pembeli->no }}" aria-describedby="no" > 
            </div>
            <div class="form-group">
                        <label for="foto">Foto Profil</label>         
                        <input type="file" class="form-control" name="foto" value="{{ $pembeli->foto}}">
                        <img width="150px" src="{{asset('storage/'.$pembeli->foto)}}"> 
                    </div> 
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 