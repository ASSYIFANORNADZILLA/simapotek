@extends('dashboard')

@section('content')
<div class="container">
    <h1>Tambah Obat</h1>
    <form method="POST" action="{{ route('insert_obat') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kode_obat">Kode Obat</label>
                    <input type="text" class="form-control" id="kode_obat" name="kode_obat" placeholder="Masukkan kode obat" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Masukkan nama obat" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kode_kategori">Kategori</label>
                    <select id="kode_kategori" class="form-control" name="kode_kategori" required>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->kode_kategori }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select id="supplier" class="form-control" name="supplier" required>
                        @foreach($pemasoks as $pemasok)
                            <option value="{{ $pemasok->id }}">{{ $pemasok->nama_pemasok }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan stok" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_beli">Harga Beli</label>
                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual" required>
                </div>
            </div>
           
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggal_expired">Tanggal Expired</label>
                    <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>        
</div>
@endsection
    