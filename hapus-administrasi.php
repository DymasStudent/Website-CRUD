<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            document.location.href = 'login.php';
          </script>";
    exit;
}

include 'config/app.php';

// menerima id administrasi yang dipilih pengguna
$id_administrasi = (int) $_GET['id_administrasi'];

if (delete_administrasi($id_administrasi) > 0) {
    echo "<script>
            alert('Data administrasi Berhasil Dihapus');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
            alert('Data administrasi Gagal Dihapus');
            document.location.href = 'index.php';
        </script>";
}