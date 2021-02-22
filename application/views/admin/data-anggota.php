<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ?></h1>
    </div>
    <div class="card">
      <div class="card-body">
        <a href="<?= base_url('data_anggota') ?>" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addAnggota">Tambah Data</a>
        <div class="table-responsive">
          <table class="table table-hover mt-3" id="dataTables" width="100%" cellspacing="0">
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
                <th scope="col">Email</th>
                <th scope="col">No Telp</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Join</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody align="center">
              <?php $i = 1; ?>
              <?php foreach ($anggota as $da) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td> <?= $da['nama']; ?></td>
                  <td> <?= $da['email']; ?></td>
                  <td> <?= $da['no_telp']; ?></td>
                  <td> <?= $da['status']; ?></td>
                  <td> <?= date('d  F  Y', strtotime($da['date_created'])) ?></td>
                  <td>
                    <div class="btn-group" role="group">
                      <a href="<?= base_url('data_anggota/detail/') . $da['id_anggota']; ?>" class="btn btn-info btn-sm mr-2" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                      <a href="<?= base_url('data_anggota/update/') . $da['id_anggota']; ?>" class="btn btn-success btn-sm mr-2" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      <a href="<?= base_url('data_anggota/delete/') . $da['id_anggota']; ?>" class="btn btn-danger btn-sm tombol-hapus" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="addAnggota" tabindex="-1" role="dialog" aria-labelledby="addAnggota" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAnggota">Tambah Anggota Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('data_anggota'); ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required autofocus oninvalid="this.setCustomValidity('Nama nya siapa ?')" oninput="setCustomValidity('')">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email nya apa ?')" oninput="setCustomValidity('')">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password diisi wajib hukumnya !')" oninput="setCustomValidity('')">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat nya mana ?')" oninput="setCustomValidity('')">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <select name="jk" id="jk" class="form-control" required oninvalid="this.setCustomValidity('Jenis Kelamin nya apa ?')" oninput="setCustomValidity('')">
                  <option value="">Pilih jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon" required oninvalid="this.setCustomValidity('No Telepon berapa ?')" oninput="setCustomValidity('')">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="No KTP" required oninvalid="this.setCustomValidity('No KTP nya mana ?')" oninput="setCustomValidity('')">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="status" name="status" placeholder="Status" required oninvalid="this.setCustomValidity('Status nya apa ?')" oninput="setCustomValidity('')">
              </div>
              <div class="form-group text-right">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>