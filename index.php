<?php

$title = 'Daftar Barang';

include 'layout/header.php';

$data_barang = select("SELECT * FROM barang ORDER BY id_barang ASC");

?>

<div class="container mt-5">
  <h1><i class="fas fa-list"></i> Data Barang</h1>
  <hr>

  <a href="tambah-barang.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

  <table class="table table-bordered table-striped mt-3" id="table">
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
          <td width="20%" class="text-center">
            <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success"><i
                class="fas fa-edit"></i> Ubah</a>
            <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger"
              onclick="return confirm('Yakin Data Barang Akan Dihapus.?');"><i class="fas fa-trash-alt"></i> Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include 'layout/footer.php'; ?>