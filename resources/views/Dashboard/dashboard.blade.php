@extends('layouts.main')

@section('title', 'Dashboard')

@section('container')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
          <div class="col-lg-12">
            <!-- Total User -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-start">
                  <div class="col-8">
                    <h5 class="card-title mb-9 fw-semibold"> Total User</h5>
                    <h4 class="mb-3 text-primary">{{ $user->count() }}</h4>
                  </div>
                  <div class="col-4">
                    <div class="d-flex justify-content-end">
                      <div
                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-user fs-6"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <!-- Total Donasi -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-start">
                  <div class="col-8">
                    <h5 class="card-title mb-9 fw-semibold"> Total Donasi</h5>
                    <h4 class="mb-3 text-primary">{{ $donation->count() }}</h4>
                  </div>
                  <div class="col-4">
                    <div class="d-flex justify-content-end">
                      <div
                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-heart-handshake fs-6"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <!-- Total Donasi -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-start">
                  <div class="col-8">
                    <h5 class="card-title mb-9 fw-semibold"> Total Donatur</h5>
                    <h4 class="mb-3 text-primary">{{ $donor->count() }}</h4>
                  </div>
                  <div class="col-4">
                    <div class="d-flex justify-content-end">
                      <div
                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-heart-plus fs-6"></i>                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
      
    </div>
  </div>
@endsection