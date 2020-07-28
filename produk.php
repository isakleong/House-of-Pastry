<?php 
session_start();
include 'koneksi.php';

$ambil1 = $koneksi->query("SELECT * FROM produk join kategori on produk.id_kategori=kategori.id_kategori where produk.id_kategori = $_GET[id]"); 
$title = $ambil1->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> <?php echo $title['nama_kategori']?> | House of Pastry  </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 
	<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="produk1.css" rel="stylesheet">
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
				<h1> <?php echo $title['nama_kategori']?> </h1>
			</div>
		</div>
	</figure>

	<section class="konten">
		<div class="container">
			<br>
			<h1 style="text-align: center; margin-bottom: -40px;"> <?php echo $title['nama_kategori']?> </h1>
			<br>
			<hr>

			<!-- Combo Box -->
			<div class="container-fluid">
				<!-- <div class="row">
					<div class="col-md-3"> </div>
					<div class="col-md-6"> <h4 style="float: right;"> Category : </h4> </div>
					<div class="col-md-3">
						<div class="form-group">
							<select name="kategori" class="form-control" >
								<option> Click Here ...  </option>
								<?php $pilih = $koneksi->query("SELECT * FROM kategori;"); ?>
								<?php while($row = $pilih->fetch_assoc()) { ?>
									<option name="id" value="<?php echo $row['id_kategori']; ?>"  onclick="pindah(this.value)" > <?php echo $row['nama_kategori']?> </option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div> -->
				<br>


				<div class="row">
					<?php $ambil = $koneksi->query("SELECT * FROM produk join kategori on produk.id_kategori=kategori.id_kategori where produk.id_kategori = $_GET[id]");?>
					<?php while($perproduk = $ambil->fetch_assoc()) { ?>
						<div class="col-md-4" style="padding-bottom: 25px;">
							<div class="hovereffect">
								<img class="img-responsive" src="foto_produk/<?php echo $perproduk['foto_produk']; ?>">
								<div class="overlay">
									<p>
										<h2 style="font-size: 20pt; background-color: rgba(50,50,50,0.7);"> <?php echo $perproduk['nama_produk']; ?> </h2>
										<a style="font-size: 16pt; color: black;" href="detail_produk.php?id=<?php echo $perproduk['id_produk']; ?>"> Details </a>
									</p>
								</div>
							</div>
						</div>
					<!-- <div class="col-md-3">  
						<div class="card">
							<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top">
							<div class="card-body">
								<h4 class="card-title"> <?php echo $perproduk['nama_produk']; ?> </h4>
								<p class="card-text"> IDR. <?php echo number_format($perproduk['harga_produk']); ?></p>
								<br>
								<a href="beli_produk.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary"> Buy </a>
								<a href="detail_produk.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-outline-dark"> Details </a>
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

<script type="text/javascript">

	function pindah(idbaru){

		//alert(idbaru);
		//window.location.href="produk.php?id=id";
		location='produk.php?id=' +  idbaru ;
	}

</script>