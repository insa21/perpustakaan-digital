<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
	header("Location: login.php"); // Redirect ke halaman login jika belum login
	exit();
}

include 'koneksi.php';

if (isset($_POST['submit'])) {
	$isbn = $_POST['isbn'];
	$file_nama = $_FILES['link']['name'];
	$file_size = $_FILES['link']['size'];
	$foto_nama = $_FILES['photo']['name'];
	$foto_size = $_FILES['photo']['size'];
	$judul = $_POST['judul'];
	$penulis = $_POST['penulis'];
	$penerbit = $_POST['penerbit'];
	$tanggal_terbit = $_POST['tanggal_terbit'];
	$jumlah_halaman = $_POST['jumlah_halaman'];
	$kategori = $_POST['kategori'];
	$synopsis = mysqli_real_escape_string($koneksi, $_POST['synopsis']);
	$gendre = implode(", ", $_POST['gendre']); // Menyesuaikan nama variabel dengan database
	$bahasa = $_POST['bahasa'];

	// Validasi ukuran file
	if ($file_size > 20971520 || $foto_size > 20971520) { // Mengubah batas ukuran menjadi 20 MB
		header("location:lihat_data.php?pesan=size");
		exit;
	} else {
		// Inisialisasi variabel $foto_nama_new
		$foto_nama_new = '';

		if (!empty($file_nama)) {
			$allowed_extensions = array('doc', 'docx', 'pdf', 'txt');
			$extension = pathinfo($file_nama, PATHINFO_EXTENSION);
			$file_tmp = $_FILES['link']['tmp_name'];
			$tanggal = md5(date('Y-m-d h:i:s'));
			$file_nama_new = $tanggal . '-' . $file_nama;

			if (in_array($extension, $allowed_extensions)) {
				move_uploaded_file($file_tmp, 'buku/' . $file_nama_new);
			} else {
				header("location:lihat_data.php?pesan=ekstensi");
				exit;
			}
		}

		if (!empty($foto_nama)) {
			$ekstensi_izin = array('png', 'jpg', 'jpeg');
			$pisahkan_ekstensi = explode('.', $foto_nama);
			$ekstensi = strtolower(end($pisahkan_ekstensi));
			$file_tmp = $_FILES['photo']['tmp_name'];
			$tanggal = md5(date('Y-m-d h:i:s'));
			$foto_nama_new = $tanggal . '-' . $foto_nama;

			if (in_array($ekstensi, $ekstensi_izin)) {
				move_uploaded_file($file_tmp, 'foto/' . $foto_nama_new);
			} else {
				header("location:lihat_data.php?pesan=ekstensi");
				exit;
			}
		}

		$query = mysqli_query($koneksi, "INSERT INTO buku (isbn, link, photo, judul, penulis, penerbit, tanggal_terbit, jumlah_halaman, kategori, synopsis, gendre, bahasa) VALUES ('$isbn', '$file_nama_new', '$foto_nama_new', '$judul', '$penulis', '$penerbit', '$tanggal_terbit', '$jumlah_halaman', '$kategori', '$synopsis', '$gendre', '$bahasa')");

		if ($query) {
			header("location:lihat_data.php?pesan=berhasil");
			exit;
		} else {
			header("location:lihat_data.php?pesan=gagal");
			exit;
		}
	}
}
