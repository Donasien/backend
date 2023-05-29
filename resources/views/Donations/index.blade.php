@extends('layouts.main')

@section('title', 'Donasi')

@section('container')
    <div class="container-fluid">
        <div class="card">
            <div class="d-flex justify-content-between" style="margin-bottom:-20px;">
                <a href="" class="btn btn-primary btn-block m-4"><i class="fas fa-plus-square mr-2"></i> Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
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
                                <td>Faruq</td>
                                <td>Laki Laki</td>
                                <td>732</td>
                                <td>083</td>
                                <td>jombang</td>
                                <td width="20%">
                                    <i></i> Icon
                                </td>
                                    <form method="POST" action="#">
                                        <a href="#" class="btn btn-sm btn-primary m-1"><i
                                                class="fas fa-pen"></i></a>
                                        <button type="submit" class="btn btn-sm btn-danger delete m-1"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection