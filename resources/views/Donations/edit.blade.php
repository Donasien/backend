@extends('layouts.main')

@section('title', 'Edit Donation')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Donasi</h5>
                <div class="form-body">
                    <form enctype="multipart/form-data" action="{{ url('/donasi/edit/' . $donation->id) }}" method="post">
                        @csrf
                        @method('put')
                        <h6 class="fw-semibold mb-3">Informasi Donasi</h6>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-3">
                                <label class="mb-1">Title</label>
                                <input type="text" class="form-control" value="{{ $donation->title }}" name="title">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="mb-1">Foto Sampul</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="cover_photo">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotosampul">
                                            Lihat Foto Sampul
                                        </button>
                                    </div>
                                </div>
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
                                <input type="text" class="form-control" value="{{ $donation->target_amount }}"
                                    name="target_amount">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="mb-1">Tanggal Berakhir</label>
                                <input type="date" class="form-control" value="{{ $donation->end_date }}"
                                    name="end_date">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label class="mb-1">Deskripsi</label>
                                <textarea class="form-control" rows="5" name="description">{{ $donation->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end mt-3">
                            <a href="{{ url('/donasi') }}" class="btn btn-danger me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
