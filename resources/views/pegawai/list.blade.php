@extends('dashboard')

@section('content')
<div class="container my-4">
  <h2 class="h-2 mb-4 font-weight-bold">DATA PEGAWAI</h2>
  <div class="row mb-3">
    <a href="{{ route('create') }}" class="btn btn-primary">Create New</a>
  </div>
  
  <!-- Search Form -->
  <div class="row mb-3">
    <form method="GET" action="{{ route('pemasok') }}" class="form-inline">
      <div class="form-group mr-2">
        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->get('search') }}">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
      <a href="{{ route('pemasok') }}" class="btn btn-secondary ml-2">Reset</a>
    </form>
</div>
  
  <div class="row">
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Umur</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pegawai as $row)
          <tr>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->jenis_kelamin }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->no_hp }}</td>
            <td>{{ $row->umur }}</td>
            <td class="d-flex">
                <a href="{{ route('update', ['pegawai_id' => $row->id]) }}" class="btn btn-warning btn-sm mr-2">Update</a>
                <form action="{{ route('delete', ['pegawai_id' => $row->id]) }}" method="POST">
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
