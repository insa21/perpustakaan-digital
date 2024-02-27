<?php
session_start();
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Sertakan file koneksi.php
include('koneksi.php');

// Selanjutnya, lanjutkan dengan penggunaan $koneksi
$query = "SELECT * FROM events";
$result = $koneksi->query($query);

// Inisialisasi array untuk menyimpan data event
$events = array();

// Periksa apakah query berhasil dijalankan
if ($result) {
    // Ambil data event satu per satu
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// Tangkap data event dalam bentuk JSON
$events_json = json_encode($events);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title> DigiBook | Kalender</title>
    <!-- Favicon -->
    <link rel="icon" href="../admin/backend/assets/img/brand/logo3.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../admin/backend/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../admin/backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="../admin/backend/assets/vendor/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="../admin/backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../admin/backend/assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body>
    <!-- Sidenav -->
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
                            <a class="nav-link active" href="calender.php">
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
        <div class="header header-dark bg-primary pb-6 content__title content__title--calendar">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6">
                            <h6 class="fullcalendar-title h2 text-white d-inline-block mb-0">Full calendar</h6>
                            <nav aria-label="breadcrumb" class="d-none d-lg-inline-block ml-lg-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Kalendar</a></li>
                                    <!-- <li class="breadcrumb-item" aria-current="page">Kalendar</li> -->
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
                            <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                                <i class="fas fa-angle-left"></i>
                            </a>
                            <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="month">Month</a>
                            <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicWeek">Week</a>
                            <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicDay">Day</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <!-- Fullcalendar -->
                    <div class="card card-calendar">
                        <!-- Card header -->
                        <div class="card-header">
                            <!-- Title -->
                            <h5 class="h3 mb-0">Calendar</h5>
                        </div>
                        <!-- Card body -->
                        <div class="card-body p-0">
                            <div class="calendar" data-toggle="calendar" id="calendar"></div>
                        </div>
                    </div>
                    <!-- Modal - Add new event -->
                    <!-- Script Utama -->
                    <?php
                    // Sertakan file koneksi
                    include 'koneksi.php';

                    // Query SQL untuk mengambil data dari tabel_event
                    $query = "SELECT * FROM events";
                    $result = $koneksi->query($query);
                    ?>

                    <!-- Bagian HTML dengan data dinamis dari database -->
                    <!-- Bagian HTML dengan data dinamis dari database -->

                    <!-- Modal - Menambah Event -->
                    <div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
                            <div class="modal-content">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form class="new-event--form">
                                        <div class="form-group">
                                            <label class="form-control-label">Event title</label>
                                            <input type="text" class="form-control form-control-alternative new-event--title" placeholder="Event Title">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="form-control-label d-block mb-3">Status color</label>
                                            <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                                                <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info" autocomplete="off" checked></label>
                                                <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning" autocomplete="off"></label>
                                                <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger" autocomplete="off"></label>
                                                <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success" autocomplete="off"></label>
                                                <label class="btn bg-default"><input type="radio" name="event-tag" value="bg-default" autocomplete="off"></label>
                                                <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary" autocomplete="off"></label>
                                            </div>
                                        </div>
                                        <input type="hidden" class="new-event--start" />
                                        <input type="hidden" class="new-event--end" />
                                    </form>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary new-event--add">Add event</button>
                                    <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    try {
                        // Query SQL untuk mengambil data dari tabel_event
                        $query = "SELECT * FROM tabel_event";
                        $result = $koneksi->query($query);

                        // Periksa apakah query berhasil dijalankan
                        if (!$result) {
                            throw new Exception("Error in query: " . $koneksi->error);
                        }

                        // Periksa apakah ada data yang ditemukan
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="modal fade" id="edit-event-' . $row["id"] . '" tabindex="-1" role="dialog" aria-labelledby="edit-event-label" aria-hidden="true">';
                                echo '<div class="modal-dialog modal-dialog-centered modal-secondary" role="document">';
                                echo '<div class="modal-content">';
                                echo '<div class="modal-body">';
                                echo '<form class="edit-event--form">';
                                echo '<input type="hidden" class="edit-event--id" name="edit-event--id" value="' . $row["id"] . '">';
                                echo '<div class="form-group">';
                                echo '<label class="form-control-label">Event title</label>';
                                echo '<input type="text" class="form-control form-control-alternative edit-event--title" placeholder="Event Title" value="' . $row["event_title"] . '">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label class="form-control-label d-block mb-3">Status color</label>';
                                echo '<div class="btn-group btn-group-toggle btn-group-colors event-tag mb-0" data-toggle="buttons">';

                                // Menentukan status color yang aktif sesuai dengan data dari database
                                $colors = ["bg-info", "bg-warning", "bg-danger", "bg-success", "bg-default", "bg-primary"];
                                foreach ($colors as $color) {
                                    $checked = ($row["color_status"] == $color) ? "checked" : "";
                                    echo '<label class="btn ' . $color . '"><input type="radio" name="event-tag" value="' . $color . '" autocomplete="off" ' . $checked . '></label>';
                                }

                                echo '</div>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label class="form-control-label">Description</label>';
                                echo '<textarea class="form-control form-control-alternative edit-event--description textarea-autosize" placeholder="Event Desctiption">' . $row["description"] . '</textarea>';
                                echo '<i class="form-group--bar"></i>';
                                echo '</div>';
                                echo '</form>';
                                echo '</div>';
                                echo '<div class="modal-footer">';
                                echo '<button class="btn btn-primary" data-calendar="update">Update</button>';
                                echo '<button class="btn btn-danger" data-calendar="delete">Delete</button>';
                                echo '<button class="btn btn-link ml-auto" data-dismiss="modal">Close</button>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo 'Tidak ada data ditemukan.';
                        }
                    } catch (Exception $e) {
                        echo 'Error: ' . $e->getMessage();
                    }

                    // Tutup koneksi database setelah selesai menggunakan
                    $koneksi->close();
                    ?>

                    <!-- Footer -->
                    <footer class="footer pt-0">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6">
                                <div class="copyright text-center text-lg-left text-muted">
                                    &copy; 2022 <a href="#" class="font-weight-bold ml-1" target="_blank">Indra Saepudin</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
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
                            </div>
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
            <script src="../admin/backend/assets/vendor/moment/min/moment.min.js"></script>
            <script src="../admin/backend/assets/vendor/fullcalendar/dist/fullcalendar.min.js"></script>
            <script src="../admin/backend/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
            <!-- Argon JS -->
            <script src="../admin/backend/assets/js/argon.js?v=1.1.0"></script>
            <!-- Demo JS - remove this in your project -->
            <script src="../admin/backend/assets/js/demo.min.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Menambahkan event listener untuk tombol "Add Event" pada modal tambah event
                    document.querySelector('.new-event--add').addEventListener('click', function() {
                        var title = document.querySelector('.new-event--title').value;
                        var color = document.querySelector('.btn-group-colors input:checked').value;
                        var startDate = document.querySelector('.new-event--start').value;
                        var endDate = document.querySelector('.new-event--end').value;

                        // Mengirim data ke server atau database menggunakan AJAX
                        $.ajax({
                            url: 'simpan_ke_database.php',
                            type: 'POST',
                            data: {
                                title: title,
                                color: color,
                                startDate: startDate,
                                endDate: endDate
                            },
                            success: function(response) {
                                // Handle respon dari server jika diperlukan
                                console.log('Data berhasil disimpan ke database');
                            },
                            error: function(error) {
                                // Handle kesalahan jika diperlukan
                                console.error('Terjadi kesalahan saat menyimpan data ke database');
                            }
                        });
                    });

                    $(document).ready(function() {
                        $(".edit-event--form").submit(function(event) {
                            event.preventDefault(); // Prevent the form from submitting via the browser

                            var formData = {
                                id: $(".edit-event--id").val(),
                                title: $(".edit-event--title").val(),
                                description: $(".edit-event--description").val(),
                                statusColor: $('input[name="event-tag"]:checked').val()
                            };

                            $.ajax({
                                type: "POST",
                                url: "update_event.php", // replace with your endpoint
                                data: formData,
                                success: function(data) {
                                    console.log('Submission was successful.');
                                    console.log(data);
                                },
                                error: function(data) {
                                    console.log('An error occurred.');
                                    console.log(data);
                                },
                            });
                        });
                    });

                });
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Inisialisasi FullCalendar
                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        defaultView: 'month',
                        editable: true, // Aktifkan fitur pengeditan

                        // Ambil data event dari variabel JSON
                        events: <?php echo $events_json; ?>
                    });
                });
            </script>

</body>

</html>