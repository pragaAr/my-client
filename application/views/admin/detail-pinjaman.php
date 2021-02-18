<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">
          <a href="<?= base_url('data_pinjaman'); ?>" class="btn btn-danger mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
          <!-- <a href="" class="btn btn-info mr-2"><i class="fas fa-print"></i> Print</a> -->
          <a href="<?= base_url('data_pinjaman/update/') . $pinjaman['id_pinjam']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-info">
          <div class="card-body">
            <table class="table">
              <tr>
                <td class="font-weight-bold text-danger">Id Pinjamam</td>
                <td>:</td>
                <td class="font-weight-bold"> <?= $pinjaman['id_pinjam'] ?> </td>
              </tr>
              <tr>
                <td class="font-weight-bold text-danger">Id Anggota</td>
                <td>:</td>
                <td class="font-weight-bold"> <?= $pinjaman['anggota_id'] ?> </td>
              </tr>
              <tr>
                <td class="font-weight-bold text-danger">Jumlah Pinjam</td>
                <td>:</td>
                <td class="font-weight-bold">Rp. <?= number_format($pinjaman['jml_pinjam'], 0, ',', '.') ?></td>
              </tr>
              <tr>
                <td class="font-weight-bold text-danger">Bunga</td>
                <td>:</td>
                <td class="font-weight-bold"><?= $pinjaman['bunga'] ?>%</td>
              </tr>
              <tr>
                <td class="font-weight-bold text-danger">Tempo</td>
                <td>:</td>
                <td class="font-weight-bold"><?= $pinjaman['tempo'] ?> bulan</td>
              </tr>
              <tr>
                <td class="font-weight-bold text-danger">Angsuran/Bulan</td>
                <td>:</td>
                <td class="font-weight-bold">Rp. <?= number_format($pinjaman['angsur_bln'], 0, ',', '.') ?></td>
              </tr>
              <tr>
                <td class="font-weight-bold text-danger">Tanggal Pinjam</td>
                <td>:</td>
                <td class="font-weight-bold"><?= date('d / M / Y, H:i:s', strtotime($pinjaman['tgl_pinjam'])) ?></td>
              </tr>
              <tr>
                <td class="font-weight-bold text-danger">Tanggal Bayar</td>
                <td>:</td>
                <td class="font-weight-bold">Setiap Tanggal <?= date('d  F ', strtotime($pinjaman['tgl_bayar'])) ?></td>
              </tr>
              <tr>
                <td class="font-weight-bold text-danger">Total Bayar</td>
                <td>:</td>
                <td class="font-weight-bold text-danger">Rp. <?= number_format($pinjaman['total_bayar'], 0, ',', '.') ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>