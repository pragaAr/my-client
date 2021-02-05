<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

  <title>Data Pinjaman</title>
  <style>
    * {
      margin-top: 20px;
      font-family: roboto;
      font-weight: 500;
    }

    .line-title {
      border: 0;
      border-style: unset;
      border-top: 1px solid #000;
    }

    @page {
      size: A4;
      margin: 0;
    }

    @media print {

      html,
      body {
        width: 210mm;
        height: 297mm;
      }

      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="page">
      <img src="<?= base_url('assets/assets/img/ajmHD.png') ?>" alt="logo-ajm" style="position:absolute; width:95px; height:auto; margin-top:40px !important;">
      <table class="table table-borderless" width="100%" cellspacing="0">
        <tr>
          <td align="center">
            <span style="line-height:1.6; font-weight:bold">KOPERASI SIMPAN PINJAM ADI JAYA MAKMUR<br>
            </span>
            <p>Jl. Segaran Baru Rt 05 Rw 11 No 01<br>Kota Semarang, Jawa Tengah</p>
          </td>
        </tr>
      </table>
      <hr class="line-title">
      <p>Data Pinjaman</p>
      <table class="table table-bordered" style="font-size:small;">
        <tr align="center">
          <th>Id Pinjam</th>
          <th>Id Anggota</th>
          <th>Nama Anggota</th>
          <th>Total Pinjam</th>
          <th>Angsuran/bln</th>
          <th>Total Angsur</th>
          <th>Sisa Angsur</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Bayar</th>
        </tr>
        <tbody align="center">
          <tr>
            <td><?= $detailPinjam['id_pinjam'] ?></td>
            <td><?= $detailPinjam['anggota_id'] ?></td>
            <td><?= $detailPinjam['nama'] ?></td>
            <td>Rp. <?= number_format($detailPinjam['total_bayar']) ?></td>
            <td>Rp. <?= number_format($detailPinjam['angsur_bln']) ?></td>
            <td>Rp. <?= number_format($detailPinjam['total_angsur']) ?></td>
            <td>Rp. <?= number_format($detailPinjam['sisa_angsur']) ?></td>
            <td><?= date('d-m-Y H:i:s', strtotime($detailPinjam['tgl_pinjam']))  ?></td>
            <td>Setiap Tanggal <?= date('d', strtotime($detailPinjam['tgl_bayar'])) ?></td>
          </tr>
        </tbody>
      </table>
      <br>
      <p>Data Angsuran</p>
      <table class="table table-bordered mt-3" style="font-size:small;" width="100%" cellspacing="0">
        <tr align="center">
          <th>Tanggal Angsur</th>
          <th>Nominal</th>
          <th>Keterangan</th>
        </tr>
        <tbody align="center">
          <?php
          foreach ($angsuran as $angsuran) {
          ?>
            <tr>
              <td><?= date('d-m-Y H:i:s', strtotime($angsuran['tgl_bayar'])) ?></td>
              <td>Rp. <?= number_format($angsuran['nom_angsur']) ?></td>
              <td><?= $angsuran['ket_otomatis'] ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <hr class="line-title">
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script>
    window.print();
  </script>
</body>

</html>