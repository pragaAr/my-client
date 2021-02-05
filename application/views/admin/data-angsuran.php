<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
    </div>
    <div class="card">
      <div class="card-body">
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
                <th scope="col">Total Pinjaman</th>
                <th scope="col">Sudah Diangsur</th>
                <th scope="col">Sisa Pinjaman</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody align="center">
              <?php $i = 1; ?>
              <?php foreach ($angsuran as $da) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td> <?= $da['nama']; ?></td>
                  <td>Rp. <?= number_format($da['total_bayar']); ?></td>
                  <td>Rp. <?= number_format($da['total_angsur']); ?></td>
                  <td>Rp. <?= number_format($da['sisa_angsur']); ?></td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="<?= base_url('data_angsuran/detail/') . $da['id_pinjam']; ?>" class="btn btn-info btn-sm mr-2" data-toggle="tooltip" title="Detail"><i class="fas fa-info-circle"></i></a>
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