@extends('dashboard')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('save_kategori', ['kategori_id' => $kategori->kode_kategori]) }}">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="kode_kategori">Kode Kategori</label>
            <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" value="{{ $kategori->kode_kategori }}" required>
        </div>
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
