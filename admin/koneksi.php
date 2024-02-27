<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "insafilm";
$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) { //jika tidak terkoneksi maka akan tampil error
  die("Koneksi dengan database gagal: " . mysqli_connect_error());
}
