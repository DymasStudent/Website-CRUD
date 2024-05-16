<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
          document.location.href = 'login.php';
        </script>";
  exit;
}

$title = 'Tambah administrasi';

include 'layout/header.php';

// check tombol
if (isset($_POST['tambah'])) {
  if (create_administrasi($_POST) > 0) {
    echo "<script>
            alert('Data administrasi Berhasil Ditambahkan');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('Data administrasi Gagal Ditambahkan');
            document.location.href = 'index.php';
          </script>";
  }
}
?>

<div class="container mt-5">
  <h1>Tambah Data</h1>
  <hr>

  <form action="" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Data administrasi Yang Akan Di isi ..."
        required>
    </div>

    <div class="mb-3">
      <label for="nip" class="form-label">nip</label>
      <input type="text" class="form-control" id="nip" name="nip" placeholder="Data administrasi Yang Akan Di isi ..."
        required>
    </div>

    <div class="mb-3">
      <label for="gol" class="form-label">gol</label>
      <input type="text" class="form-control" id="gol" name="gol" placeholder="Data administrasi Yang Akan Di isi ..."
        required>
    </div>

    <div class="mb-3">
      <label for="jabatan" class="form-label">jabatan</label>
      <input type="text" class="form-control" id="jabatan" name="jabatan"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="instansi" class="form-label">instansi</label>
      <input type="text" class="form-control" id="instansi" name="instansi"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="asal" class="form-label">asal</label>
      <input type="text" class="form-control" id="asal" name="asal" placeholder="Data administrasi Yang Akan Di isi ..."
        required>
    </div>

    <div class="mb-3">
      <label for="tujuan" class="form-label">tujuan</label>
      <input type="text" class="form-control" id="tujuan" name="tujuan"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="berangkat" class="form-label">berangkat</label>
      <input type="date" class="form-control" id="berangkat" name="berangkat"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="kembali" class="form-label">kembali</label>
      <input type="date" class="form-control" id="kembali" name="kembali"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="lama" class="form-label">lama</label>
      <input type="text" class="form-control" id="lama" name="lama" placeholder="Data administrasi Yang Akan Di isi ..."
        required>
    </div>

    <div class="mb-3">
      <label for="transport" class="form-label">transport</label>
      <input type="text" class="form-control" id="transport" name="transport"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="uangHarian" class="form-label">Uang Harian</label>
      <input type="text" class="form-control" id="uangHarian" name="uangHarian"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="penginapan" class="form-label">penginapan</label>
      <input type="text" class="form-control" id="penginapan" name="penginapan"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <div class="mb-3">
      <label for="jumlah" class="form-label">Jumlah</label>
      <input type="number" class="form-control" id="jumlah" name="jumlah"
        placeholder="Data administrasi Yang Akan Di isi ..." required>
    </div>

    <button type="submit" name="tambah" class="btn btn-primary" style="float: right">Tambah</button>
  </form>
</div>

<?php
include 'layout/footer.php';
?>