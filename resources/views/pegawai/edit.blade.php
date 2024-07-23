@extends('dashboard')

@section('content')
<div class="container">
        <form method="POST" action="{{ route('save', ['pegawai_id' => $pegawai->id]) }}">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama" name="nama" value="{{ $pegawai->nama }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan jenis kelamin" name="jenis_kelamin" value="{{ $pegawai->jenis_kelamin }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan alamat" name="alamat" value="{{ $pegawai->alamat }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nomer HP</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan no hp" name="no_hp" value="{{ $pegawai->no_hp }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Umur</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan  umur" name="umur" value="{{ $pegawai->umur }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>        
</div>

@endsection