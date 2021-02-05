<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Anggota</h4>
            </div>
            <div class="card-body">
              <?= count($anggota) ?> orang
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-users"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Jumlah Peminjam</h4>
            </div>
            <div class="card-body">
              <?= count($pinjaman) ?> orang
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-hand-holding-usd"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Pinjaman</h4>
            </div>
            <div class="card-body">
              Rp. <?= number_format($total_pinjaman) ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Angsuran</h4>
            </div>
            <div class="card-body">
              Rp. <?= number_format($angsuran_masuk) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Show/hide your token</h4>
        <div class="card-header-action">
          <a data-collapse="#mycard-collapse" class="btn btn-icon btn-danger" href="#"><i class="fas fa-minus"></i></a>
        </div>
      </div>
      <div class="collapse show" id="mycard-collapse">
        <div class="card-body">
          <p><?= $jwt ?></p>
        </div>
      </div>
    </div>
  </section>
</div>
</div>