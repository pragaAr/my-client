<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
    </div>
    <div class="card">
      <div class="card-body">
        <a href="<?= base_url('simpanan_pokok') ?>" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addSimpananPokok">Tambah Data</a>
        <div class="table-responsive">
          <table class="table table-hover mt-3" id="table-1" width="100%" cellspacing="0">
            <?php if (validation_errors()) : ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
            <?php endif; ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="flashEdit" data-flashdata="<?= $this->session->flashdata('flashEdit'); ?>"></div>

            <thead align="center">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nominal</th>
                <th scope="col">Tanggal Simpan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody align="center">
              <?php $i = 1; ?>
              <?php foreach ($simpananAnggota as $si) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td> <?= $si['nama']; ?></td>
                  <td>Rp. <?= number_format($si['nominal_pokok'], 0, ',', '.') ?></td>
                  <td> <?= date('d / M / Y', strtotime($si['tgl_simpan'])) ?></td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="<?= base_url('simpanan_pokok/update/') . $si['id_sim_pokok']; ?>" class="btn btn-success btn-sm mr-2" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('simpanan_pokok/delete/') . $si['id_sim_pokok']; ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="addSimpananPokok" tabindex="-1" role="dialog" aria-labelledby="addSimpananPokok" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSimpananPokok">Tambah Data Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('simpanan_pokok'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <select name="anggota_id" id="anggota_id" class="form-control" required="" oninvalid="this.setCustomValidity('Nama anggota nya siapa ? ?')" oninput="setCustomValidity('')">
              <option value="">Pilih Anggota</option>
              <?php foreach ($anggota as $data) : ?>
                <option value="<?= $data['id_anggota']; ?>"><?= $data['nama']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="nominal_pokok" min="100000" name="nominal_pokok" placeholder="Nominal Minimum Rp. 100.000" required="" oninvalid="this.setCustomValidity('Nominal Minimum Rp. 100.000')" oninput="setCustomValidity('')">
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