<?php


include "../admin/koneksi.php";

if (isset($_POST['kategori'])) {
    $kategori = strtolower($_POST['kategori']);

    $query = "SELECT * FROM buku";

    if ($kategori !== 'semua') {
        $query .= " WHERE LOWER(kategori) = '$kategori'";
    }

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die('Error in SQL query: ' . mysqli_error($koneksi));
    }

    while ($data = mysqli_fetch_assoc($result)) {
        echo '<div class="review">
                <div class="movie-pic">
                    <a href="single.php?id=' . $data["isbn"] . '"><img src="http://localhost/digi-book/admin/foto/' .  $data["photo"] . '" alt="" /></a>
                </div>
                <div class="review-info">
                    <a class="span" href="single.php?id=' . $data['isbn'] . '">' . $data['judul'] . '</a>
                    <p class="dirctr"><a href="single.php?id=' . $data['isbn'] . '">' . $data['penulis'] . ', </a>' . $data['tanggal_terbit'] . '</p>
                    <p class="info"><b>ISBN:</b>&nbsp;&nbsp;' . $data['isbn'] . '</p>
                    <p class="info"><b>JUDUL:</b>&nbsp;&nbsp;' . $data['judul'] . '</p>
                    <p class="info"><b>PENERBIT:</b>&nbsp;&nbsp;' . $data['penerbit'] . '</p>
                    <p class="info"><b>PENULIS:</b>&nbsp;&nbsp;' . $data['penulis'] . '</p>
                    <p class="info"><b>GENDRE:</b>&nbsp;&nbsp;' . $data['gendre'] . '</p>
                    <p class="info"><b>TANGGAL TERBIT:</b>&nbsp;&nbsp;' . $data['tanggal_terbit'] . '</p>
                    <p class="info"><b>HALAMAN:</b>&nbsp;&nbsp;' . $data['jumlah_halaman'] . '</p>
                    <p class="info"><b>BAHASA:</b>&nbsp;&nbsp;' . $data['bahasa'] . '</p>
                    <p class="info"><b>KATEGORI:</b>&nbsp;&nbsp;' . $data['kategori'] . '</p>
                </div>
                <div class="clearfix"></div>
            </div>';
    }

    mysqli_close($koneksi);
}
