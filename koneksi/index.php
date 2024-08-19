<?php

$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "petik_tunggal";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);

// link url
$url = "http://localhost:1975/petik-tunggal/";
// if ($koneksi) {
//     echo "koneksi berhasil";
// } else {
//     echo "koneksi gagal";
// }
