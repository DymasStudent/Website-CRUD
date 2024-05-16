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
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
    echo "<script>
            alert('Anda tidak punya Akses');
            document.location.href = 'crud-modal.php';
          </script>";
    exit;
}

$title = 'Daftar pegawai';

include 'layout/header.php';


// menampilkan data pegawai
$data_pegawai = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC")

    ?>

<div class="container mt-5">
    <h1><i class="fas fa-users"></i> Data pegawai</h1>
    <hr>

    <a href="tambah-pegawai.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_pegawai as $pegawai): ?>
                <tr>
                    <td>
                        <?= $no++; ?>
                    </td>
                    <td>
                        <?= $pegawai['nama']; ?>
                    </td>
                    <td>
                        <?= $pegawai['prodi']; ?>
                    </td>
                    <td>
                        <?= $pegawai['jk']; ?>
                    </td>
                    <td>
                        <?= $pegawai['telepon']; ?>
                    </td>
                    <td class="text-center" width="20%">
                        <a href="detail-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>"
                            class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                        <a href="ubah.pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>"
                            class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus-pegawai.php?id_pegawai=<?= $pegawai['id_pegawai']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda Yakin Menghapus Data Berikut.?');"><i
                                class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'layout/footer.php'; ?>