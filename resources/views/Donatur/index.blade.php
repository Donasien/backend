@extends('layouts.main')

@section('title', 'Donatur')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-3">Data Donatur</h5>
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Donasi</th>
                                <th>Jumlah Donasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donor as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->donation->title }}</td>
                                    <td>{{ $item->donate }}</td>
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
