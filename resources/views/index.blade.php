<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/electronic-voting.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>E-Voting</title>
  </head>
  <body>
    @include('layouts.navbar')

    <section id="banner">
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="mt-5">E-Voting</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Ducimus eius velit numquam hic dolores porro inventore suscipit quam, asperiores laudantium.</p>
            <a href="/pemilih" class="btn btn-md btn-danger my-3 px-5 shadow">Vote</a>
          </div>
          <div class="col-lg-6">
            <img src="/electronic-voting.png" alt="logo" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>