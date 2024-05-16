<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
          document.location.href = 'login.php';
        </script>";
  exit;
}

$title = 'Tambah pegawai';

include 'layout/header.php';

// check tombol
if (isset($_POST['tambah'])) {
  if (create_pegawai($_POST) > 0) {
    echo "<script>
            alert('Data pegawai Berhasil Ditambahkan');
            document.location.href = 'pegawai.php';
          </script>";
  } else {
    echo "<script>
            alert('Data pegawai Gagal Ditambahkan');
            document.location.href = 'pegawai.php';
          </script>";
  }
}
?>

<div class="container mt-5">
  <h1>Tambah pegawai</h1>
  <hr>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama pegawai</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama pegawai ..." required>
    </div>

    <div class="row">
      <div class="mb-3 col-6">
        <label for="prodi" class="form-label">Program Studi</label>
        <select name="prodi" id="prodi" class="form-control" required>
          <option value="">-- pilih prodi --</option>
          <option value="Teknik Informatika">Teknik Informatika</option>
          <option value="Teknik Mesin">Teknik Mesin</option>
          <option value="Teknik Listrik">Teknik Listrik</option>
        </select>
      </div>

      <div class="mb-3 col-6">
        <label for="jk" class="form-label">Jenis Kelamin</label>
        <select name="jk" id="jk" class="form-control" required>
          <option value="">-- pilih jenis kelamin --</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>

    <div class="mb-3">
      <label for="telepon" class="form-label">telepon</label>
      <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email..." required>
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">foto</label>
      <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..." onchange="previewImg()">

      <img src="" alt="" class="img-thumbnail img-preview mt-2" width="100px">
    </div>

    <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
  </form>
</div>

<!-- preview image -->
<script>
  function previewImg() {
    const foto = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    filefoto.onload = function (e) {
      imgPreview.src = e.target.result;
    }
  }
</script>

<?php
include 'layout/footer.php';
?>