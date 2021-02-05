<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../../../assets/assets/css/mycss.css"> -->
  <title>Data Pinjaman</title>
  <style>
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .container {
      margin: 60px;
      font-family: 'PT Sans', sans-serif;
    }

    .page-title {
      font-size: 1.7em;
      font-weight: bold;
      text-align: center !important;
      letter-spacing: 0.75px;
    }

    .page-p {
      text-align: center !important;
      font-size: 1em;
      letter-spacing: 0.75px;
    }

    .logo {
      background-image: url("../../assets/ajmHD.png");
      background-size: cover;
      position: absolute;
      width: 90px;
      height: 90px;
      margin: 10px 0 0 10px;
    }

    .table-p {
      text-align: left !important;
      margin-left: 20px;
      font-size: 1em;
      letter-spacing: 0.75px;
      font-weight: bold;
    }

    table {
      font-size: 0.70em;
      text-align: center !important;
      margin: auto;
      border-collapse: collapse;
    }

    table th {
      padding: 15px 35px;
      border: 0.5px solid #4e4e4e;
    }

    table tr {
      text-align: center;
      border: 0.5px solid #4e4e4e;
    }

    table td {
      padding: 15px 35px;
      border: 0.5px solid #4e4e4e;
    }

    .line-title {
      border: 0;
      border-style: unset;
      border-top: 1px solid #000;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="page">
      <div class="logo"></div>

      <h3 class="page-title">Koperasi Simpan Pinjam Adi Jaya Makmur</h3>
      <p class="page-p">Jl. Segaran Baru Rt 05 Rw 11 No.01<br>Kota Semarang, Jawa Tengah</p>

      <hr class="line-title">
      <p class="table-p">Data Pinjaman</p>
      <table>
        <tr>
          <th>Id Pinjam</th>
          <th>Nama Anggota</th>
          <th>Total Pinjam</th>
          <th>Angsuran/bln</th>
          <th>Total Angsur</th>
          <th>Sisa Angsur</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Bayar</th>
        </tr>
        <tbody>
          <tr>
            <td><?= $detailPinjam['id_pinjam'] ?></td>
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
      <p class="table-p">Data Angsuran</p>
      <table>
        <tr>
          <th>Tanggal Angsur</th>
          <th>Nominal</th>
          <th>Keterangan</th>
        </tr>
        <tbody>
          <?php
          foreach ($angsuran as $angsuran) {
          ?>
            <tr>
              <td><?= date('d-m-Y', strtotime($angsuran['tgl_bayar'])) ?></td>
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

</body>

</html>