@extends('dashboard')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('save_pemasok', ['pemasok_id' => $pemasok->id]) }}">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="nama_pemasok">Nama Pemasok</label>
        <input type="text" class="form-control" id="nama_pemasok" placeholder="Masukan nama pemasok" name="nama_pemasok" value="{{ $pemasok->nama_pemasok }}">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat" name="alamat" value="{{ $pemasok->alamat }}">
    </div>
    <div class="form-group">
        <label for="kota">Kota</label>
        <input type="text" class="form-control" id="kota" placeholder="Masukan kota" name="kota" value="{{ $pemasok->kota }}">
    </div>
    <div class="form-group">
        <label for="no_hp">Nomer HP</label>
        <input type="text" class="form-control" id="no_hp" placeholder="Masukan no hp" name="no_hp" value="{{ $pemasok->no_hp }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>        
</div>
@endsection
