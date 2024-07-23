@extends('dashboard')

@section('content')
<div class="container">
        <form method="POST" action="{{ route('insert') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan jenis kelamin" name="jenis_kelamin" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nomer HP</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan no hp" name="no_hp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Umur</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan umur" name="umur" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>        
</div>

@endsection