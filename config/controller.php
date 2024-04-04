<?php

// menampilkan data
function select($query)
{
    // panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambah data barang
function create_barang($post)
{
    global $db;

    $nama = htmlspecialchars($post['nama']);
    $jumlah = htmlspecialchars($post['jumlah']);
    $harga = htmlspecialchars($post['harga']);
    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengubah data barang
function update_barang($post)
{
    global $db;

    $id_barang = htmlspecialchars($post['id_barang']);
    $nama = htmlspecialchars($post['nama']);
    $jumlah = htmlspecialchars($post['jumlah']);
    $harga = htmlspecialchars($post['harga']);

    // query ubah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    // query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menambah data mahasiswa
function create_mahasiswa($post)
{
    global $db;

    $nama = htmlspecialchars($post['nama']);
    $prodi = htmlspecialchars($post['prodi']);
    $jk = htmlspecialchars($post['jk']);
    $telepon = htmlspecialchars($post['telepon']);
    $email = htmlspecialchars($post['email']);
    $foto = upload_file();

    // check upload foto
    if (!$foto) {
        return false;
    }

    // query tambah data
    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengupload file
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile = explode('.', $namaFile);
    $extensifile = strtolower(end($extensifile));

    // check format/estensi file
    if (!in_array($extensifile, $extensifileValid)) {
        // pesan gagal

        echo "<script>
                alert('Form File Tidak Valid');
                document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    // check ukuran file 2 MB
    if ($ukuranFile > 2048000) {
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.location.href = 'tambah-mahasiswa.php';
            </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindah ke folder local
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;

}

function delete_mahasiswa($id_mahasiswa)
{
    global $db;

    // query hapus data mahasiswa
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}