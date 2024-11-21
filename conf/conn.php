<?php

$koneksi = mysqli_connect(hostname: "localhost", username: "root", password: "", database: "toko-buku");

if ($koneksi) {
  // echo "koneksi berhasil";
} else {
  echo "Koneksi gagal: " . mysqli_connect_error();
}
