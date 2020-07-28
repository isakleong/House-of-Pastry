<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Categories | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg">
	<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe" rel="stylesheet"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


	<link href="kategori.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
	<script type="text/javascript">
		$(document).ready(function(){

			// ===== Scroll to Top ==== 
			$(window).scroll(function() {
    			if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        			$('#return-to-top').fadeIn(200);    // Fade in the arrow
        		} else {
        			$('#return-to-top').fadeOut(200);   // Else fade out the arrow
        		}
        	});

			$('#return-to-top').click(function() {      // When arrow is clicked
				$('body,html').animate({scrollTop : 0}, 500);                    // Scroll to top of body
			});

		});
	</script>

</head>
<body>

	<?php 
	require ('navbar_pelanggan.php');
	?>

	<!--- Fixed background -->
	<figure>
		<div class="fixed-wrap">
			<div id="fixed"></div>
			<div class="table-cell">
				<h1> Categories </h1>
			</div>
		</div>
	</figure>

	<section class="konten">
		<div class="container">
			<br>
			<h1 style="text-align: center; margin-bottom: -40px;"> Our Categories </h1>
			<br>
			<hr>
			<div class="row">
				<?php $ambil = $koneksi->query("SELECT * FROM kategori"); ?>
				<?php while($perkategori = $ambil->fetch_assoc()) { ?>
				<div class="col-md-4" style="padding-bottom: 25px;">
					<div class="hovereffect">
						<img class="img-responsive" src="foto_kategori/<?php echo $perkategori['foto_kategori']; ?>">
						<div class="overlay">
							<p>
           						<!-- <a href="#">link here</a>				 -->
           						<h2 style="font-size: 20pt; background-color: rgba(50,50,50,0.7); margin-top:30px;"> <?php echo $perkategori['nama_kategori']; ?> </h2>
           						<a style="font-size: 16pt; color: black;" href="produk.php?id=<?php echo $perkategori['id_kategori']; ?>">See Details</a>
           					</p>
						</div>
					</div>
				</div>

					<!-- <div class="col-md-4">
						<div class="card">
							<img  src="foto_kategori/<?php echo $perkategori['foto_kategori']; ?>" class="card-img-top">
							<div class="card-body">
								<h4 class="card-title"> <?php echo $perkategori['nama_kategori']; ?> </h4>
								<a href="produk.php?id=<?php echo $perkategori['id_kategori']; ?>" class="btn btn-outline-dark"> Details </a>
							</div>
						</div>
					</div> -->
				<?php } ?>
			</div>
		</div>
	</section>

	<!--- Connect -->
	<hr class="my-4">
	<div class="container-fluid padding">
		<div class="row text-center padding">
			<div class="col-12">
				<h2> Connect with Us </h2>
			</div>
			<div class="col-12 social padding">
				<a href="http://www.facebook.com"><i class="fab fa-facebook"> </i></a>
				<a href="http://www.twitter.com"><i class="fab fa-twitter"> </i></a>
				<a href="http://www.googleplus.com"><i class="fab fa-google-plus-g"> </i></a>
				<a href="http://www.instagram.com"><i class="fab fa-instagram"> </i></a>
				<a href="http://www.youtube.com"><i class="fab fa-youtube"> </i></a>
			</div>
		</div>
	</div>

	<!--- Footer -->
	<footer>
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-md-4">
					<img src="icon/svg/si-glyph-cup-cake.svg">
					<hr class="light">
					<h5> Visit Us </h5>
					<hr class="light">
					<p> 031-123456 </p>
					<p> houseofpastry@gmail.com </p>
					<p> Jl. Siwalankerto </p>
					<p> Surabaya, Indonesia </p>
				</div>
				<div class="col-md-4">
					<img src="icon/svg/si-glyph-clock.svg">
					<hr class="light">
					<h5> Our Hours </h5>
					<hr class="light">
					<p> Monday : 8 am - 8 pm </p>
					<p> Saturday : 8am - 6 pm </p>
					<p> Sunday : Closed </p>
				</div>
				<div class="col-md-4">
					<img src="icon/svg/si-glyph-pin-location-2.svg">
					<hr class="light">
					<h5> Store Locations </h5>
					<hr class="light">
					<p> Siwalankerto </p>
					<p> Darmo </p>
					<p> Dharmahusada </p>
				</div>
				<div class="col-12">
					<hr class="light-100">
					<h5> Copyright &copy 2018 HouseOfPastry</h5>
					<a href="javascript:" id="return-to-top"><img src="icon/svg/si-glyph-arrow-thin-up.svg"></a>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>