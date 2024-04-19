<?php

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
          document.location.href = 'login.php';
        </script>";
  exit;
}

$title = 'Tambah Barang';

include 'layout/header.php';

// check tombol
if (isset($_POST['tambah'])) {
  if (create_barang($_POST) > 0) {
    echo "<script>
            alert('Data Barang Berhasil Ditambahkan');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Barang Gagal Ditambahkan');
            document.location.href = 'index.php';
          </script>";
  }
}
?>

<div class="container mt-5">
  <h1>Tambah Barang</h1>
  <hr>

  <form action="" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Barang</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang Yang Akan Di isi ..."
        required>
    </div>

    <div class="mb-3">
      <label for="jumlah" class="form-label">Jumlah</label>
      <input type="number" class="form-control" id="jumlah" name="jumlah"
        placeholder="jumlah Barang Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" class="form-control" id="harga" name="harga" placeholder="harga Barang Yang Akan Di isi ..."
        required>
    </div>

    <button type="submit" name="tambah" class="btn btn-primary" style="float: right">Tambah</button>
  </form>
</div>

<?php
include 'layout/footer.php';
?>