<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('beranda', function (BreadcrumbTrail $trail) {
  $trail->push('Beranda', route('beranda'));
});

// Calon Breadcrumbs
Breadcrumbs::for('calon', function (BreadcrumbTrail $trail) {
  $trail->parent('beranda');
  $trail->push('Calon', route('admin.calon.index'));
});

Breadcrumbs::for('create_calon', function (BreadcrumbTrail $trail) {
  $trail->parent('calon');
  $trail->push('Tambah Calon Baru', route('admin.calon.create'));
});

Breadcrumbs::for('show_calon', function (BreadcrumbTrail $trail, $calon) {
  $trail->parent('calon');
  $trail->push($calon->nama_calon, route('admin.calon.show', $calon));
});

Breadcrumbs::for('edit_calon', function (BreadcrumbTrail $trail, $calon) {
  $trail->parent('calon');
  $trail->push($calon->nama_calon, route('admin.calon.show', $calon));
});

// Pemilih Breadcrumbs
Breadcrumbs::for('pemilih', function (BreadcrumbTrail $trail) {
  $trail->parent('beranda');
  $trail->push('Pemilih', route('admin.pemilih.index'));
});

Breadcrumbs::for('create_pemilih', function (BreadcrumbTrail $trail) {
  $trail->parent('pemilih');
  $trail->push('Tambah Pemilih Baru', route('admin.pemilih.create'));
});

Breadcrumbs::for('edit_pemilih', function (BreadcrumbTrail $trail, $pemilih) {
  $trail->parent('pemilih');
  $trail->push($pemilih->nomor_pemilih, route('admin.pemilih.edit', $pemilih));
});

// Administator Breadcrumbs
Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
  $trail->parent('beranda');
  $trail->push('Administrator', route('admin.administrator.index'));
});

Breadcrumbs::for('create_admin', function (BreadcrumbTrail $trail) {
  $trail->parent('admin');
  $trail->push('Tambah Administrator Baru', route('admin.administrator.create'));
});

Breadcrumbs::for('profil', function (BreadcrumbTrail $trail) {
  $trail->parent('beranda');
  $trail->push('Profil', route('profil'));
});

Breadcrumbs::for('votes', function (BreadcrumbTrail $trail) {
  $trail->parent('beranda');
  $trail->push('Hasil Suara Pemilihan', route('votes'));
});
