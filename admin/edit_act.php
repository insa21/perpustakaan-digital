<?php
include 'koneksi.php';

function uploadFile($file, $targetDirectory, $allowedExtensions)
{
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileTmp = $file['tmp_name'];

    if (in_array($extension, $allowedExtensions)) {
        $dateHash = md5(date('Y-m-d h:i:s'));
        $fileName = $dateHash . '-' . $file['name'];
        move_uploaded_file($fileTmp, $targetDirectory . $fileName);
        return $fileName;
    } else {
        return false;
    }
}

function updatePhoto($file, $targetDirectory, $existingFileName, $allowedExtensions)
{
    $fileName = '';
    if (!empty($file['name'])) {
        $fileName = uploadFile($file, $targetDirectory, $allowedExtensions);
        if ($fileName === false) {
            header("location:lihat_data.php?pesan=ekstensi_gambar");
            exit;
        }
    } else {
        // Jika tidak ada file baru diunggah, gunakan file yang sudah ada
        $fileName = $existingFileName;
    }

    return $fileName;
}

if (isset($_POST['submit'])) {
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tanggal_terbit = $_POST['tanggal_terbit'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $kategori = $_POST['kategori'];
    $synopsis = $_POST['synopsis'];
    $gendre = implode(", ", $_POST['gendre']);
    $bahasa = $_POST['bahasa'];

    // Validasi ukuran file
    if ($_FILES['link']['size'] > 20971520 || $_FILES['photo']['size'] > 20971520) {
        header("location:lihat_data.php?pesan=size");
        exit;
    }

    // Validasi dan proses file link
    $file_nama_new = updatePhoto($_FILES['link'], 'buku/', '', array('doc', 'docx', 'pdf', 'txt'));

    // Validasi dan proses file foto
    $foto_nama_new = updatePhoto($_FILES['photo'], 'foto/', '', array('png', 'jpg', 'jpeg'));

    // Mengambil data file link dan foto yang sudah ada jika tidak ada yang diupdate
    if (empty($file_nama_new)) {
        $get_data = "SELECT link FROM buku WHERE isbn=?";
        $stmt_data = mysqli_prepare($koneksi, $get_data);
        mysqli_stmt_bind_param($stmt_data, "s", $isbn);
        mysqli_stmt_execute($stmt_data);
        $result_data = mysqli_stmt_get_result($stmt_data);
        $data_lama = mysqli_fetch_assoc($result_data);

        // Menggunakan data lama jika file link tidak diupdate
        $file_nama_new = $data_lama['link'];
    }

    // Mengambil data foto yang sudah ada jika tidak ada yang diupdate
    if (empty($foto_nama_new)) {
        $get_data = "SELECT photo FROM buku WHERE isbn=?";
        $stmt_data = mysqli_prepare($koneksi, $get_data);
        mysqli_stmt_bind_param($stmt_data, "s", $isbn);
        mysqli_stmt_execute($stmt_data);
        $result_data = mysqli_stmt_get_result($stmt_data);
        $data_lama = mysqli_fetch_assoc($result_data);

        // Menggunakan data lama jika foto tidak diupdate
        $foto_nama_new = $data_lama['photo'];
    }

    // Update data buku
    $synopsis = mysqli_real_escape_string($koneksi, $synopsis);
    $query = "UPDATE buku SET judul=?, penulis=?, penerbit=?, 
        tanggal_terbit=?, jumlah_halaman=?, kategori=?, synopsis=?, 
        gendre=?, bahasa=?, link=?, photo=? WHERE isbn=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssssss",
        $judul,
        $penulis,
        $penerbit,
        $tanggal_terbit,
        $jumlah_halaman,
        $kategori,
        $synopsis,
        $gendre,
        $bahasa,
        $file_nama_new,
        $foto_nama_new,
        $isbn
    );
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        header("location:lihat_data.php?pesan=berhasil");
    } else {
        header("location:lihat_data.php?pesan=gagal");
    }
} else {
    header("location:lihat_data.php");
}
