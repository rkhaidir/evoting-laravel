@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{ Breadcrumbs::render('edit_calon', $calon) }}
<div class="col-lg-9">
  <form action="/admin/calon/{{ $calon->id }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="nama_calon" class="form-label">Nama Calon</label>
      <input type="text" name="nama_calon" id="nama_calon" class="form-control @error('nama_calon') is-invalid @enderror" autofocus value="{{ old('nama_calon', $calon->nama_calon) }}">
      @error('nama_calon')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-3">
      <label for="nomor_urut" class="form-label">Nomor Urut</label>
      <input type="number" name="nomor_urut" id="nomor_urut" class="form-control @error('nomor_urut') is-invalid @enderror" value="{{ old('nomor_urut', $calon->nomor_urut) }}">
      @error('nomor_urut')
      <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-3">
      <label for="gambar" class="form-label">Gambar</label>
      <input type="hidden" name="oldImage" value="{{ $calon->gambar }}">
      @if ($calon->gambar)
        <img src="{{ asset("storage/$calon->gambar") }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
      @else
        <img class="img-preview img-fluid mb-3 col-sm-5">
      @endif
      <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
      @error('gambar')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
</div>
<script>
  function previewImage() {
    const image = document.querySelector("#gambar");
    const imgPreview = document.querySelector(".img-preview");
  
    imgPreview.style.display = "block";
  
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
  
    oFReader.onload = function(OFREvent) {
      imgPreview.src = OFREvent.target.result;
    }
  }
</script>
@endsection