@extends('layouts.main')

@section('title', 'Donasi')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="d-flex justify-content-between" style="margin-bottom:-20px;">
                <a href="#" class="btn btn-primary m-4">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Gender</th>
                                <th>No KK</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Jamal Yanto</td>
                                <td>Laki - Laki</td>
                                <td>73874824878877</td>
                                <td>087837828392</td>
                                <td>Jakarta</td>
                                <td>
                                    <button type="submit" class="btn btn-primary m-1"><i class="ti ti-edit"></i></button>
                                    <button type="submit" class="btn btn-danger delete m-1"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jamal Yanto</td>
                                <td>Laki - Laki</td>
                                <td>73874824878877</td>
                                <td>087837828392</td>
                                <td>Jakarta</td>
                                <td>
                                    <button type="submit" class="btn btn-primary m-1"><i class="ti ti-edit"></i></button>
                                    <button type="submit" class="btn btn-danger delete m-1"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Jamal Yanto</td>
                                <td>Laki - Laki</td>
                                <td>73874824878877</td>
                                <td>087837828392</td>
                                <td>Jakarta</td>
                                <td>
                                    <button type="submit" class="btn btn-primary m-1"><i class="ti ti-edit"></i></button>
                                    <button type="submit" class="btn btn-danger delete m-1"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Jamal Yanto</td>
                                <td>Laki - Laki</td>
                                <td>73874824878877</td>
                                <td>087837828392</td>
                                <td>Jakarta</td>
                                <td>
                                    <button type="submit" class="btn btn-primary m-1"><i class="ti ti-edit"></i></button>
                                    <button type="submit" class="btn btn-danger delete m-1"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jamal Yanto</td>
                                <td>Laki - Laki</td>
                                <td>73874824878877</td>
                                <td>087837828392</td>
                                <td>Jakarta</td>
                                <td>
                                    <button type="submit" class="btn btn-primary m-1"><i class="ti ti-edit"></i></button>
                                    <button type="submit" class="btn btn-danger delete m-1"><i class="ti ti-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection