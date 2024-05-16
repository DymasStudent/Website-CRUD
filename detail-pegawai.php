<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            document.location.href = 'login.php';
          </script>";
    exit;
}

$title = 'Detail pegawai';

include 'layout/header.php';

// mengambil id pegawai dari url
$id_pegawai = (int) $_GET['id_pegawai'];

// menampilkan data pegawai
$pegawai = select("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];

?>

<div class="container mt-5">
    <h1>Data <?= $pegawai['nama']; ?> </h1>
    <hr>

    <table class="table table-bordered table-striped mt-3">
        <tr>
            <td>Nama</td>
            <td>: <?= $pegawai['nama']; ?></td>
        </tr>

        <tr>
            <td>Program Studi</td>
            <td>: <?= $pegawai['prodi']; ?></td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $pegawai['telepon']; ?></td>
        </tr>

        <tr>
            <td>Telepon</td>
            <td>: <?= $pegawai['prodi']; ?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td>: <?= $pegawai['email']; ?></td>
        </tr>

        <tr>
            <td width="50%">Foto</td>
            <td>
                <a href="assets/img/<?= $pegawai['foto']; ?>">
                    <img src="assets/img/<?= $pegawai['foto']; ?>" alt="foto" width="50%">
                </a>
            </td>
        </tr>
    </table>

    <a href="pegawai.php" class="btn btn-secondary btn-sm" style="float: right ;">Kembali</a>
</div>

<?php include 'layout/footer.php'; ?>