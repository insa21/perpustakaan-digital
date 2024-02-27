<?php
session_start();
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}
?>

<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mulai pengembangan Anda dengan Dashboard untuk Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>InsaBuku | Nonton Gratis Tanpa Karcis</title>
    <link rel="icon" href="backend/assets/img/brand/logo3.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="backend/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="backend/assets/css/argon.css?v=1.1.0" type="text/css">
    <link rel="stylesheet" href="backend/assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/assets/vendor/animate.css/animate.min.css">
    <link rel="stylesheet" href="backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <style>
        .completed-task {
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="backend/assets/img/brand/logo3.png" width="100%" height="100%" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="insert.php">
                                <i class="ni ni-books text-orange"></i>
                                <span class="nav-link-text">Tambah Buku</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="lihat_data.php">
                                <i class="ni ni-bullet-list-67 text-info"></i>
                                <span class="nav-link-text">Lihat Data Buku</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="calender.php">
                                <i class="ni ni-calendar-grid-58 text-red"></i>
                                <span class="nav-link-text">Kalendar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                        </li>

                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="../admin/backend/assets/img/theme/team-4.jpg">
                                    </span>
                                    <?php
                                    // Kode untuk mengambil nama admin dari database
                                    include 'koneksi.php';

                                    $query = "SELECT nama FROM login WHERE id = 1"; // Mengambil nama admin dengan ID 1
                                    $result = mysqli_query($koneksi, $query);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $nama_admin = $row['nama'];
                                    } else {
                                        $nama_admin = "Admin"; // Jika ada kesalahan, gunakan nilai default
                                    }
                                    ?>

                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm font-weight-bold"><?php echo $nama_admin; ?></span>
                                    </div>

                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <!-- <a href="#!" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span> -->
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a>
                                <!-- <a href="#!" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Home</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Home</li> -->
                                </ol>
                            </nav>
                        </div>
                        <!-- <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">New</a>
                            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                        </div> -->
                    </div>
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Buku</h5>
                                            <?php
                                            include 'koneksi.php';
                                            $get_data = mysqli_query($koneksi, "SELECT * FROM buku");
                                            $jumlah_buku = mysqli_num_rows($get_data);
                                            ?>
                                            <span class="h2 font-weight-bold mb-0"> <?php echo $jumlah_buku; ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                <i class="fas fa-book"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>
                                            <?php
                                            include 'koneksi.php';

                                            // Menghitung jumlah buku yang diimputkan dalam satu minggu terakhir
                                            $query = "SELECT COUNT(*) AS jumlah_buku FROM buku WHERE created_at >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                                            $result = $koneksi->query($query);

                                            if ($result) {
                                                $row = $result->fetch_assoc();
                                                $jumlah_buku_minggu_ini = $row['jumlah_buku'];
                                                echo $jumlah_buku_minggu_ini;
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </span>
                                        <span class="text-nowrap">Minggu ini</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Kategori</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                <?php
                                                include 'koneksi.php';

                                                // Query untuk menghitung jumlah kategori
                                                $query = "SELECT COUNT(DISTINCT kategori) AS jumlah_kategori FROM buku";
                                                $result = $koneksi->query($query);

                                                if ($result) {
                                                    $row = $result->fetch_assoc();
                                                    $jumlah_kategori = $row['jumlah_kategori'];
                                                    echo $jumlah_kategori;
                                                } else {
                                                    echo "0";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                <i class="ni ni-chart-pie-35"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>
                                            <?php
                                            include 'koneksi.php';

                                            // Query untuk menghitung jumlah kategori sejak bulan lalu
                                            $query = "SELECT COUNT(DISTINCT kategori) AS jumlah_kategori FROM buku WHERE isbn >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
                                            $result = $koneksi->query($query);

                                            if ($result) {
                                                $row = $result->fetch_assoc();
                                                $jumlah_kategori_bulan_lalu = $row['jumlah_kategori'];
                                                echo $jumlah_kategori_bulan_lalu;
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </span>
                                        <span class="text-nowrap">Sejak bulan lalu</span>
                                    </p>

                                </div>

                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Total Acara</h5>
                                            <span class="h2 font-weight-bold mb-0">
                                                <?php
                                                include 'koneksi.php';

                                                // Query untuk menghitung jumlah acara yang belum selesai
                                                $query = "SELECT COUNT(*) AS jumlah_acara FROM events WHERE completed = 0";
                                                $result = $koneksi->query($query);

                                                if ($result) {
                                                    $row = $result->fetch_assoc();
                                                    $jumlah_acara = $row['jumlah_acara'];
                                                    echo $jumlah_acara;
                                                } else {
                                                    echo "0";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                                <i class="ni ni-calendar-grid-58"></i> <!-- Ubah icon sesuai kebutuhan -->
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                                            <?php
                                            include 'koneksi.php';

                                            // Query untuk menghitung jumlah acara yang belum selesai pada hari ini
                                            $today = date("Y-m-d"); // Mendapatkan tanggal hari ini
                                            $query = "SELECT COUNT(*) AS jumlah_acara FROM events WHERE completed = 0 AND DATE(start_date) = '$today'";
                                            $result = $koneksi->query($query);

                                            if ($result) {
                                                $row = $result->fetch_assoc();
                                                $jumlah_acara_hari_ini = $row['jumlah_acara'];
                                                echo $jumlah_acara_hari_ini;
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </span>
                                        <span class="text-nowrap">Hari ini</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Pengguna</h5>
                                            <?php
                                            include 'koneksi.php';

                                            // Mengambil jumlah pengguna dari database
                                            $query = "SELECT COUNT(*) AS jumlah_pengguna FROM login";
                                            $result = $koneksi->query($query);

                                            if ($result) {
                                                $row = $result->fetch_assoc();
                                                $jumlah_pengguna = $row['jumlah_pengguna'];
                                                echo '<span class="h2 font-weight-bold mb-0">' . $jumlah_pengguna . '</span>';
                                            } else {
                                                echo '<span class="h2 font-weight-bold mb-0">0</span>';
                                            }
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="ni ni-single-02"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <?php
                                        include 'koneksi.php';

                                        // Mendapatkan data dari database untuk hari ini
                                        $query = "SELECT * FROM login WHERE DATE(created_at) = CURDATE()";
                                        $result = $koneksi->query($query);

                                        if ($result) {
                                            $jumlah_user_hari_ini = $result->num_rows;
                                            echo '<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> ' . $jumlah_user_hari_ini . '</span>';
                                        } else {
                                            echo '<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 0</span>';
                                        }
                                        ?>

                                        <span class="text-nowrap">Hari ini</span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <?php
        include 'koneksi.php';
        $get_data = mysqli_query($koneksi, "SELECT * FROM buku");
        $jumlah_buku = mysqli_num_rows($get_data); ?>
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Buku Terbaru </h3>
                                    <!-- <h3 class="mb-0"></h3> -->
                                </div>
                                <!-- <div class="col text-right">
                                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ISBN</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Gendre</th>
                                        <th scope="col">Penerbit</th>
                                        <!-- <th scope="col">Kategori</th> -->
                                    </tr>
                                </thead>
                                <?php
                                include 'koneksi.php';
                                // $no = 1;
                                $get_data = mysqli_query($koneksi, "SELECT * FROM buku  ORDER BY isbn DESC LIMIT 8");
                                // $jumlahfilm = mysqli_num_rows($get_data);
                                while ($data = mysqli_fetch_array($get_data)) {
                                ?>
                                    <tbody>
                                        <td><?php echo $data['isbn']; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['penulis']; ?></td>
                                        <td><?php echo $data['gendre']; ?></td>
                                        <td><?php echo $data['penerbit']; ?></td>
                                        <!-- <td><?php echo $data['kategori'] ?></td> -->
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <!-- Title -->
                            <h5 class="h3 mb-0">To do list</h5>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-0">
                            <!-- List group -->
                            <ul class="list-group list-group-flush" data-toggle="checklist">
                                <?php
                                include 'koneksi.php';

                                $sql = "SELECT * FROM events WHERE completed = 0 LIMIT 5"; // Mengambil tugas yang belum dicentang
                                $result = $koneksi->query($sql);

                                // Definisikan variabel index di sini
                                $index = 1;

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Menghilangkan bagian "bg-" dari nilai warna
                                        $colorClass = str_replace('bg-', '', $row["color"]);
                                        // Tentukan kelas untuk efek strikethrough
                                        $completedClass = $row["completed"] == 1 ? 'completed-task' : '';
                                        echo '<li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">';
                                        echo '<div class="checklist-item checklist-item-' . $colorClass . '">';
                                        echo '<div class="checklist-info">';
                                        // Tambahkan kelas untuk efek strikethrough pada judul tugas
                                        echo '<h5 class="checklist-title mb-0 ' . $completedClass . '">' . $row["title"] . '</h5>';
                                        echo '<small>' . date("d-m-Y", strtotime($row["start_date"])) . '</small>';
                                        echo '</div>';
                                        echo '<div>';
                                        // Tampilkan deskripsi tugas
                                        echo '<p>' . $row["description"] . '</p>';
                                        // Buat ID yang unik untuk setiap checkbox
                                        $checkboxID = 'chk-todo-task-' . $index;
                                        echo '<div class="custom-control custom-checkbox custom-checkbox-' . $colorClass . ';">';
                                        echo '<input class="custom-control-input" id="' . $checkboxID . '" type="checkbox" ' . ($row["completed"] == 1 ? 'checked' : '') . ' onclick="updateCheckbox(' . $row["id"] . ', this.checked)">';
                                        echo '<label class="custom-control-label" for="' . $checkboxID . '"></label>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</li>';
                                        $index++;
                                    }
                                } else {
                                    echo "Tidak ada tugas yang belum selesai.";
                                }
                                $koneksi->close();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center text-lg-left text-muted">
                            &copy; <?php echo date("Y"); ?> <a href="" class="font-weight-bold ml-1" target="_blank">DigiBook</a> | Buku Digital
                        </div>
                    </div>

                    <!-- <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </footer>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../admin/backend/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../admin/backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../admin/backend/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../admin/backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../admin/backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js">
    </script>
    <!-- Optional JS -->
    <script src="../admin/backend/assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../admin/backend/assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="../admin/backend/assets/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="../admin/backend/assets/js/demo.min.js"></script>

    <script>
        function updateCheckbox(taskId, isChecked) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    // Tambahkan atau hapus kelas 'completed-task' berdasarkan nilai isChecked
                    var titleElement = document.querySelector('#task-title-' + taskId);
                    if (isChecked) {
                        titleElement.classList.add('completed-task');
                    } else {
                        titleElement.classList.remove('completed-task');
                    }
                }
            };
            xhttp.open("POST", "update_checkbox.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("task_id=" + taskId + "&checkbox_value=" + (isChecked ? 1 : 0));
        }
    </script>
</body>

</html>