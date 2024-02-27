<?php
// Ambil data dari POST request
$title = $_POST['title'];
$color = $_POST['color'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$description = $_POST['description'];
$eventId = $_POST['eventId'];

// Proses penyimpanan atau pembaruan ke database
// Gantilah bagian ini dengan logika sesuai dengan struktur database Anda
// Contoh menggunakan MySQLi
$mysqli = new mysqli("localhost", "root", "", "insafilm");

if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

if (!empty($eventId)) {
    // Proses pembaruan jika eventId tidak kosong
    $query = "UPDATE events SET title='$title', color='$color', description='$description' WHERE id=$eventId";
} else {
    // Proses penyimpanan jika eventId kosong
    $query = "INSERT INTO events (title, color, start_date, end_date, description) VALUES ('$title', '$color', '$startDate', '$endDate', '$description')";
}

$result = $mysqli->query($query);

if ($result) {
    echo "Data berhasil disimpan atau diperbarui di database";
} else {
    echo "Terjadi kesalahan: " . $mysqli->error;
}

$mysqli->close();
