<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
          document.location.href = 'login.php';
        </script>";
  exit;
}

$title = 'Ubah administrasi';

include 'layout/header.php';

// mengambil id_administrasi dari url
$id_administrasi = (int) $_GET['id_administrasi'];

$administrasi = select("SELECT * FROM administrasi WHERE id_administrasi = $id_administrasi")[0];

// check tombol
if (isset($_POST['ubah'])) {
  if (update_administrasi($_POST) > 0) {
    echo "<script>
            alert('Data administrasi Berhasil Diubah');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('Data administrasi Gagal Diubah');
            document.location.href = 'index.php';
          </script>";
  }
}
?>

<div class="container mt-5">
  <h1>Ubah administrasi</h1>
  <hr>

  <form action="" method="post">

    <input type="hidden" name="id_administrasi" value="<?= $administrasi['id_administrasi']; ?>">

    <div class="mb-3">
      <label for="nama" class="form-label">Nama administrasi</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $administrasi['nama']; ?>"
        placeholder="Nama administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="jumlah" class="form-label">Jumlah</label>
      <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $administrasi['jumlah']; ?>"
        placeholder="
    jumlah administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" class="form-control" id="harga" name="harga" value="<?= $administrasi['harga']; ?>"
        placeholder=" harga
    administrasi Yang Akan Di isi ..." required>
    </div>

    <button type="submit" name="ubah" class="btn btn-primary" style="float: right">Ubah</button>
  </form>
</div>

<?php
include 'layout/footer.php';
?>