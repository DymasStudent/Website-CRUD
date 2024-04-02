<?php

include 'layout/header.php';

$data_barang = select('SELECT * FROM barang');

?>

<div class="container mt-5">
  <h1>DATA BARANG</h1>
  <hr>

  <a href="form-tambah.php" class="btn btn-primary mb-1">Tambah</a>

  <table class="table table-bordered table-striped mt-3">
    <thead>
      <th>No</th>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Tanggal</th>
      <th>Aksi</th>
    </thead>

    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_barang as $barang): ?>
        <tr>
          <td>
            <?= $no++; ?>
          </td>
          <td>
            <?= $barang['nama']; ?>
          </td>
          <td>
            <?= $barang['jumlah']; ?>
          </td>
          <td>Rp.
            <?= number_format($barang['harga'], 0, ',', '.'); ?>
          </td>
          <td>
            <?= date('d/m/Y | H:i:s', strtotime($barang['tanggal'])); ?>
          </td>
          <td width="15%" class="text-center">
            <a href="" class="btn btn-success">Ubah</a>
            <a href="" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include 'layout/footer.php'; ?>