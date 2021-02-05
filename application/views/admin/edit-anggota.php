<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
    </div>
    <div class="card card-info">
      <div class="card-body">
        <form action="" method="post">
          <input type="hidden" name="id_anggota" value="<?= $data['id_anggota']; ?>">
          <div class="row justify-content-center">
            <div class="col-md-5">
              <div class="form-group">
                <label class="font-weight-bold text-danger">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-danger">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-danger">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= $data['password']; ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-danger">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="font-weight-bold text-danger">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" autofocus required="" oninvalid="this.setCustomValidity('Jenis Kelamin nya apa ?')" oninput="setCustomValidity('')">
                  <option value="">Pilih jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-danger">No Telpon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $data['no_telp']; ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-danger">No KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?= $data['no_ktp']; ?>">
              </div>
              <div class="form-group">
                <label class="font-weight-bold text-danger">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="<?= $data['status']; ?>">
              </div>
              <div class="form-group text-right">
                <a href="<?= base_url('data_anggota'); ?>" class="btn btn-danger mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </section>
</div>