<body style="background-image:url(../assets/1.jpg); background-size: 100% 100%;">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <h1 class="text-center mb-3"><?= $title ?></h1>
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h4><?= $title ?></h4>
              </div> -->
              <div class="card-body">
                <form method="POST">

                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" class="form-control" name="nama" autofocus>
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="alamat">Alamat</label>
                      <input id="alamat" type="text" class="form-control" name="alamat">
                      <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-6">
                      <label for="jk">Jenis Kelamin</label>
                      <select name="jk" id="jk" class="form-control">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="no_telp">No Telpon</label>
                      <input id="no_telp" type="text" class="form-control" name="no_telp">
                      <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="no_ktp">No KTP</label>
                      <input id="no_ktp" type="text" class="form-control" name="no_ktp">
                      <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-3 text-muted text-center">
              Sudah punya akun ? <a href="<?= base_url('auth') ?>" class="text-danger font-weight-bold">Login disini !</a>
            </div>
          </div>
        </div>