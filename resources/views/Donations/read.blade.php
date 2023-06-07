@extends('layouts.main')

@section('title', 'Read Donation')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Donasi</h5>
                <div class="form-body">
                    <h6 class="fw-semibold mb-3">Informasi Donasi</h6>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Title</label>
                            <input type="text" class="form-control" value="{{ $donation->title }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Foto Sampul</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotosampul">
                                Lihat Foto Sampul
                            </button>
                            <div class="modal fade" id="fotosampul" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Sampul</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $donation->cover_photo }}" width="100%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Target Donasi</label>
                            <input type="text" class="form-control" value="{{ $donation->target_amount }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Berakhir</label>
                            <input type="text" class="form-control"
                                value="@if($donation->days_left == 'Berakhir'){{ $donation->days_left }}@else{{ $donation->days_left }} Hari @endif"
                                disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Total Donasi</label>
                            <input type="text" class="form-control" value="{{ $donation->latest_amount }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Tanggal Berakhir</label>
                            <input type="text" class="form-control" value="{{ $donation->end_date }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Status</label>
                            <input type="text" class="form-control"
                                value="@if ($donation->status == null) pending @else {{ $donation->status }} @endif"
                                disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Deskripsi</label>
                            <textarea class="form-control" rows="5" disabled>{{ $donation->description }}</textarea>
                        </div>
                    </div>
                    <h6 class="fw-semibold my-3">Penerima Donasi</h6>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $donation->user->fullname }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $donation->user->gender }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" value="{{ $donation->user->kk }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Nomor Telepon</label>
                            <input type="text" class="form-control" value="{{ $donation->user->phone }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Alamat Lengkap</label>
                            <input type="text" class="form-control" value="{{ $donation->user->address }}" disabled>
                        </div>
                    </div>
                    <h6 class="fw-semibold my-3">File Atau Dokumen</h6>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Foto KTP</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotoktp">
                                Lihat Foto KTP
                            </button>
                            <div class="modal fade" id="fotoktp" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto KTP</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $donation->ktp_photo }}" width="100%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Foto Surat Diagnosa Medis</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotodiagnosa">
                                Lihat Foto Surat Diagnosa Medis
                            </button>
                            <div class="modal fade" id="fotodiagnosa" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Surat Diagnosa Medis
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $donation->medical_photo }}" width="100%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Foto Penyakit Atau Surat Hasil Laboratorium</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotopenyakit">
                                Lihat Foto Penyakit Atau Surat Hasil Laboratorium
                            </button>
                            <div class="modal fade" id="fotopenyakit" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Penyakit Atau Surat
                                                Hasil Laboratorium</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $donation->disease_photo }}" width="100%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Foto SKTM</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotosktm">
                                Lihat Foto SKTM
                            </button>
                            <div class="modal fade" id="fotosktm" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto SKTM</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $donation->sktm_photo }}" width="100%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="fw-semibold my-3">Hasil Deteksi Penyakit</h6>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Alzheimer</label>
                            <input type="text" class="form-control" value="{{ $donation->result_alzheimer }}"
                                disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Lung</label>
                            <input type="text" class="form-control" value="{{ $donation->result_lung }}" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-end mt-3">
                        <form action="{{ url('/donasi/tolak/' . $donation->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-danger me-2">Tolak</button>
                        </form>
                        <form action="{{ url('/donasi/terima/' . $donation->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-primary">Terima</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
