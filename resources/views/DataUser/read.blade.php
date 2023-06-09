@extends('layouts.main')

@section('title', 'Read User')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">User</h5>
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $user->fullname }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Foto Profile</label>
                            <button type="button" class="btn btn-outline-primary form-control" data-bs-toggle="modal"
                                data-bs-target="#fotoprofile">
                                Lihat Foto Profile
                            </button>
                            <div class="modal fade" id="fotoprofile" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Profile</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ $user->photo }}" width="100%">
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
                            <label class="mb-1">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $user->gender }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Alamat Lengkap</label>
                            <input type="text" class="form-control" value="{{ $user->address }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Nomor Telepon</label>
                            <input type="text" class="form-control" value="{{ $user->phone }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" value="{{ $user->kk }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Bank</label>
                            <input type="text" class="form-control" value="{{ $user->bank }}" disabled>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label class="mb-1">Nomor Rekening</label>
                            <input type="text" class="form-control" value="{{ $user->rekening }}" disabled>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end mt-3">
                            <a href="{{ url('/datauser') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
