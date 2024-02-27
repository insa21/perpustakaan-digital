<!DOCTYPE html>
<html>

<head>
	<title> InsaFilm | Nonton Gratis Tanpa Karcis</title>
	<!-- icon -->
	<link rel="icon" href="images/logo3.png" type="image/png">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--webfont-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- header-section-starts -->
	<div class="full">
		<?php
		include '../admin/koneksi.php';
		$query = mysqli_query($koneksi, "SELECT * FROM buku");
		while ($data = mysqli_fetch_array($query)) {
		?>
			<div class="menu">
				<ul>
					<li><a href="index.php">
							<div class="hm"><i class="home1"></i><i class="home2"></i></div>
						</a></li>
					<li><a href="videos.php">
							<div class="video"><i class="videos"></i><i class="videos1"></i></div>
						</a></li>
					<li><a class="active" href="reviews.php">
							<div class="cat"><i class="watching"></i><i class="watching1"></i></div>
						</a></li>
					<!-- <li><a href="404.php"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li> -->
					<li><a href="contact.php">
							<div class="cnt"><i class="contact"></i><i class="contact1"></i></div>
						</a></li>
				</ul>
			</div>
		<?php } ?>
		<div class="main">
			<div class="review-content">
				<div class="top-header span_top">
					<div class="logo">
						<a href="index.html"><img src="images/logo.png" alt="" /></a>
						<p>Movie Theater</p>
					</div>
					<div class="search v-search">
						<form action="hasil_pencarian.php" method="GET">
							<input type="text" name="query" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}" />
							<input type="submit" value="">
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="reviews-section">
					<!-- <h3 class="head">Books Reviews</h3> -->
					<div class="col-md-9 reviews-grids">
						<!-- Datanya ambil dari database -->
						<h3 class="head">Books Reviews</h3>
						<div class="dropdown-button">
							<select class="dropdown" id="kategoriDropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
								<option value="semua" selected>Semua Kategori</option>
								<option value="sejarah">Sejarah</option>
								<option value="fiksi">Fiksi</option>
								<option value="sains">Sains</option>
								<option value="novel">Novel</option>
								<option value="komik">Komik</option>
								<option value="biografi">Biografi</option>
								<option value="teknologi">Teknologi</option>
								<option value="pendidikan">Pendidikan</option>
								<option value="kesehatan">Kesehatan</option>
								<option value="lain-lain">Lain-lain</option>
							</select>
						</div>
						<br>
						<!-- Hasil pencarian dari database js ajax filenya dari kategori_pencarian.php -->
						<div id="hasil-pencarian"></div>

					</div>
					<div class="col-md-3 side-bar">
						<div class="featured">
							<h3>Displaying Latest Books</h3>
							<ul>
								<?php
								include '../admin/koneksi.php';
								$query = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY isbn DESC LIMIT 9 ");
								while ($data = mysqli_fetch_array($query)) {
								?>
									<li>
										<a href="single.php?id=<?php echo $data['isbn'] ?>"><img src="http://localhost/digi-book/admin/foto/<?php echo $data['photo']; ?>" alt="" /></a>
										<p> <?= $data['judul'] ?> </p>
									</li>
									<div class="clearfix"> <?php } ?>
									</div>
							</ul>
						</div>

						<div class="entertainment">
							<h3>Recommended Books</h3>
							<?php
							include '../admin/koneksi.php';

							// Ambil data dari database
							$query = mysqli_query($koneksi, "SELECT * FROM buku");
							$dataBuku = mysqli_fetch_all($query, MYSQLI_ASSOC);

							// Acak urutan data
							shuffle($dataBuku);

							// Ambil lima data teratas setelah diacak
							$limaBukuAcak = array_slice($dataBuku, 0, 5);

							// Tampilkan data
							foreach ($limaBukuAcak as $data) {
							?>
								<ul>
									<li class="ent">
										<a href="single.php?id=<?php echo $data['isbn'] ?>"><img src="http://localhost/digi-book/admin/foto/<?php echo $data['photo']; ?>" alt="" /></a>
									</li>
									<li>
										<a href="single.php?id=<?php echo $data['isbn'] ?>"> <b><?= $data['judul'] ?></b> </a>
									</li>
									<li>
										<p><?= $data['tanggal_terbit'] ?></< /p>
										<p><?= $data['gendre'] ?></< /p>
										<p><?= $data['penulis'] ?></< /p>
									</li>
									<div class="clearfix"></div>
								</ul>
							<?php } ?>
						</div>
						<div class="might">
							<h4>You Might Also Like</h4>
							<div class="might-grid">
								<?php
								include '../admin/koneksi.php';

								// Ambil data dari database
								$queryMight = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY RAND() LIMIT 5");
								$dataMight = mysqli_fetch_all($queryMight, MYSQLI_ASSOC);

								// Tampilkan data
								foreach ($dataMight as $bukuMight) {
								?>
									<div class="grid-might">
										<a href="single.php?id=<?php echo $bukuMight['isbn'] ?>"><img src="http://localhost/digi-book/admin/foto/<?php echo $bukuMight['photo']; ?>" class="img-responsive" alt=""></a>
									</div>
									<div class="might-top">
										<p><?php echo $bukuMight['judul']; ?></p>
										<p href="single.php?id=<?php echo $bukuMight['isbn'] ?>"><?php echo $bukuMight['synopsis']; ?> <i> </i></p>
									</div>
									<div class="clearfix"></div>
								<?php } ?>
							</div>
						</div>


					</div>

					<div class="clearfix"></div>
				</div>
			</div>
			<div class="review-slider">
				<ul id="flexiselDemo1">
					<li><img src="images/r1.jpg" alt="" /></li>
					<li><img src="images/r2.jpg" alt="" /></li>
					<li><img src="images/r3.jpg" alt="" /></li>
					<li><img src="images/r4.jpg" alt="" /></li>
					<li><img src="images/r5.jpg" alt="" /></li>
					<li><img src="images/r6.jpg" alt="" /></li>
				</ul>
				<script type="text/javascript">
					$(window).load(function() {

						$("#flexiselDemo1").flexisel({
							visibleItems: 6,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,
							pauseOnHover: false,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: {
								portrait: {
									changePoint: 480,
									visibleItems: 2
								},
								landscape: {
									changePoint: 640,
									visibleItems: 3
								},
								tablet: {
									changePoint: 768,
									visibleItems: 3
								}
							}
						});
					});
				</script>
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
			<div class="footer">
				<h6>Disclaimer : </h6>
				<p class="claim">This is a freebies and not an official website, I have no intention of disclose any
					movie, brand, news.My goal here is to train or excercise my skill and share this freebies.</p>
				<a href="example@mail.com">example@mail.com</a>
				<div class="copyright">
					<p> Template by <a href="http://w3layouts.com"> W3layouts</a></p>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</body>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var dropdown = document.getElementById('kategoriDropdown');
		var hasilPencarianDiv = document.getElementById('hasil-pencarian');

		// Set nilai dropdown ke "semua" saat halaman dimuat
		dropdown.value = 'semua';

		// Kirim permintaan pencarian secara otomatis saat halaman dimuat
		var kategori = dropdown.value;
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'kategori_pencarian.php', true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onload = function() {
			if (xhr.status === 200) {
				hasilPencarianDiv.innerHTML = xhr.responseText;
			} else {
				console.error('Error:', xhr.statusText);
			}
		};

		xhr.send('kategori=' + encodeURIComponent(kategori));

		// Tambahkan event listener untuk menghandle perubahan dropdown
		dropdown.addEventListener('change', function() {
			var kategori = dropdown.value;

			if (kategori !== '0') {
				var xhr = new XMLHttpRequest();
				xhr.open('POST', 'kategori_pencarian.php', true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

				xhr.onload = function() {
					if (xhr.status === 200) {
						hasilPencarianDiv.innerHTML = xhr.responseText;
					} else {
						console.error('Error:', xhr.statusText);
					}
				};

				xhr.send('kategori=' + encodeURIComponent(kategori));
			} else {
				hasilPencarianDiv.innerHTML = '';
			}
		});
	});
</script>


</html>