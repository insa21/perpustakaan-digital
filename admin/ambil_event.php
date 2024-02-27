<?php
// Sesuaikan dengan detail koneksi database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insafilm";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data event dari tabel events (gantilah dengan nama tabel yang sesuai)
$sql = "SELECT id, title, start_date AS start, end_date AS end, color FROM events";
$result = $conn->query($sql);

// Array untuk menyimpan data event
$events = array();

// Proses hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format data event sesuai dengan kebutuhan FullCalendar
        $event = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['start'],
            'end' => $row['end'],
            'color' => $row['color']
        );
        // Tambahkan data event ke array
        array_push($events, $event);
    }
}

// Konversi array event ke format JSON
echo json_encode($events);

// Tutup koneksi database
$conn->close();
