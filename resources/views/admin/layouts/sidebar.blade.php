<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/beranda') ? 'active' : '' }}" aria-current="page" href="/admin/beranda">
          <span data-feather="home"></span>
          Beranda
        </a>
      </li>
      @can('admin')
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/calon*') ? 'active' : '' }}" href="/admin/calon">
          <span data-feather="user"></span>
          Data Calon
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/pemilih*') ? 'active' : '' }}" href="/admin/pemilih">
          <span data-feather="users"></span>
          Data Pemilih
        </a>
      </li>
      @can('admin')
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/votes*') ? 'active' : '' }}" href="/admin/votes">
          <span data-feather="bar-chart-2"></span>
          Hasil Pemilihan
        </a>
      </li>
      @endcan
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Pengaturan</span>
      <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="settings"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      @can('admin')
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/administrator*') ? 'active' : '' }}" href="/admin/administrator">
          <span data-feather="user-plus"></span>
          Data Admin
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/profil*') ? 'active' : '' }}" href="/admin/profil">
          <span data-feather="user-check"></span>
          Profil
        </a>
      </li>
      <li class="nav-item">
        <form action="/logout" method="POST">
          <button type="submit" class="nav-link border-0 bg-light">
            @csrf
            <span data-feather="log-out"></span>
            Logout
          </button>
        </form>
      </li>
    </ul>
  </div>
</nav>