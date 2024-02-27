<!DOCTYPE html>
<html>

<head>
	<title> Insabuku | Nonton Gratis Tanpa Karcis</title>
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
	<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
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
				<!-- <li><a href="404.php"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li> -->
				<li><a href="contact.php">
						<div class="cnt"><i class="contact"></i><i class="contact1"></i></div>
					</a></li>
			</ul>
		</div>
		<div class="main">
			<div class="single-content">
				<div class="top-header span_top">
					<div class="logo">
						<a href="index.html"><img height="55px" src="images/logo3.png" alt="" /></a>
						<p>Nonton Gratis <br>Tanpa Karcis</p>
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
					<h3 class="head">Ulasan buku</h3>
					<div class="col-md-9 reviews-grids">
						<?php
						include '../admin/koneksi.php';
						if (isset($_GET['id'])) {
							if ($_GET['id'] != "") {

								$id = $_GET['id'];

								$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE isbn='$id'");
								$data = mysqli_fetch_array($query);
							} else {
								header("location:index.php");
							}
						} else {
							header("location:index.php");
						}

						?>
						<div class="review">
							<div class="movie-pic">
								<a href="single.html"><img src="http://localhost/digi-book/admin/foto/<?php echo $data['photo']; ?>" alt="" /></a>
								<a class="button play-icon popup-with-zoom-anim text-center" href="javascript:void(0);" onclick="downloadBuku('<?php echo $data['link']; ?>')">Unduh Buku</a>
							</div>

							<script>
								function downloadBuku(link) {
									var a = document.createElement('a');
									a.href = "http://localhost/digi-book/admin/buku/" + link;
									a.download = "nama-file-buku.pdf"; // Ganti dengan nama file yang sesuai
									document.body.appendChild(a);
									a.click();
									document.body.removeChild(a);
								}
							</script>

							<div class="review-info">
								<a class="span" href="single.html"><?php echo $data['judul']; ?></a>
								<p class="dirctr"><a href=""><?php echo $data['penulis']; ?>, <?php echo $data['bahasa']; ?>, </a><?php echo $data['tanggal_terbit']; ?></p>
								<p class="info"><b>ISBN:</b>&nbsp;&nbsp;<?php echo $data['isbn']; ?></p>
								<p class="info"><b>JUDUL:</b>&nbsp;&nbsp;<?php echo $data['judul']; ?></p>
								<p class="info"><b>PENERBIT:</b>&nbsp;&nbsp;<?php echo $data['penerbit']; ?></p>
								<p class="info"><b>PENULIS:</b>&nbsp;&nbsp;<?php echo $data['penulis']; ?></p>
								<p class="info"><b>GENDRE:</b>&nbsp;&nbsp;<?php echo $data['gendre']; ?></p>
								<p class="info"><b>TANGGAL TERBIT:</b>&nbsp;&nbsp;<?php echo $data['tanggal_terbit']; ?></p>
								<p class="info"><b>HALAMAN:</b>&nbsp;&nbsp;<?php echo $data['jumlah_halaman']; ?></p>
								<p class="info"><b>BAHASA:</b>&nbsp;&nbsp;<?php echo $data['bahasa']; ?></p>
								<p class="info"><b>KATEGORI:</b>&nbsp;&nbsp;<?php echo $data['kategori']; ?></p>


							</div>
							<div id="small-dialog" class="mfp-hide">
								<embed src="<?php echo $data['link']; ?>" type="application/pdf" width="100%" height="600px" />
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="best-review">
							<h4>SYNOPSIS :</h4>
							<p><?php echo $data['synopsis']; ?></p>
							<!-- <p><span><?php echo $data['penulis']; ?></span> -->
							<!-- <?php echo $data['tanggal_terbit']; ?> at <?php echo $data['jumlah_halaman']; ?> AM </p> -->
						</div>
						<div class="story-review">
							<h4>Review Book :</h4>
							<iframe src="http://localhost/digi-book/admin/buku/<?php echo $data['link']; ?>" width="100%" height="600px" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-md-3 side-bar">
						<div class="featured">
							<h3>Displaying Latest Books</h3>
							<ul>
								<?php
								include '../admin/koneksi.php';
								$query = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY isbn DESC LIMIT 9");
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

<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
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

</html>