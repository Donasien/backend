@extends('layouts.main')

@section('title', 'Donasi')

@section('container')
<div class="container-fluid">
    @php
        $rs1 = App\Models\Donasi::all();
    @endphp
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tambah data Donasi</h5>
          <div class="card">
            <div class="card-body">
              <form action="{{ route('Donasi.store') }}" method="POST">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" 
                    class="form-control 
                    @error('nama')
                        is-invalid
                    @enderror"
                    value="{{ old('nama') }}" id="nama" name="nama">
                </div>
                <div class="mb-3">
                  <label for="gender" class="form-label">Jenis Kelamin</label>
                  <select name="gender" id="gender">
                    <option value="1">Laki - Laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="no_kk" class="form-label">No KK</label>
                  <input class="form-control" 
                  type="number" name="no_kk" id="no_kk" value="{{ old('no_kk') }}">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>          
        </div>
      </div>
    </div>
</div>
    
@endsection