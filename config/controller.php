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

// fungsi menambah data administrasi
function create_administrasi($post)
{
    global $db;

    $nama = htmlspecialchars($post['nama']);
    $nip = htmlspecialchars($post['nip']);
    $gol = htmlspecialchars($post['gol']);
    $jabatan = htmlspecialchars($post['jabatan']);
    $instansi = htmlspecialchars($post['instansi']);
    $asal = htmlspecialchars($post['asal']);
    $tujuan = htmlspecialchars($post['tujuan']);
    $berangkat = htmlspecialchars($post['berangkat']);
    $kembali = htmlspecialchars($post['kembali']);
    $lama = htmlspecialchars($post['lama']);
    $transport = htmlspecialchars($post['transport']);
    $uangHarian = htmlspecialchars($post['uangHarian']);
    $penginapan = htmlspecialchars($post['penginapan']);
    $jumlah = htmlspecialchars($post['jumlah']);
    // query tambah data
    $query = "INSERT INTO administrasi VALUES(null, '$nama', '$nip', '$gol', '$jabatan', '$instansi', '$asal', '$tujuan', '$berangkat', '$kembali', '$lama', '$transport', '$uangHarian', '$penginapan', '$jumlah', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengubah data administrasi
function update_administrasi($post)
{
    global $db;

    $id_administrasi = htmlspecialchars($post['id_administrasi']);
    $nama = htmlspecialchars($post['nama']);
    $jumlah = htmlspecialchars($post['jumlah']);
    $harga = htmlspecialchars($post['harga']);

    // query ubah data
    $query = "UPDATE administrasi SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_administrasi = $id_administrasi";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data administrasi
function delete_administrasi($id_administrasi)
{
    global $db;

    // query hapus data administrasi
    $query = "DELETE FROM administrasi WHERE id_administrasi = $id_administrasi";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menambah data pegawai
function create_pegawai($post)
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
    $query = "INSERT INTO pegawai VALUES(null, '$nama', '$prodi', '$jk', '$telepon', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data pegawai
function update_pegawai($post)
{
    global $db;

    $id_pegawai = htmlspecialchars($post['$id_pegawai']);
    $nama = htmlspecialchars($post['nama']);
    $prodi = htmlspecialchars($post['prodi']);
    $jk = htmlspecialchars($post['jk']);
    $telepon = htmlspecialchars($post['telepon']);
    $email = htmlspecialchars($post['email']);
    $fotoLama = htmlspecialchars($post['fotoLama']);

    // check upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    // query ubah data
    $query = "UPDATE pegawai SET nama = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', email = '$email', foto = '$foto' WHERE id_pegawai = $id_pegawai";

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
                document.location.href = 'tambah-pegawai.php';
            </script>";
        die();
    }

    // check ukuran file 2 MB
    if ($ukuranFile > 2048000) {
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.location.href = 'tambah-pegawai.php';
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

// fungsi menghapus data pegawai
function delete_pegawai($id_pegawai)
{
    global $db;

    // ambil foto sesusai data yang dipilih
    $foto = select("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")[0];
    unlink("assets/img/" . $foto['foto']);

    // query hapus data pegawai
    $query = "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi tambah akun
function create_akun($post)
{
    global $db;

    $nama = htmlspecialchars($post['nama']);
    $username = htmlspecialchars($post['username']);
    $email = htmlspecialchars($post['email']);
    $password = htmlspecialchars($post['password']);
    $level = htmlspecialchars($post['level']);

    // encrypted password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah data
    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi ubah akun
function update_akun($post)
{
    global $db;

    $id_akun = htmlspecialchars($post['id_akun']);
    $nama = htmlspecialchars($post['nama']);
    $username = htmlspecialchars($post['username']);
    $email = htmlspecialchars($post['email']);
    $password = htmlspecialchars($post['password']);
    $level = htmlspecialchars($post['level']);

    // encrypted password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query ubah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus data akun
function delete_akun($id_akun)
{
    global $db;

    // query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}