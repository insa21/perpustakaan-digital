<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Mulai pengembangan Anda dengan Dashboard untuk Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>DigiBook | Lihat Data Buku</title>
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
              <a class="nav-link" href="insert.php">
                <i class="ni ni-books text-orange"></i>
                <span class="nav-link-text">Tambah Buku</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="lihat_data.php">
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
              <!-- <h6 class="h2 text-white d-inline-block mb-0">Default</h6> -->
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Lihat Data Buku</a></li>
                  <!-- <li class="breadcrumb-item active" aria-current="page">Lihat Data Buku</li> -->
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

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0">Semua Buku</h3>
            </div>

            <?php if (isset($_GET['pesan'])) { ?>
              <?php if ($_GET['pesan'] == "berhasil") { ?>
                <?php echo "<script>"; ?>
                <?php echo 'setTimeout(function () { swal("Success!","Berhasil Mengupdate Data Buku!","success");'; ?>
                <?php echo '}, 100);</script>'; ?>
              <?php } elseif ($_GET['pesan'] == "gagal") { ?>
                <?php echo "<script>"; ?>
                <?php echo 'setTimeout(function () { swal("Error!","Gagal Mengupdate Data Buku!","error");'; ?>
                <?php echo '}, 100);</script>'; ?>
              <?php } elseif ($_GET['pesan'] == "hapus") { ?>
                <?php echo "<script>"; ?>
                <?php echo 'setTimeout(function () { swal("success!","Data Berhasil Dihapus!","success");'; ?>
                <?php echo '}, 100);</script>'; ?>
              <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
                <?php echo "<script>"; ?>
                <?php echo 'setTimeout(function () { swal("Error!","Gagal Menghapus Data Buku!","error");'; ?>
                <?php echo '}, 100);</script>'; ?>
              <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
                <?php echo "<script>"; ?>
                <?php echo 'setTimeout(function () { swal("Warning!","Ekstensi File Harus PNG Dan JPG!","warning");'; ?>
                <?php echo '}, 100);</script>'; ?>
              <?php } elseif ($_GET['pesan'] == "size") { ?>
                <?php echo "<script>"; ?>
                <?php echo 'setTimeout(function () { swal("Warning!","	Size File Tidak Boleh Lebih Dari 2 MB!","warning");'; ?>
                <?php echo '}, 100);</script>'; ?>
              <?php } ?>
            <?php } ?>

            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th style="width:150px;">Action</th>
                    <th>#</th>
                    <th>ISBN</th>
                    <th>Photo</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Kategori</th>
                    <th>Gendre</th>
                    <th>Bahasa</th>
                    <th>Synopsis</th>
                    <th>Link</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th style="width:150px;">Action</th>
                    <th>#</th>
                    <th>ISBN</th>
                    <th>Photo</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tanggal Terbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Kategori</th>
                    <th>Gendre</th>
                    <th>Bahasa</th>
                    <th>Synopsis</th>
                    <th>Link</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  include 'koneksi.php';

                  $no = 1;
                  $get_data = mysqli_query($koneksi, "SELECT * FROM buku");
                  while ($data = mysqli_fetch_array($get_data)) {
                  ?>
                    <tr>
                      <td>
                        <a href="edit.php?isbn=<?php echo $data['isbn'] ?>" class="btn btn-warning text-white ">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.5-.5V9.207l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                          </svg>
                        </a>
                        <a href="delete.php?isbn=<?php echo $data['isbn'] ?>" class="btn btn-danger">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                          </svg>
                        </a>
                      </td>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['isbn']; ?></td>
                      <td>
                        <?php
                        if ($data['photo'] == "") { ?>
                          <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+Buku" style="width:100px;height:100px;">
                        <?php } else { ?>
                          <img src="foto/<?php echo $data['photo']; ?>" style="width:100px;height:100px;">
                        <?php } ?>
                      </td>
                      <td><?php echo $data['judul']; ?></td>
                      <td><?php echo $data['penulis']; ?></td>
                      <td><?php echo $data['penerbit']; ?></td>
                      <td><?php echo $data['tanggal_terbit']; ?></td>
                      <td><?php echo $data['jumlah_halaman']; ?></td>
                      <td><?php echo $data['kategori']; ?></td>
                      <td><?php echo $data['gendre']; ?></td>
                      <td><?php echo $data['bahasa']; ?></td>
                      <td><?php echo $data['synopsis']; ?></td>
                      <td><?php echo $data['link']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <?php
      include 'komponen/footer.php';
      ?>
    </div>