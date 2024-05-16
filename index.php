<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
          document.location.href = 'login.php';
        </script>";
  exit;
}

// membatasi halaman sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 2) {
  echo "<script>
          alert('Anda tidak punya Akses');
          document.location.href = 'crud-modal.php';
        </script>";
  exit;
}

$title = 'Administrasi';

include 'layout/header.php';

$data_administrasi = select("SELECT * FROM administrasi ORDER BY id_administrasi ASC");

?>

<div class="container mt-5">
  <h3 class="text-center">DAFTAR NOMINATIF PEJABAT / PEGAWAI</h3>
  <h3 class="text-center mt-2">KEGIATAN KAJIAN PEMANFAATAN DATA GNSS UNTUK MENDUKUNG INSATEWS</h3>
  <h3 class="text-center mt-2">PERJALANAN DINAS BIASA</h3>
  <h3 class="text-center mt-2">BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA</h3>
  <h3 class="text-center mb-4">TAHUN ANGGARAN <?= date('Y') ?></h3>
  <hr>
  <h1><i class="fas fa-list"></i> Pengajuan Nominatif</h1>


  <a href="tambah-administrasi.php" class="btn btn-primary mb-1 mt-1"><i class="fas fa-plus-circle"></i> Tambah</a>
  <h5>kode kegiatan :</h5>

  <table class="table table-bordered table-striped mt-3" id="table">
    <thead>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2" style="text-align: left">Nip</th>
        <th rowspan="2">Gol</th>
        <th rowspan="2">Jabatan</th>
        <th rowspan="2">Instansi</th>
        <th rowspan="2">Asal</th>
        <th rowspan="2">Tujuan</th>
        <th colspan="2" style="text-align: center">Tanggal</th>
        <th rowspan="2">Lama</th>
        <th rowspan="2">Transport (pp)</th>
        <th rowspan="2">Uang Harian</th>
        <th rowspan="2">Penginapan</th>
        <th rowspan="2">Jumlah</th>
      </tr>
      <tr>
        <th>Berangkat</th>
        <th>Kembali</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_administrasi as $administrasi): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $administrasi['nama']; ?></td>
          <td><?= $administrasi['nip']; ?></td>
          <td><?= $administrasi['gol']; ?></td>
          <td><?= $administrasi['jabatan']; ?></td>
          <td><?= $administrasi['instansi']; ?></td>
          <td><?= $administrasi['asal']; ?></td>
          <td><?= $administrasi['tujuan']; ?></td>
          <td><?= $administrasi['berangkat']; ?></td>
          <td><?= $administrasi['kembali']; ?></td>
          <td><?= $administrasi['lama']; ?></td>
          <td>Rp. <?= number_format($administrasi['transport'], 0, ',', '.'); ?></td>
          <td>Rp. <?= number_format($administrasi['uangHarian'], 0, ',', '.'); ?></td>
          <td>Rp. <?= number_format($administrasi['penginapan'], 0, ',', '.'); ?></td>
          <td>Rp. <?= number_format($administrasi['jumlah'], 0, ',', '.'); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<?php include 'layout/footer.php'; ?>