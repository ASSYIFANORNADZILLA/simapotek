@extends('dashboard')

@section('content')
<div class="container my-4">
    <h2 class="h-2 mb-4 font-weight-bold">DATA KATEGORI OBAT</h2>
    <div class="row mb-3">
        <a href="{{ route('create_kategori') }}" class="btn btn-primary">Create New</a>
    </div>

    <div class="row mb-3">
        <form method="GET" action="{{ route('kategori.index') }}" class="form-inline">
          <div class="form-group mr-2">
            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->get('search') }}">
          </div>
          <button type="submit" class="btn btn-primary">Search</button>
          <a href="{{ route('kategori.index') }}" class="btn btn-secondary ml-2">Reset</a>
        </form>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $row)
                    <tr>
                        <td>{{ $row->kode_kategori }}</td>
                        <td>{{ $row->nama_kategori }}</td>
                        <td class="d-flex">
                            <a href="{{ route('update_kategori', ['kategori_id' => $row->kode_kategori]) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                            <form action="{{ route('delete_kategori', ['kategori_id' => $row->kode_kategori]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?')">Delete</button>
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
