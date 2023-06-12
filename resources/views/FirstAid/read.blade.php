@extends('layouts.main')

@section('title', 'Read First Aid')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">First Aid</h5>
                <div class="form-body">
                    <h6 class="fw-semibold mb-3">Informasi Pertolongan Pertama</h6>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Kode Luka</label>
                            <input type="text" class="form-control" value="{{ $firstaid->wound_code }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Nama Luka</label>
                            <input type="text" class="form-control" value="{{ $firstaid->wound_name }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Pertolongan Pertama</label>
                            <textarea class="form-control" rows="5" disabled>{{ $firstaid->first_aid }}</textarea>
                        </div>
                    </div>
                    <h6 class="fw-semibold my-3">Gambar Obat</h6>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Foto Obat 1</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotoobat1">
                                Lihat Foto Obat 1
                            </button>
                            <div class="modal fade" id="fotoobat1" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 1</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $firstaid->medicine_image1 }}" width="100%">
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
                            <label class="mb-1">Foto Obat 2</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotoobat2">
                                Lihat Foto Obat 2
                            </button>
                            <div class="modal fade" id="fotoobat2" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 2</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $firstaid->medicine_image2 }}" width="100%">
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
                            <label class="mb-1">Foto Obat 3</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotoobat3">
                                Lihat Foto Obat 3
                            </button>
                            <div class="modal fade" id="fotoobat3" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 3</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $firstaid->medicine_image3 }}" width="100%">
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
                            <label class="mb-1">Foto Obat 4</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotoobat4">
                                Lihat Foto Obat 4
                            </button>
                            <div class="modal fade" id="fotoobat4" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 4</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $firstaid->medicine_image4 }}" width="100%">
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
                            <label class="mb-1">Foto Obat 5</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotoobat5">
                                Lihat Foto Obat 5
                            </button>
                            <div class="modal fade" id="fotoobat5" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 5</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $firstaid->medicine_image5 }}" width="100%">
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
                    <div class="col-sm-12 d-flex justify-content-end mt-3">
                        <a href="{{ url('/firstaid') }}" class="btn btn-danger me-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
