<?php

// render halaman menjadi json
header('Content-Type: application/json');

require '../config/app.php';

// menerima input
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

$query = select("SELECT * FROM administrasi");

echo json_encode(['data_administrasi' => $query]);