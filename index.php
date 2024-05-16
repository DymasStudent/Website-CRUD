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
        <th>No</th>
        <th>Nama</th>
        <th style="text-align: left">Nip</th>
        <th>Gol</th>
        <th>Jabatan</th>
        <th>Instansi</th>
        <th>Asal</th>
        <th>Tujuan</th>
        <th>Berangkat</th>
        <th>Kembali</th>
        <th>Lama</th>
        <th>Transport (pp)</th>
        <th>Uang Harian</th>
        <th>Penginapan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_administrasi as $administrasi): ?>
        <tr>
          <td style="text-align: left"><?= $no++; ?></td>
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
          <!-- <td>Rp. <?= number_format($administrasi['harga'], 0, ',', '.'); ?></td> -->
          <!-- <td><?= date('d/m/Y | H:i:s', strtotime($administrasi['tanggal'])); ?></td> -->
          <!-- <td width="20%" class="text-center">
         <a href="ubah-administrasi.php?id_administrasi=<?= $administrasi['id_administrasi']; ?>"
           class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
         <a href="hapus-administrasi.php?id_administrasi=<?= $administrasi['id_administrasi']; ?>"
           class="btn btn-danger" onclick="return confirm('Yakin Data administrasi Akan Dihapus.?');"><i
             class="fas fa-trash-alt"></i> Hapus</a>
       </td> -->
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<?php include 'layout/footer.php'; ?>