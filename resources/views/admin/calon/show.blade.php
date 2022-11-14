@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{ Breadcrumbs::render('show_calon', $calon) }}
<div class="mb-3">
  <a href="/admin/calon" class="btn btn-md btn-success">Kembali</a>
  <a href="/admin/calon/{{ $calon->id }}/edit" class="btn btn-md btn-warning">Edit</a>
  <form action="/admin/calon/{{ $calon->id }}" method="POST" class="d-inline">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-md btn-danger" onclick="return confirm('Apa kamu yakin?')">Hapus</button>
  </form>
</div>

<h1>{{ $calon->nama_calon }}</h1>
<h3>Nomor Urut: {{ $calon->nomor_urut }}</h3>
@if ($calon->gambar)
  <img src="{{ asset('storage/'.$calon->gambar) }}" alt="Gambar" class="img-fluid" width="400">
@else
  <img src="/calon.png" alt="calon" class="img-fluid" width="400">
@endif
@endsection