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
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donor as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->donation->title }}</td>
                                    @php
                                        $number = $item->donate;
                                        $formattedNumber = number_format($number, 0, ',', '.');
                                        $jumlah_donasi = 'Rp ' . $formattedNumber;
                                    @endphp
                                    <td>{{ $jumlah_donasi }}</td>
                                    <td class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="{{ '#fotosampul' . $item->id }}">
                                            <i class="ti ti-eye"></i>
                                        </button>
                                        <div class="modal fade" id="{{ 'fotosampul' . $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea class="form-control" rows="10" disabled> @if ($item->message == null)
Tidak Ada Pesan Yang Dikirimkan
@else
{{ $item->message }}
@endif </textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
