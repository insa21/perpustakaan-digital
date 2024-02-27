<?php
include 'koneksi.php';
if (isset($_GET['isbn'])) {
	if ($_GET['isbn'] != "") {
		$isbn = $_GET['isbn'];
		$get_photo = "SELECT photo FROM buku WHERE isbn='$isbn'";
		$data_photo = mysqli_query($koneksi, $get_photo);
		$photo_lama = mysqli_fetch_array($data_photo);
		unlink("foto/" . $photo_lama['photo']);
		$query = mysqli_query($koneksi, "DELETE FROM buku WHERE isbn='$isbn'");
		if ($query) {
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
			echo "<script>
                    setTimeout(function() {
                        Swal.fire('Success!', 'Data Berhasil Dihapus!', 'success');
                    }, 100);
                </script>";
		} else {
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
			echo "<script>
                    setTimeout(function() {
                        Swal.fire('Error!', 'Gagal Menghapus Data Buku!', 'error');
                    }, 100);
                </script>";
		}
		echo "<script>
                setTimeout(function() {
                    window.location.href = 'lihat_data.php';
                }, 1000);
            </script>";
	} else {
		header("location:lihat_data.php");
	}
} else {
	header("location:lihat_data.php");
}
