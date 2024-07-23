@extends('dashboard')

@section('content')
<div class="container">
    <h1>Edit Penjualan</h1>
    <form method="POST" action="{{ route('penjualan.update', $penjualan->nomor_faktur) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="nomor_faktur">Nomor Faktur</label>
            <input type="text" class="form-control" id="nomor_faktur" name="nomor_faktur" value="{{ $penjualan->nomor_faktur }}" readonly>
        </div>
        <div class="form-group">
            <label for="kode_obat">Obat</label>
            <select id="kode_obat" class="form-control" name="kode_obat" required>
                @foreach($obats as $obat)
                    <option value="{{ $obat->kode_obat }}" {{ $penjualan->kode_obat == $obat->kode_obat ? 'selected' : '' }}>
                        {{ $obat->nama_obat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $penjualan->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $penjualan->jumlah }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
