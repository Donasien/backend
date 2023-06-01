@extends('layouts.main')

@section('title', 'Donasi')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-1">
                    <h5 class="card-title fw-semibold">Data Donasi</h5>
                    <a href="#" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Target Donasi</th>
                                <th>Total Donasi</th>
                                <th>Berakhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donation as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->target_amount }}</td>
                                    <td>{{ $item->latest_amount }}</td>
                                    <td>{{ $item->days_left }} Hari</td>
                                    <td>
                                        @if ($item->status == null)
                                            Pending
                                        @else
                                            {{ $item->status }}
                                        @endif
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary m-1"><i
                                                class="ti ti-edit"></i></button>
                                        <button type="submit" class="btn btn-danger delete m-1"><i
                                                class="ti ti-trash"></i></button>
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
