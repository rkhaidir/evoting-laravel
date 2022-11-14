<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>E-voting</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <span class="navbar-brand mb-0 h1">E-voting</span>
      </div>
    </nav>

    <div class="container my-5">
      <h3 class="text-center">Selamat datang {{ auth()->guard('pemilih')->user()->nama_pemilih }}</h3>
      <div class="row justify-content-center">
        @foreach ($calons as $calon)    
          <div class="col-md-4 text-center mt-4">
            @if ($calon->gambar)
              <img src="{{ asset('storage/'.$calon->gambar) }}" alt="calon" class="img-fluid">
              @else
              <img src="/calon.png" alt="calon" class="img-fluid">
            @endif
            <h5 class="display-5">{{ $calon->nama_calon }}</h5>
            <form action="/pemilih/vote" method="POST">
              @csrf
              <input type="hidden" name="calon_id" value="{{ $calon->id }}">
              <input type="hidden" name="pemilih_id" value="{{ auth()->guard('pemilih')->user()->id }}">
              <button type="submit" class="btn btn-primary px-5" onclick="return confirm('Apa kamu yakin?')">Pilih</button>
            </form>
          </div>
        @endforeach
      </div>
    </div>
    <script src="/bootstrap/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
  </body>
</html>