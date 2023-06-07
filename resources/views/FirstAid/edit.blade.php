@extends('layouts.main')

@section('title', 'Edit First Aid')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit First Aid</h5>
                <div class="form-body">
                    <form enctype="multipart/form-data" action="{{ url('/firstaid/edit/' . $firstaid->id) }}" method="post">
                        @csrf
                        @method('put')
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
                                <textarea class="form-control" rows="5" name="first_aid">{{ $firstaid->first_aid }}</textarea>
                            </div>
                        </div>
                        <h6 class="fw-semibold my-3">Gambar Obat</h6>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-3">
                                <label class="mb-1">Foto Obat 1</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image1">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat1">
                                            Lihat Foto Obat 1
                                        </button>
                                    </div>
                                </div>
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
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image2">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat2">
                                            Lihat Foto Obat 2
                                        </button>
                                    </div>
                                </div>
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
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image3">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat3">
                                            Lihat Foto Obat 3
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat3" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image4">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat4">
                                            Lihat Foto Obat 4
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat4" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image5">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat5">
                                            Lihat Foto Obat 5
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat5" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="col-md-6 col-12 mb-3">
                                <label class="mb-1">Foto Obat 6</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image6">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat6">
                                            Lihat Foto Obat 6
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat6" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 6</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image6 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 7</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image7">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat7">
                                            Lihat Foto Obat 7
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat7" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 7</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image7 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 8</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image8">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat8">
                                            Lihat Foto Obat 8
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat8" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 8</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image8 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 9</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image9">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat9">
                                            Lihat Foto Obat 9
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat9" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 9</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image9 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 10</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image10">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat10">
                                            Lihat Foto Obat 10
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat10" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 10</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image10 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 11</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image11">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat11">
                                            Lihat Foto Obat 11
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat11" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 11</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image11 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 12</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image12">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat12">
                                            Lihat Foto Obat 12
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat12" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 12</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image12 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 13</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image13">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat13">
                                            Lihat Foto Obat 13
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat13" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 13</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image13 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 14</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image14">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat14">
                                            Lihat Foto Obat 14
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat14" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 14</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image14 }}" width="100%">
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
                                <label class="mb-1">Foto Obat 15</label>
                                <div class="row">
                                    <div class="col-7">
                                        <input type="file" class="form-control" name="medicine_image15">
                                    </div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-outline-primary form-control"
                                            data-bs-toggle="modal" data-bs-target="#fotoobat15">
                                            Lihat Foto Obat 15
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="fotoobat15" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Obat 15</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $firstaid->medicine_image15 }}" width="100%">
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
                            <a href="{{ url('/firstaid') }}" class="btn btn-danger me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
