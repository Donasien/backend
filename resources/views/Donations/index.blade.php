@extends('layouts.main')

@section('title', 'Donation')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                {{-- <div class="d-flex justify-content-between mb-1">
                    <h5 class="card-title fw-semibold">Data Donasi</h5>
                    <a href="#" class="btn btn-primary">Tambah Data</a>
                </div> --}}
                <h5 class="card-title fw-semibold mb-3">Data Donasi</h5>
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
                                    <td>
                                        @if ($item->days_left == 'Berakhir')
                                            {{ $item->days_left }}
                                        @else
                                            {{ $item->days_left }} Hari
                                        @endif
                                    </td>
                                    <td>{{ $item->status }}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ url('/donasi/' . $item->id) }}" class="btn btn-primary me-2"><i
                                                class="ti ti-eye"></i></a>
                                        <a href="{{ url('/donasi/edit/' . $item->id) }}" class="btn btn-secondary me-2"><i
                                                class="ti ti-edit"></i></a>
                                        <form action="{{ url('/donasi/' . $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Yakin Untuk Menghapus?')" type="submit"
                                                class="btn btn-danger delete"><i class="ti ti-trash"></i></button>
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
