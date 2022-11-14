@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{ Breadcrumbs::render('edit_pemilih', $pemilih) }}
<div class="col-lg-9">
  <form action="/admin/pemilih/{{ $pemilih->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="nomor_pemilih" class="form-label">Nomor Pemilih</label>
      <input type="text" name="nomor_pemilih" id="nomor_pemilih" class="form-control @error('nomor_pemilih') is-invalid @enderror" value="{{ old('nomor_pemilih', $pemilih->nomor_pemilih) }}">
      @error('nomor_pemilih')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-3">
      <label for="nomor_pemilih" class="form-label">Nama Pemilih</label>
      <input type="text" name="nama_pemilih" id="nama_pemilih" class="form-control @error('nama_pemilih') is-invalid @enderror" value="{{ old('nama_pemilih', $pemilih->nama_pemilih) }}">
      @error('nama_pemilih')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-3">
      <label for="verifikasi" class="form-label">Verifikasi</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="verifikasi" value="0" id="verifikasi-1" {{ $pemilih->verifikasi === 0 ? 'checked' : '' }}>
        <label class="form-check-label" for="verifikasi-1">
          Belum Verifikasi
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="verifikasi" value="1" id="verifikasi-2" {{ $pemilih->verifikasi === 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="verifikasi-2">
          Sudah Verifikasi
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
@endsection