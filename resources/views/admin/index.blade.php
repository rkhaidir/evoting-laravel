@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{ Breadcrumbs::render('beranda') }}

<div class="row my-2">
  <div class="col-md-3">
    <div class="card bg-primary text-white shadow border-0">
      <div class="position-absolute bottom-15 end-10"><i class="fa-solid fa-user"></i></div>
      <div class="card-body">
        <span class="fs-2 d-block">{{ $calon }}</span>
        <small class="fw-italic">Calon</small>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-info text-white shadow border-0">
      <div class="position-absolute bottom-15 end-10"><i class="fa-solid fa-users"></i></div>
        <div class="card-body">
          <span class="fs-2 d-block">{{ $pemilih }}</span>
          <small class="fw-italic">Pemilih</small>
        </div>
      </div>
    </div>
  <div class="col-md-3">
    <div class="card bg-warning text-white shadow border-0">
      <div class="position-absolute bottom-15 end-10"><i class="fa-solid fa-users-slash"></i></div>
      <div class="card-body">
        <span class="fs-2 d-block">{{ $verifikasi }}</span>
        <small class="fw-italic">Belum Verifikasi</small>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card bg-danger text-white shadow border-0">
      <div class="position-absolute bottom-15 end-10"><i class="fa-solid fa-user-xmark"></i></div>
      <div class="card-body">
        <span class="fs-2 d-block">{{ $status }}</span>
        <small class="fw-italic">Belum Memilih</small>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-md-6">
    <div class="card bg-success text-white shadow border-0">
      <div class="position-absolute bottom-15 end-10"><i class="fa-solid fa-user-check"></i></div>
      <div class="card-body">
        <span class="fs-2 d-block">{{ $verifikasiDone }}</span>
        <small class="fw-italic">Sudah Verifikasi</small>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card bg-success text-white shadow border-0">
      <div class="position-absolute bottom-15 end-10"><i class="fa-solid fa-user-check"></i></div>
      <div class="card-body">
        <span class="fs-2 d-block">{{ $statusDone }}</span>
        <small class="fw-italic">Sudah Memilih</small>
      </div>
    </div>
  </div>
</div>
@endsection