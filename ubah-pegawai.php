<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
  echo "<script>
          document.location.href = 'login.php';
        </script>";
  exit;
}

$title = 'Ubah pegawai';

include 'layout/header.php';

// check tombol
if (isset($_POST['ubah'])) {
  if (update_pegawai($_POST) > 0) {
    echo "<script>
            alert('Data pegawai Berhasil Diubah');
            document.location.href = 'pegawai.php';
          </script>";
  } else {
    echo "<script>
            alert('Data pegawai Gagal Diubah');
            document.location.href = 'pegawai.php';
          </script>";
  }
}

// ambil id pegawai dari url
$id_pegawai = (int) $_GET['id_pegawai'];

// query ambil data pegawai
$pegawai = select("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];

?>

<div class="container mt-5">
  <h1>Ubah pegawai</h1>
  <hr>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai']; ?>">
    <input type="hidden" name="fotoLama" value="<?= $pegawai['foto']; ?>">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama pegawai</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama pegawai ..." required
        value="<?= $pegawai['nama']; ?>">
    </div>

    <div class="row">
      <div class="mb-3 col-6">
        <label for="prodi" class="form-label">Program Studi</label>
        <select name="prodi" id="prodi" class="form-control" required>
          <?php $prodi = $pegawai['prodi']; ?>
          <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'selected' : null ?>>Teknik Informatika
          </option>
          <option value="Teknik Mesin" <?= $prodi == 'Teknik Mesin' ? 'selected' : null ?>>Teknik Mesin</option>
          <option value="Teknik Listrik" <?= $prodi == 'Teknik Listrik' ? 'selected' : null ?>>Teknik Listrik</option>
        </select>
      </div>

      <div class="row">
        <div class="mb-3 col-6">
          <label for="jk" class="form-label">Jenis Kelamin</label>
          <select name="jk" id="jk" class="form-control" required>
            <?php $jk = $pegawai['jk']; ?>
            <option value="Laki-Laki" <?= $jk == 'Laki-Laki' ? 'selected' : null ?>>Laki-Laki</option>
            <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
          </select>
        </div>

      </div>

      <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required
          value="<?= $pegawai['telepon']; ?>">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email..." required
          value="<?= $pegawai['email']; ?>">
      </div>

      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto..." onchange="previewImg()">

        <img src="assets/img/<?= $pegawai['foto'] ?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">
      </div>

      <button type="submit" name="ubah" class="btn btn-primary" style="float: right">Ubah</button>
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