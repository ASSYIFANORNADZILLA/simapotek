@extends('dashboard')

@section('content')
<div class="container">
        <form method="POST" action="{{ route('insert_pemasok') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Pemasok</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama pemasok" name="nama_pemasok" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Kota</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Kota" name="kota" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nomer HP</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan no hp" name="no_hp" required>
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>        
</div>

@endsection