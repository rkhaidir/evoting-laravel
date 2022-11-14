<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Voting | Login Administrator</title>
    
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-lg-4">
          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <main class="form-signin">
            <form action="/login" method="POST">
              @csrf
              <img class="mb-4" src="/electronic-voting.png" alt="" class="img-fluid" width="200">
              <h1 class="h3 mb-3 fw-normal">Please Login!</h1>
  
              <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" autofocus>
                <label for="username">Username</label>
                @error('username')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
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
