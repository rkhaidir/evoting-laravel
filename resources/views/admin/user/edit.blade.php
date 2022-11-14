@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{-- {{ Breadcrumbs::render('edit_admin') }} --}}
<form action="/admin/administrator/{{ $user->id }}" method="POST" class="col-lg-9">
  @method('PUT')
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autofocus value="{{ old('name', $user->name) }}">
    @error('name')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}">
    @error('username')
      <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>
  <div class="mb-3">
    <div class="form-check">
      <input class="form-check-input check" type="checkbox" value="1" id="is_admin" name="is_admin" {{ $user->is_admin === 1 ? 'checked': '' }}>
      <label class="form-check-label" for="is_admin">
        Sebagai administrator
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection