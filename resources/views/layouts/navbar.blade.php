<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="/electronic-voting.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      E-Voting
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
        <a class="nav-link {{ Request::is('pemilih') ? 'active' : '' }}" href="/pemilih">Pilih</a>
      </div>
    </div>
  </div>
</nav>