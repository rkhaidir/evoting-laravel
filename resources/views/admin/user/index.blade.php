@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{ Breadcrumbs::render('admin') }}
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-9" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive col-lg-9">
  <a href="/admin/administrator/create" class="btn btn-primary">Tambah Admin Baru</a>
  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Admin</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>
              @if ($user->is_admin === 1)
                Administrator
              @else
                Operator
              @endif
            </td>
            <td>
              <form action="/admin/administrator/reset/{{ $user->id }}" method="POST" class="d-inline">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Apa kamu yakin?')">Reset Password</button>
              </form>
              <form action="/admin/administrator/{{ $user->id }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apa kamu yakin?')">Hapus</button>
              </form>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>

  {{ $users->links() }}
</div>
@endsection