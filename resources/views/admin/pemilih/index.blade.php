@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
</div>
{{ Breadcrumbs::render('pemilih') }}
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-9" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive col-lg-9">
  @can('admin')
    <a href="/admin/pemilih/create" class="btn btn-primary">Tambah Pemilih Baru</a>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Import Excel
    </button>
  @endcan
  <form action="/admin/pemilih" class="my-3">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Cari..." name="cari" value="{{ request('cari') }}">
      <button class="btn btn-danger" type="submit">Cari</button>
    </div>
  </form>
  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>#</th>
        <th>Nomor Pemilih</th>
        <th>Nama Pemilih</th>
        <th>Verifikasi</th>
        <th>Status</th>
        @can('admin')
          <th>Aksi</th>
        @endcan
      </tr>
    </thead>
    <tbody>
      @foreach ($pemilihs as $pemilih)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pemilih->nomor_pemilih }}</td>
            <td>{{ $pemilih->nama_pemilih }}</td>
            <td>
              @if ($pemilih->verifikasi === 0)
                <form action="/admin/pemilih/verifikasi/{{ $pemilih->id }}" method="POST">
                  @method('PUT')
                  @csrf
                  <button type="submit" class="btn btn-sm btn-success">Verifikasi</button>
                </form>
              @else
                Sudah Verifikasi
              @endif
            </td>
            <td>
              @if ($pemilih->status === 0)
                Belum Memilih
              @else
                Sudah Memilih
              @endif
            </td>
            @can('admin')
            <td>
              <a href="/admin/pemilih/{{ $pemilih->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
              <form action="/admin/pemilih/{{ $pemilih->id }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apa kamu yakin?')">Hapus</button>
              </form>
            </td>
            @endcan
          </tr>
      @endforeach
    </tbody>
  </table>

  {{ $pemilihs->links() }}
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/pemilih/import" method="POST" enctype="multipart/form-data">
          @csrf
          <label for="" class="form-label">Pilih File Excel</label>
          <div class="mb-3">
            <input type="file" class="form-control" id="excel" name="excel">
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="delate_all" name="delate_all">
              <label class="form-check-label" for="delate_all">
                Kosongkan Data Pemilih
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection