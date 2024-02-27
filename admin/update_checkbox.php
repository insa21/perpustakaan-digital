<?php
include 'koneksi.php'; // Sesuaikan dengan nama file koneksi Anda

// Ambil nilai checkbox dari permintaan POST
$taskId = $_POST['task_id']; // ID tugas yang dicentang
$checkboxValue = $_POST['checkbox_value']; // Nilai checkbox (1 untuk dicentang, 0 untuk belum dicentang)

// Update nilai kolom 'completed' di database
$sqlUpdate = "UPDATE events SET completed = $checkboxValue WHERE id = $taskId";
$resultUpdate = $koneksi->query($sqlUpdate);

if ($resultUpdate) {
    echo "Nilai kolom 'completed' telah berhasil diperbarui.";
} else {
    echo "Gagal memperbarui nilai kolom 'completed'.";
}

$koneksi->close();
