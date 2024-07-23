@extends('dashboard')

@section('content')
<div class="container my-4">
    <h1 class="h-2 mb-4 font-weight-bold">DATA PEMASOK</h1>
    <div class="row mb-3">
        <a href="{{ route('create_pemasok') }}" class="btn btn-primary">Create New</a>
    </div>

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
                        <th>Nama Pemasok</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No HP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemasok as $row)
                        <tr>
                            <td>{{ $row->nama_pemasok }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->kota }}</td>
                            <td>{{ $row->no_hp }}</td>
                            <td class="d-flex">
                                <a href="{{ route('update_pemasok', ['pemasok_id' => $row->id]) }}" class="btn btn-warning btn-sm mr-2">Update</a>
                                <form action="{{ route('delete_pemasok', ['pemasok_id' => $row->id]) }}" method="POST" class="d-inline">
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
