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
    <title>DigiBook | Tambah Data Buku</title>
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
                            <a class="nav-link" href="index.php">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="insert.php">
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

        <?php if (isset($_GET['pesan'])) { ?>
            <?php if ($_GET['pesan'] == "berhasil") {
                echo "<script>";
                echo 'setTimeout(function () { swal("Success!","Berhasil Menambahkan Data Buku!","success");';
                echo '}, 100);
        </script>';
            ?>
            <?php } elseif ($_GET['pesan'] == "gagal") {
                echo "<script>";
                echo 'setTimeout(function () { swal("Error!","Gagal Menambahkan Data Buku!","error");';
                echo '}, 100);
        </script>';
            ?>
            <?php } elseif ($_GET['pesan'] == "ekstensi") {
                echo "<script>";
                echo 'setTimeout(function () { swal("Warning!","Ekstensi File Harus PNG Dan JPG!","warning");';
                echo '}, 100);
        </script>';
            ?>
            <?php } elseif ($_GET['pesan'] == "size") {
                echo "<script>";
                echo 'setTimeout(function () { swal("Warning!","	Size File Tidak Boleh Lebih Dari 2 MB!","warning");';
                echo '}, 100);
        </script>';
            ?>

            <?php } ?>
        <?php } ?>



        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-cMasukan py-4">
                        <div class="col-lg-6 col-7">
                            <!-- <h6 class="h2 text-white d-inline-block mb-0">Default</h6> -->
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Tambah Data Buku</a></li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Tambah Data Buku</li> -->
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-stats">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card-wrapper">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">Tambah Data Buku</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                    </div>
                                </div>
                                <form action="insert_act.php" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-4">
                                            <div class="form-input">
                                                <div class="preview">
                                                    <img id="file-ip-1-preview">
                                                </div>
                                                <label for="file-ip-1">Upload Image</label>
                                                <input type="file" id="file-ip-1" accept="image/*" name="photo" onchange="showPreview(event);">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-control-label" for="isbn"> ISBN :</label>
                                            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukan ISBN" value="" required>
                                            <br>
                                            <label class="form-control-label" for="judul"> Judul Buku</label>
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Buku" value="" required>
                                            <br>
                                            <label class="form-control-label" for="penerbit"> Penerbit :</label>
                                            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukan penerbit" value="" required>
                                            <br>
                                            <label class="form-control-label" for="bahasa"> Bahasa :</label>
                                            <input type="text" class="form-control" id="bahasa" name="bahasa" placeholder="Masukan Bahasa" value="" required>
                                            <br>
                                            <label class="form-control-label" for="link">Pilih File:</label>
                                            <input type="file" class="form-control" id="link" name="link" accept=".pdf, .doc, .docx" required>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label class="form-control-label" for="tanggal_terbit"> Tanggal Terbit :</label>
                                            <input class="form-control datepicker" value="mm-dd-yyyy" id="tanggal_terbit" name="tanggal_terbit" placeholder="Select date" required>
                                            <br>
                                            <div class="card">
                                                <div class="card-header">
                                                    <label class="form-control-label" for="kategori"> Kategori :</label>
                                                </div>
                                                <div class="card-body">
                                                    <?php
                                                    $kategoriBuku = array("Sejarah", "Fiksi", "Sains", "Novel", "Komik", "Biografi", "Teknologi", "Pendidikan", "Kesehatan", "Lain-lain");

                                                    foreach ($kategoriBuku as $kategori) {
                                                    ?>
                                                        <div class="custom-control custom-radio">
                                                            <input class="custom-control-input" id="<?= strtolower($kategori) ?>" value="<?= strtolower($kategori) ?>" name="kategori" type="radio">
                                                            <label class="custom-control-label" for="<?= strtolower($kategori) ?>"><?= $kategori ?></label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label class="form-control-label" for="jumlah_halaman"> Jumlah Halaman :</label>
                                            <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" placeholder="Masukan Jumlah Halaman" value="" required>
                                            <br>
                                            <div class="card">
                                                <div class="card-header">
                                                    <label class="form-control-label" for="gendre"> gendre :</label>
                                                </div>
                                                <div class="card-body">
                                                    <?php
                                                    $gendreBuku = array("Fantasi", "Misteri", "Romansa", "Sains Fiksi", "Petualangan", "Aksi", "Horor", "Drama", "Thriller", "Komedi");

                                                    foreach ($gendreBuku as $gendre) {
                                                    ?>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="<?= strtolower($gendre) ?>" value="<?= strtolower($gendre) ?>" name="gendre[]" type="checkbox">
                                                            <label class="custom-control-label" for="<?= strtolower($gendre) ?>"><?= $gendre ?></label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label class="form-control-label" for="penulis"> Penulis :</label>
                                                </div>
                                                <div class="card-body">
                                                    <form>
                                                        <input type="text" id="penulis" class="form-control" name="penulis" value="" data-toggle="tags" required />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label class="form-control-label" for="synopsis"> Synopsis :</label>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="synopsis" id="synopsis" rows="4" placeholder="Masukan Synopsis" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-right">
                                            <button class="btn btn-primary" type="submit" name="submit">
                                                <i class="fas fa-plus"></i> Tambah Data
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            // Include footer component
            include 'komponen/footer.php';
            ?>

            <style>
                .form-input {
                    width: 100%;
                    /* Lebar formulir 100% dari lebar tata letak induk */
                    max-width: 400px;
                    /* Lebar maksimum formulir */
                    margin: 0 auto;
                    /* Pusatkan formulir di tengah */
                    padding: 20px;
                    background: #fff;
                    box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                        3px 3px 7px rgba(94, 104, 121, 0.377);
                }

                .form-input input {
                    display: none;
                }

                .form-input label {
                    display: block;
                    width: 100%;
                    /* Lebar label 100% dari lebar formulir */
                    height: 45px;
                    line-height: 45px;
                    /* Sesuaikan line-height agar label dan input sejajar */
                    text-align: center;
                    background: #1172c2;
                    color: #fff;
                    font-size: 15px;
                    font-family: "Open Sans", sans-serif;
                    text-transform: uppercase;
                    font-weight: 600;
                    border-radius: 5px;
                    cursor: pointer;
                }

                .form-input img {
                    width: 100%;
                    display: none;
                    margin-bottom: 30px;
                }

                @media screen and (max-width: 600px) {

                    /* Gaya CSS untuk layar dengan lebar maksimum 600px */
                    .form-input label {
                        width: 100%;
                        /* Sesuaikan lebar label agar mencakup seluruh lebar */
                        margin-left: 0;
                        /* Reset margin-left */
                    }
                }
            </style>


            <!-- Optional JS -->
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>

            <script type="text/javascript">
                // Function to show image preview
                function showPreview(event) {
                    if (event.target.files.length > 0) {
                        var src = URL.createObjectURL(event.target.files[0]);
                        var preview = document.getElementById("file-ip-1-preview");
                        preview.src = src;
                        preview.style.display = "block";
                    }
                }
            </script>