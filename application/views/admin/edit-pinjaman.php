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
              <input type="hidden" name="id_pinjam" value="<?= $pinjaman['id_pinjam']; ?>">
              <div class="form-group">
                <label for="anggota_id">Id Anggota</label>
                <input type="text" name="anggota_id" class="form-control" id="anggota_id" value="<?= $pinjaman['anggota_id']; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="jml_pinjam">Jumlah Pinjam</label>
                <input type="text" name="jml_pinjam" class="form-control" id="formatRupiah" value="<?= $pinjaman['jml_pinjam']; ?>" required="" oninvalid="this.setCustomValidity('Mau pinjam berapa ?')" oninput="setCustomValidity('')">
              </div>
              <div class="form-group">
                <label for="bunga">Suku Bunga</label>
                <select name="bunga" id="bunga" class="form-control" required="" oninvalid="this.setCustomValidity('Mau bunga berapa ?')" oninput="setCustomValidity('')">
                  <option value="<?= $pinjaman['bunga']; ?>"><?= $pinjaman['bunga']; ?> %</option>
                  <option value="">---Pilih Suku Bunga---</option>
                  <option value="1">1 %</option>
                  <option value="2">2 %</option>
                  <option value="3">3 %</option>
                  <option value="4">4 %</option>
                </select>
              </div>
              <div class="form-group">
                <label for="tempo">Jangka Angsuran</label>
                <select name="tempo" id="tempo" class="form-control" required="" oninvalid="this.setCustomValidity('Mau bayar berapa kali ?')" oninput="setCustomValidity('')">
                  <option value="<?= $pinjaman['tempo']; ?>"><?= $pinjaman['tempo']; ?> Bulan</option>
                  <option value="">Pilih Jangka Angsuran (Bulan)</option>
                  <option value="6 ">6 Bulan</option>
                  <option value="12 ">12 Bulan </option>
                  <option value="24 ">24 Bulan</option>
                  <option value="36 ">36 Bulan</option>
                </select>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('data_pinjaman'); ?>" class="btn btn-danger mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>