<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">
          <a href="<?= base_url('data_anggota'); ?>" class="btn btn-danger mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
          <a href="<?= base_url('data_anggota/update/') . $anggota['id_anggota']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card card-info">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <table class="table">
                  <tr>
                    <td class="font-weight-bold text-danger">Id Anggota</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['id_anggota'] ?> </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-danger">Nama Anggota</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['nama'] ?> </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-danger">Email</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['email'] ?> </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-danger">Password</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['password'] ?> </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-danger">Alamat</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['alamat'] ?> </td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6">
                <table class="table">
                  <tr>
                    <td class="font-weight-bold text-danger">Jenis Kelamin</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['jk'] ?> </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-danger">No Telpon</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['no_telp'] ?> </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-danger">No KTP</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['no_ktp'] ?> </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-danger">Status</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= $anggota['status'] ?> </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold text-danger">Tanggal Join</td>
                    <td>:</td>
                    <td class="font-weight-bold"> <?= date('d / M / Y', strtotime($anggota['date_created'])) ?> </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php

    function showNominal($detil, $field_name)
    {
      $nominal = $detil ? $detil[$field_name] : '0';
      if ($nominal > 0) {
        $nominal =  number_format($nominal);
      }
      return "Rp. " . $nominal;
    }

    ?>
    <div class="row">
      <div class="col-md-3">
        <div class="card card-danger">
          <div class="card-body">
            <h5 class="card-title">Pinjaman</h5>
            <h6 class='font-weight-bold'><?= showNominal($detil, 'total_bayar') ?></h6>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-danger">
          <div class="card-body">
            <h5 class="card-title">Simpanan Wajib</h5>
            <h6 class='font-weight-bold'><?= showNominal($detil, 'nominal_pokok') ?></h6>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-danger">
          <div class="card-body">
            <h5 class="card-title">Simpanan Pokok</h5>
            <h6 class='font-weight-bold'><?= showNominal($detil, 'total_bayar') ?></h6>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-danger">
          <div class="card-body">
            <h5 class="card-title">Simpanan Sukarela</h5>
            <h6 class='font-weight-bold'><?= showNominal($detil, 'nominal_sukarela') ?></h6>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
</div>