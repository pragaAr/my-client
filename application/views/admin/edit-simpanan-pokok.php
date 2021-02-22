<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-info">
          <div class="card-body">
            <form action="" method="post">
              <input type="hidden" name="id_sim_pokok" value="<?= $data['id_sim_pokok']; ?>">
              <div class="form-group">
                <label for="anggota_id">Id Anggota</label>
                <input type="text" name="anggota_id" class="form-control" id="anggota_id" value="<?= $data['anggota_id']; ?>" readonly>
                <?= form_error('anggota_id', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="nominal_pokok">Nominal Minimum Rp. 100.000</label>
                <input type="text" name="nominal_pokok" class="form-control" id="nominal_pokok" value="<?= $data['nominal_pokok']; ?>">
                <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="tgl_simpan">Tanggal Simpan</label>
                <input type="date" name="tgl_simpan" class="form-control" id="tgl_simpan" value="<?= $data['tgl_simpan']; ?>">
                <?= form_error('tgl_simpan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('simpanan_pokok'); ?>" class="btn btn-danger mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>