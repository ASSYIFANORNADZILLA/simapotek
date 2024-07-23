@extends('dashboard')

@section('content')
    <div class="container my-4">
        <h1 class="h-2 mb-4 font-weight-bold">DATA OBAT</h1>
        <div class="row mb-3">
            <a href="{{ route('create_obat') }}" class="btn btn-primary">Create New</a>
        </div>

        <div class="row mb-3">
            <form method="GET" action="{{ route('obat') }}" class="form-inline">
              <div class="form-group mr-2">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->get('search') }}">
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
              <a href="{{ route('obat') }}" class="btn btn-secondary ml-2">Reset</a>
            </form>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Kode Obat</th>
                            <th>Nama Obat</th>
                            <th>Kategori Obat</th>
                            <th>Supplier</th>
                            <th>Stok</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Tanggal Expired</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obats as $row)
                            <tr>
                                <td>{{ $row->kode_obat }}</td>
                                <td>{{ $row->nama_obat }}</td>
                                <td>{{ $row->kategori->nama_kategori }}</td> <!-- Display the category name -->
                                <td>{{ $row->pemasok->nama_pemasok }}</td> <!-- Display the supplier name -->
                                <td>{{ $row->stok }}</td>
                                <td>{{ $row->harga_beli }}</td>
                                <td>{{ $row->harga_jual }}</td>
                                <td>{{ $row->tanggal_expired }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('edit_obat', ['obat_id' => $row->kode_obat]) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                    <form action="{{ route('delete_obat', ['obat_id' => $row->kode_obat]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
