<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">
          <a href="<?= base_url('data_angsuran'); ?>" class="btn btn-danger mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
          <a href="" class="btn btn-primary mr-2" data-toggle="modal" data-target="#newAngsuranModal"><i class="fas fa-hand-holding-usd"></i> Bayar Angsuran</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

      <div class="col-md-5">
        <div class="card card-info">
          <div id="collapseOne" class="collapse show" aria-labelledby="cardPinjaman" data-parent="#hidecard">
            <div class="card-body">
              <table class="table">
                <tr>
                  <td class="font-weight-bold text-danger">Id Pinjaman</td>
                  <td class="font-weight-bold"> <?= $summaryAngsuran['id_pinjam'] ?> </td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-danger">Id Anggota</td>
                  <td class="font-weight-bold"> <?= $summaryAngsuran['anggota_id'] ?> </td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-danger">Nama Anggota</td>
                  <td class="font-weight-bold"> <?= $summaryAngsuran['nama'] ?> </td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-danger">Total Pinjam</td>
                  <td class="font-weight-bold">Rp <?= number_format($summaryAngsuran['total_bayar']) ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-danger">Angsuran/Bulan</td>
                  <td class="font-weight-bold text-danger">Rp <?= number_format($summaryAngsuran['angsur_bln']); ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-danger">Total Angsur</td>
                  <td class="font-weight-bold">Rp <?= number_format($summaryAngsuran['total_angsur']) ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-danger">Sisa Angsur</td>
                  <td class="font-weight-bold">Rp <?= number_format($summaryAngsuran['sisa_angsur']) ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-danger">Tanggal Pinjam</td>
                  <td class="font-weight-bold"><?= date('d  F  Y H:i:s', strtotime($summaryAngsuran['tgl_pinjam'])) ?></td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-danger">Tanggal Bayar</td>
                  <td class="font-weight-bold">Setiap Tanggal <?= date('d', strtotime($summaryAngsuran['tgl_bayar'])) ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="card card-info">
          <div class="card-header">
            <h4></h4>
            <div class="card-header-action">
              <div class="dropdown">
                <button class="btn btn-info dropdown-toggle mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Print / Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?= base_url('data_angsuran/print/') . $summaryAngsuran['id_pinjam']; ?>"><i class="fas fa-print text-danger"></i> Print</a>
                  <a class="dropdown-item" target="blank" href="<?= base_url('data_angsuran/download/') . $summaryAngsuran['id_pinjam']; ?>"><i class="fas fa-download text-success"></i> Download</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tanggal Angsur</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($angsurans as $angsuran) {
                  ?>
                    <tr>
                      <td><?= date('d  F  Y H:i:s', strtotime($angsuran['tgl_bayar'])) ?></td>
                      <td>Rp. <?= number_format($angsuran['nom_angsur']) ?></td>
                      <td><?= $angsuran['ket_otomatis'] ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<div class="modal fade" id="newAngsuranModal" tabindex="-1" role="dialog" aria-labelledby="newAngsuranModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAngsuranModal">Tambah Angsuran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('data_angsuran/Bayarangsuran'); ?>" method="post">
        <div class="modal-body">
          <input type="hidden" class="form-control" id="pinjam_id" name="pinjam_id" value="<?= $summaryAngsuran['id_pinjam'] ?>">
          <div class="form-group">
            <label for="tgl_bayar">Tanggal Bayar</label>
            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" required="" oninvalid="this.setCustomValidity('Bayar tanggal berapa ?')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label for="tgl_bayar">Nominal</label>
            <input type="text" class="form-control font-weight-bold text-danger" id="nom_angsur" name="nom_angsur" value="<?= $summaryAngsuran['angsur_bln']; ?>" readonly>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>