<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
    </div>
    <div class="card">
      <div class="card-body">
        <a href="<?= base_url('data_pinjaman') ?>" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addPinjam">Tambah Data</a>
        <div class="table-responsive">
          <table class="table table-hover mt-3" id="dataTables" width="100%" cellspacing="0">
            <?php if (validation_errors()) : ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
            <?php endif; ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

            <thead align="center">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Jumlah Pinjam</th>
                <th scope="col">Angsuran</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody align="center">
              <?php $i = 1; ?>
              <?php foreach ($data as $da) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td> <?= $da['nama']; ?></td>
                  <td>Rp. <?= number_format($da['jml_pinjam'], 0, ',', '.'); ?></td>
                  <td>Rp. <?= number_format($da['angsur_bln'], 0, ',', '.'); ?></td>
                  <td><?= date('d-m-Y, H:i:s', strtotime($da['tgl_pinjam'])); ?></td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="<?= base_url('data_pinjaman/detail/') . $da['id_pinjam']; ?>" class="btn btn-info btn-sm mr-2" data-toggle="tooltip" title="Detail"><i class="fas fa-info-circle"></i></a>
                      <a href="<?= base_url('data_pinjaman/update/') . $da['id_pinjam']; ?>" class="btn btn-success btn-sm mr-2" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('data_pinjaman/delete/') . $da['id_pinjam']; ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
</div>

<div class="modal fade" id="addPinjam" tabindex="-1" role="dialog" aria-labelledby="addPinjam" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPinjam">Tambah Pinjaman Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('data_pinjaman'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <select name="anggota_id" id="anggota_id" class="form-control" required="" oninvalid="this.setCustomValidity('Yang minjam siapa ?')" oninput="setCustomValidity('')">
              <option value="">Pilih Anggota</option>
              <?php foreach ($anggota as $data) : ?>
                <option value="<?= $data['id_anggota']; ?>"><?= $data['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="jml_pinjam" name="jml_pinjam" placeholder="Jumlah Pinjam" required="" oninvalid="this.setCustomValidity('Mau pinjam berapa ?')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <select name="bunga" id="bunga" class="form-control" required="" oninvalid="this.setCustomValidity('Mau bunga berapa ?')" oninput="setCustomValidity('')">
              <option value="">Pilih Suku Bunga</option>
              <option value="1">1 %</option>
              <option value="2">2 %</option>
              <option value="3">3 %</option>
              <option value="4">4 %</option>
            </select>
          </div>
          <div class="form-group">
            <select name="tempo" id="tempo" class="form-control" required="" oninvalid="this.setCustomValidity('Mau bayar berapa kali ?')" oninput="setCustomValidity('')">
              <option value="">Pilih Jangka Waktu (Bulan)</option>
              <option value="6">6 Bulan</option>
              <option value="12">12 Bulan</option>
              <option value="24">24 Bulan</option>
              <option value="36">36 Bulan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="Tanggal pinjam" required="" oninvalid="this.setCustomValidity('Mau pinjam tanggal berapa ?')" oninput="setCustomValidity('')">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>