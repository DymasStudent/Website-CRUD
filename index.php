<?php

include 'database.php';

function select ($query)
{
  // panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] =$row;
    }

    return $rows;
}

$data_barang = select('SELECT * FROM barang');


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Modal</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>

    <div class="container mt-5">
    <h1>DATA BARANG</h1>

    <table class="table table-bordered table-striped mt-3">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </thead>

    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_barang as $barang) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $barang ['nama']; ?></td>
            <td><?= $barang ['jumlah']; ?></td>
            <td><?= $barang ['harga']; ?></td>
            <td><?= $barang ['tanggal']; ?></td>
            <td width="15%" class="text-center">
                <a href="" class="btn btn-success">Ubah</a>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>