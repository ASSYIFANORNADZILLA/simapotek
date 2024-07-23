@extends('dashboard')

@section('content')
<div class="container">
    <h1 class="h-2 mb-4 font-weight-bold">Daftar Penjualan</h1>
    <div class="row mb-3">
    <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Tambah Penjualan</a>
    </div>
    <div class="row mb-3">
        <form method="GET" action="{{ route('penjualan.index') }}" class="form-inline">
          <div class="form-group mr-2">
            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->get('search') }}">
          </div>
          <button type="submit" class="btn btn-primary">Search</button>
          <a href="{{ route('penjualan.index') }}" class="btn btn-secondary ml-2">Reset</a>
        </form>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nomor Faktur</th>
                <th>Obat</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualans as $penjualan)
            <tr>
                <td>{{ $penjualan->nomor_faktur }}</td>
                <td>{{ $penjualan->obat->nama_obat }}</td>
                <td>{{ $penjualan->jumlah }}</td>
                <td>{{ $penjualan->total_harga }}</td>
                <td>{{ $penjualan->tanggal }}</td>
                <td>
                    <a href="{{ route('penjualan.edit', $penjualan->nomor_faktur) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penjualan.destroy', $penjualan->nomor_faktur) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
