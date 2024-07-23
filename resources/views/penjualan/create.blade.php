@extends('dashboard')

@section('content')
<div class="container">
    <h1>Tambah Penjualan</h1>
    <form method="POST" action="{{ route('penjualan.store') }}">
        @csrf
        <div class="form-group">
            <label for="nomor_faktur">Nomor Faktur</label>
            <input type="text" class="form-control" id="nomor_faktur" name="nomor_faktur" required>
        </div>
        <div class="form-group">
            <label for="kode_obat">Obat</label>
            <select id="kode_obat" class="form-control" name="kode_obat" required>
                @foreach($obats as $obat)
                    <option value="{{ $obat->kode_obat }}">{{ $obat->nama_obat }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
