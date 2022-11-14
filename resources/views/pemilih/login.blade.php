<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/electronic-voting.png" type="image/x-icon">
    <title>E-Voting | Login</title>
    
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
  </head>
  <body>   
    @include('layouts.navbar')
    
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card h-100">
            <div class="card-header">
              <h3 class="fw-bold">Petunjuk</h3>
            </div>
            <div class="card-body">
              <ol>
                <li>Ketikkan nomor pemilih pada inputan yang disedikan.</li>
                <li>Tekan tombol login yang berwarna biru untuk masuk ke halaman pemilihan.</li>
                <li>Pada halaman pemilihan akn tampil foto, nama calon, dan tombol pilih.</li>
                <li>Tekan tombol pilih yang berwarna biru sesuai dengan pilihan anda. Maka akan muncul notifikasi "Apa kamu yakin?" lalu pilih ok.</li>
                <li>Halaman akan berpindah ke login lagi, maka pemilihan selesai.</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-lg-4">

          <main class="form-signin text-center">
            <form action="/pemilih/login" method="POST">
              @csrf
              <img class="mb-4" src="/electronic-voting.png" alt="" class="img-fluid" width="200">
              <h1 class="h3 mb-3 fw-normal">Please Login!</h1>
              
              @if(session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
              @endif

              <div class="form-floating my-3">
                <input type="text" class="form-control @error('nomor_pemilih') is-invalid @enderror" id="password" name="nomor_pemilih" placeholder="Nomor Pemilih" autofocus autocomplete="off">
                <label for="nomor_pemilih">Nomor Pemilih</label>
                @error('nomor_pemilih')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
    
  
              <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
          </main>
        </div>
      </div>
    </div>
  


    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
