<?php
// File koneksi database
include '../admin/koneksi.php';

// Jumlah item per halaman
$itemsPerPage = 12;

// Menghitung total jumlah data
$resultCountQuery = mysqli_query($koneksi, "SELECT COUNT(*) FROM buku");

if ($resultCountQuery) {
    $resultCount = mysqli_fetch_row($resultCountQuery)[0];
} else {
    die("Kesalahan koneksi database: " . mysqli_error($koneksi));
}

// Menghitung total halaman
$totalPages = ceil($resultCount / $itemsPerPage);

// Mendapatkan nomor halaman saat ini dari URL, default ke 1 jika tidak diatur
$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Menghitung nomor awal LIMIT SQL untuk hasil pada halaman saat ini
$offset = ($currentPage - 1) * $itemsPerPage;

// Query untuk mengambil data untuk halaman saat ini
$query = mysqli_query($koneksi, "SELECT * FROM buku LIMIT $offset, $itemsPerPage");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InsaFilm | Nonton Gratis Tanpa Karcis</title>

    <!-- Favicon -->
    <link rel="icon" href="images/logo3.png" type="image/png">

    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-PNQ6bRA5/RB2qJdTvETZtB+fv7fZ2lSZJjpeLvkaTK3U7v11Zy9w1DpSII8TgkYX5YHGoUqA/FVeCr+ikLSWYQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .no-result {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            color: #721c24;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .no-result i {
            margin-right: 10px;
            color: #721c24;
            font-size: 24px;
        }
    </style>
    <script src="js/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });
    </script>

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
</head>

<body>
    <!-- Bagian Header -->
    <div class="full">
        <div class="menu">
            <ul>
                <li><a href="index.php">
                        <div class="hm"><i class="home1"></i><i class="home2"></i></div>
                    </a></li>
                <li><a class="active" href="videos.php">
                        <div class="video"><i class="videos"></i><i class="videos1"></i></div>
                    </a></li>
                <li><a href="reviews.php">
                        <div class="cat"><i class="watching"></i><i class="watching1"></i></div>
                    </a></li>
                <li><a href="contact.php">
                        <div class="cnt"><i class="contact"></i><i class="contact1"></i></div>
                    </a></li>
            </ul>
        </div>

        <!-- Konten Utama -->
        <div class="main">
            <div class="video-content">
                <!-- Bagian Header Atas -->
                <div class="top-header span_top">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img height="55px" src="images/logo3.png" alt="" /></a>
                        <p>Nonton Gratis <br>Tanpa Karcis</p>
                    </div>
                    <!-- Form Pencarian -->
                    <div class="search v-search">
                        <form action="hasil_pencarian.php" method="GET">
                            <input type="text" name="query" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}" />
                            <input type="submit" value="">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- Konten Kanan -->
                <div class="right-content">
                    <div class="right-content-heading">
                        <div class="right-content-heading-left">
                            <h3 class="head">Hasil Pencarian..</h3>
                        </div>
                    </div>

                    <!-- Gaya Kotak Pop-up -->
                    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

                    <?php
                    include '../admin/koneksi.php';

                    // Jumlah item per halaman
                    $itemsPerPage = 12;

                    if (isset($_GET['query'])) {
                        $search_query = $_GET['query'];

                        // Menghitung total jumlah data hasil pencarian
                        $resultCountQuery = mysqli_prepare($koneksi, "SELECT COUNT(*) FROM buku WHERE judul LIKE ?");
                        mysqli_stmt_bind_param($resultCountQuery, "s", $search_query);
                        mysqli_stmt_execute($resultCountQuery);
                        $resultCount = mysqli_fetch_row(mysqli_stmt_get_result($resultCountQuery))[0];

                        // Menghitung total halaman
                        $totalPages = ceil($resultCount / $itemsPerPage);

                        // Mendapatkan nomor halaman saat ini dari URL, default ke 1 jika tidak diatur
                        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

                        // Menghitung nomor awal LIMIT SQL untuk hasil pada halaman saat ini
                        $offset = ($currentPage - 1) * $itemsPerPage;

                        // Query untuk mengambil data hasil pencarian untuk halaman saat ini
                        $query = mysqli_prepare($koneksi, "SELECT * FROM buku WHERE judul LIKE ? LIMIT $offset, $itemsPerPage");
                        mysqli_stmt_bind_param($query, "s", $search_query);
                        mysqli_stmt_execute($query);
                        $result = mysqli_stmt_get_result($query);

                        // Tampilkan hasil pencarian
                        if (mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_array($result)) :
                                // Grid Konten
                                echo '<div class="content-grids">';
                                echo '<div class="content-grid">';
                                echo '<a class="play-icon popup-with-zoom-anim" href="single.php?id=' . $data['isbn'] . '"><img src="http://localhost/digi-book/admin/foto/' . $data['photo'] . '" title="album-name" /></a>';
                                echo '<h3><b>' . $data['judul'] . '</b></h3>';
                                echo '<ul>';
                                echo '<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>';
                                echo '<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>';
                                echo '<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>';
                                echo '</ul>';
                                echo '<a href="single.php?id=' . $data['isbn'] . '" class="button play-icon text-center">Lihat Lebih Banyak</a>';
                                echo '</div>';
                                echo '<div id="small-dialog" class="mfp-hide"></div>';
                                echo '</div>';
                            endwhile;

                            // Pagination
                            echo '<div class="clearfix"></div>';
                            echo '<div class="pagenation">';
                            echo '<ul>';
                            for ($i = 1; $i <= $totalPages; $i++) {
                                if ($i == $currentPage) {
                                    echo "<li><a href='hasil_pencarian.php?query=$search_query&page=$i' class='active'>$i</a></li>";
                                } else {
                                    echo "<li><a href='hasil_pencarian.php?query=$search_query&page=$i'>$i</a></li>";
                                }
                            }
                            echo '</ul>';
                            echo '</div>';
                        } else {
                            echo '<div class="no-result">';
                            echo '<i class="fas fa-exclamation-circle"></i>';
                            echo '<p>Maaf, tidak ditemukan buku dengan judul yang sesuai.</p>';
                            echo '</div>';
                        }

                        // Tutup prepared statements
                        mysqli_stmt_close($resultCountQuery);
                        mysqli_stmt_close($query);
                    } else {
                        echo "Tidak ada hasil pencarian.";
                    }
                    ?>

                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <h6>Disclaimer : </h6>
                <p class="claim">InsaFilm adalah layanan streaming yang menawarkan berbagai acara TV pemenang penghargaan, film, anime, dokumenter, dan banyak lagi di ribuan perangkat yang terhubung ke Internet.</p>
                <a href="mailto:indrasaepudin212@mail.com">indrasaepudin212@mail.com</a>
                <div class="copyright">
                    <p>&copy; 2022 <a href="#">InsaFilm|IndraSaepudin</a></p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</body>

</html>