<body style="background-image:url(./assets/1.jpg); background-size: 100% 100%;">
  <div id="app">
    <section class="section" style="margin-top:75px;">
      <div class="container">
        <h1 class="text-center mb-3">Selamat Datang</h1>
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4><?= $title ?></h4>
              </div>
              <div class="flash-logout" data-flashdata="<?= $this->session->flashdata('flashlogout'); ?>"></div>
              <div class="flash-login" data-flashdata="<?= $this->session->flashdata('flashLogin'); ?>"></div>
              <div class="flash-cek" data-flashdata="<?= $this->session->flashdata('flashcek'); ?>"></div>
              <div class="flash-ceklogin" data-flashdata="<?= $this->session->flashdata('flashceklogin'); ?>"></div>
              <div class="card-body">
                <form method="POST" action="<?= base_url('auth'); ?>">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus oninvalid="this.setCustomValidity('Input Email nya dong')" oninput="setCustomValidity('')" autofocus>
                  </div>
                  <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required="" oninvalid="this.setCustomValidity('Password juga diinput dong')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-3 text-muted text-center">
              Belum punya akun ? <a href="<?= base_url('auth/register') ?>" class="text-danger font-weight-bold">Buat disini !</a>
            </div>