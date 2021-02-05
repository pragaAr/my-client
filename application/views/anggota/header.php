<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Xanh+Mono:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/client/css/style.css') ?>">

  <title>AJM Client</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('anggota/home') ?>">AJM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-link <?= $this->uri->segment(2) == 'home' || $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?= base_url('anggota/home') ?>">Home</a>
          <a class="nav-link <?= $this->uri->segment(2) == 'about' || $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?= base_url('anggota/about') ?>" href="#">About</a>
          <a class="nav-link <?= $this->uri->segment(2) == 'profil' || $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?= base_url('anggota/profil') ?>" href="#">Profile</a>
          <?php if ($this->session->userdata('nama')) { ?>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-success tombol"> Hi, <?= $this->session->userdata('nama') ?></a>
          <?php } else { ?>
            <a href="<?= base_url('auth') ?>" class="btn btn-success tombol">Join Us</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>