<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Viga&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/client/css/home.css') ?>">

  <title>AJM Client</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
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

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">KSP Adi Jaya Makmur</h1>
      <p class="lead py-3">bersama <span>masyarakat</span> untuk hidup <span>lebih baik</span></p>
      <a class="btn btn-success tombol" href="<?= base_url('anggota/about') ?>">Learn More <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

</html>