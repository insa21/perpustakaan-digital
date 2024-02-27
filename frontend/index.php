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
		<div class="menu">
			<ul>
				<li><a class="active" href="index.php"><i class="home"></i></a></li>
				<li><a href="videos.php">
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
			<div class="header">
				<div class="top-header">
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
			</div>
			<div class="review-slider">
				<ul id="flexiselDemo1">

					<?php
					include '../admin/koneksi.php';
					$query = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY isbn DESC LIMIT 10");
					while ($data = mysqli_fetch_array($query)) {
					?>
						<li>
							<!-- <a href="single.php?id=<?= $data['isbn']; ?>"> -->
							<img src="http://localhost/digi-book/admin/foto/<?php echo $data['photo']; ?>" alt="" />
							<!-- </a> -->
						</li>
					<?php } ?>


					<!-- <li><img src="images/r1.jpg" alt="" /></li>
					<li><img src="images/r2.jpg" alt="" /></li>
					<li><img src="images/r3.jpg" alt="" /></li>
					<li><img src="images/r4.jpg" alt="" /></li>
					<li><img src="images/r5.jpg" alt="" /></li>
					<li><img src="images/r6.jpg" alt="" /></li>
				</ul> -->
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
										visibleItems: 4
									}
								}
							});
						});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
			<!-- <div class="video">
			<iframe  src="https://www.youtube.com/embed/7xidOWnzSu4" frameborder="0" allowfullscreen></iframe>
		</div> -->
			<div class="news">
				<div class="col-md-6 news-left-grid">
					<h3>Jangan Sampai Terlewatkan,</h3>
					<h2>Explorasi Dunia Literasi Digital Secara Gratis!</h2>
					<h4>Mudah, Cepat & Sederhana.</h4>
					<img src="images/9269778.png" alt="" srcset="" height="500px" width="500px">
				</div>
				<div class="col-md-6 news-right-grid">
					<h3>Mengenal Lebih Dekat</h3>
					<div class="news-grid">
						<h5>Apa itu Digi-Book?</h5>
						<label>01 Februari 2024</label>
						<p>Digi-Book adalah platform eksplorasi literasi digital yang menyediakan beragam buku, novel, komik, dan banyak lagi melalui ribuan perangkat yang terhubung ke Internet.</p>
						<p>Bacalah sepuasnya, kapan pun dan di mana pun, tanpa batasan - semuanya secara <b>GRATIS</b>. Koleksi buku baru terus ditambahkan untuk memberikan pengalaman membaca yang tak terbatas!</p>
					</div>
					<div class="news-grid">
						<h5>Di Mana Saya Bisa Membaca?</h5>
						<label>01 Februari 2024</label>
						<p>Nikmati literasi digital di manapun, kapan pun. Akses Digi-Book dari komputer pribadi atau perangkat yang mendukung aplikasi Digi-Book, termasuk smartphone, tablet, dan perangkat lainnya.</p>
						<p>Unduh buku favoritmu melalui aplikasi iOS, Android, atau Windows 10 untuk membaca tanpa koneksi internet. Bawa Digi-Book ke dalam genggamanmu, membaca jadi lebih fleksibel.</p>
					</div>
					<div class="news-grid">
						<h5 class="more">Keunggulan :</h5>
						<label>01 Februari 2024</label>
						<p><b>Akses Literasi di Manapun.</b> : Jelajahi koleksi buku tanpa batas di smartphone, tablet, dan perangkat lainnya.</p>
						<p><b>Rekomendasi Personal.</b> : Dapatkan rekomendasi buku berdasarkan preferensi membaca Anda untuk pengalaman membaca yang lebih personal.</p>
						<p><b>Unduh untuk Membaca Offline.</b> : Simpan buku favoritmu dan nikmati membaca tanpa terbatas, di manapun kamu berada.</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- <div class="more-reviews">
				<ul id="flexiselDemo2">
					<li><img src="images/m1.jpg" alt="" /></li>
					<li><img src="images/m2.jpg" alt="" /></li>
					<li><img src="images/m3.jpg" alt="" /></li>
					<li><img src="images/m4.jpg" alt="" /></li>
				</ul>
				<script type="text/javascript">
					$(window).load(function() {

						$("#flexiselDemo2").flexisel({
							visibleItems: 4,
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
			</div> -->
			<div class="footer">
				<h6>Disclaimer : </h6>
				<p class="claim">InsaFilm adalah layanan streaming yang menawarkan berbagai acara TV pemenang penghargaan, film, anime, dokumenter, dan banyak lagi di ribuan perangkat yang terhubung ke Internet.</p>
				<a href="indrasaepudin212@mail.com">indrasaepudin212@mail.com</a>
				<div class="copyright">
					<p> &copy; 2022 <a href="#"> InsaFilm|IndraSaepudin</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</body>

</html>