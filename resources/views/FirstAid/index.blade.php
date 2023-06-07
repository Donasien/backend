@extends('layouts.main')

@section('title', 'First Aid')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                {{-- <div class="d-flex justify-content-between mb-1">
                    <h5 class="card-title fw-semibold">Data Donasi</h5>
                    <a href="#" class="btn btn-primary">Tambah Data</a>
                </div> --}}
                <h5 class="card-title fw-semibold mb-3">Data First Aid</h5>
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Luka</th>
                                <th>Nama Luka</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($firstaid as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->wound_code }}</td>
                                    <td>{{ $item->wound_name }}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ url('/firstaid/' . $item->id) }}" class="btn btn-primary me-2"><i
                                                class="ti ti-eye"></i></a>
                                        <a href="{{ url('/firstaid/edit/' . $item->id) }}" class="btn btn-secondary"><i
                                                class="ti ti-edit"></i></a>
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
