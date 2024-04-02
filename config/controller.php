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

function create_barang($post)
{
 global $db;

 $nama = $post['nama'];
 $jumlah = $post['jumlah'];
 $harga = $post['harga'];

 $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

 mysqli_query($db, $query);

 return mysqli_affected_rows($db);
}