<?php
// Menggunakan file koneksi.php
include 'koneksi.php';

// Memastikan request adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap nilai aksi (add, update, delete)
    $action = $_POST['action'];

    // Aksi penambahan acara

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'];

        if ($action === 'add') {
            $title = $_POST['title'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $color = $_POST['color'];
            $description = $_POST['description'];
            $date = $_POST['date']; // Terima data tanggal

            $query = "INSERT INTO events (title, start_datetime, end_datetime, color_status, description, date) 
                  VALUES ('$title', '$start', '$end', '$color', '$description', '$date')";
            mysqli_query($koneksi, $query);
        }
    }

    // Aksi pembaruan acara
    elseif ($action === 'update') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $color = $_POST['color'];
        $description = $_POST['description'];
        $date = $_POST['date'];

        $query = "UPDATE events SET title = '$title', start_datetime = '$start', end_datetime = '$end', 
                  color_status = '$color', description = '$description', date ='$date' WHERE id = $id";
        mysqli_query($koneksi, $query);
    }

    // Aksi penghapusan acara
    elseif ($action === 'delete') {
        $id = $_POST['id'];

        $query = "DELETE FROM events WHERE id = $id";
        mysqli_query($koneksi, $query);
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
