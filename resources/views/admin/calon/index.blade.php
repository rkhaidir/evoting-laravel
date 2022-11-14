@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{ Breadcrumbs::render('calon') }}

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-9" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive col-lg-9">
  <a href="/admin/calon/create" class="btn btn-primary mb-3">Tambah Calon Baru</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Calon</th>
        <th>Nomor Urut</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($calons as $calon)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $calon->nama_calon }}</td>
          <td>{{ $calon->nomor_urut }}</td>
          <td>
            <a href="/admin/calon/{{ $calon->id }}" class="btn btn-sm btn-info">Detail</a>
            <a href="/admin/calon/{{ $calon->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
            <form action="/admin/calon/{{ $calon->id }}" method="POST" class="d-inline">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apa kamu yakin?')">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection