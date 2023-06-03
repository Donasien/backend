@extends('layouts.main')

@section('title', 'User')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-3">Data User</h5>
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ url('/datauser/' . $item->id) }}" class="btn btn-primary me-2"><i class="ti ti-eye"></i></a>
                                        <form action="{{ url('/datauser/' . $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Untuk Menghapus?')" type="submit" class="btn btn-danger delete"><i
                                                    class="ti ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
