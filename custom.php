<?php 
session_start();
include 'koneksi.php';

/*$id_produk = $_GET['id'];*/

/*$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();*/
/*$_SESSION['idbeli']=$detail['id_produk'];*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Custom Your Cake | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg">
	<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe" rel="stylesheet"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


	<link href="kategoricustom.css" rel="stylesheet">
	<link href="home1.css" rel="stylesheet">
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
				<h1> Custom Products </h1>
			</div>
		</div>
	</figure>

	<section class="konten">
		<div class="container">
			<br>
			<h1 style="text-align: center; margin-bottom: -40px;"> A Custom Creation </h1>
			<br>
			<hr>
			<div class="container-fluid padding">
				<div class="row welcome text-center">
					<div class="col-md-12">
						<img src="img/custom.jpg" style="width: 100%; height: 100%; padding-bottom: 50px;">
					</div>
					<div class="col-md-12">
						<p class="lead">House of Pastry team designs custom cakes and other festive sweets for celebrations held at Cork Factory Hotel and elsewhere. Never sacrificing flavor, our pastry team infuses everything they make with back-to-basics goodness and distinctive elegance. From traditional tiered cakes to uniquely designed custom creations, our executive pastry chef will work with you to find the exact flavor and look that you desire.
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid motto">
			<div class="row text-center">
				<div class="col-xs-12 col-sm-12 col-md-4" >
					<img src="img/motto1.jpg">
					<h3> CHOOSE YOUR SIZE  </h3>
					<p>  Multi-tiered, any length diameter, make it big or small to fit your needs. </p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4" >
					<img src= "img/motto2.jpg" >
					<h3> CHOOSE YOUR SHAPE </h3>
					<p>  Square or round—pick a shape to fit your style.</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4" >
					<img src= "img/motto3.jpg">
					<h3> CHOOSE YOUR FLAVOR </h3>
					<p> Choose different flavors per tier and customize flavors to your delight. </p>
				</div>
			</div>
		</div>

		<hr class="my-4">
		<h2 style="text-align: center;"> Know Your Icing</h2>
		<hr class="my-4">

		<div class="row" style="height: 300;">
			<?php $ambil = $koneksi->query("SELECT * FROM custom; "); ?>
			<?php while($percustom = $ambil->fetch_assoc()) { ?>
				<div class="col-md-4" style="padding-bottom: 25px;">
					<div class="hovereffect">
						<img class="img-responsive" src="foto_custom/<?php echo $percustom['foto_custom']; ?>">
						<div class="overlay">
							<p>
								<h2 style="font-size: 18pt; background-color: rgba(50,50,50,0.7); margin-top:-10px;"> <?php echo $percustom['nama_custom']; ?> </h2>
								<a style="font-size: 10pt; color: black;"> <?php echo $percustom ['deskripsi_custom'] ?> </a>
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<center>
		<button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#produk">
			<i class="fa fa-plus-circle" aria-hidden="true"></i> Get Start
		</button>
	</center>


	<div id="produk" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Build your own cake!</h4>
					<button class="close" data-dismiss="modal"> x </button>
				</div>
				<form method="post" action="update_custom.php" enctype="multipart/form-data">
					<div class="modal-body">
						<!-- <div class="form-group">
							<label> Nama </label>
							<input type="text" class="form-control" name="nama" required>
						</div> -->
						<!-- <div class="form-group">
							<label> Harga (Rp) </label>
							<input type="number" class="form-control" name="harga" required>
						</div> -->
						<!-- <div class="form-group">
							<label> Size </label>
							<input type="text" class="form-control" name="berat" required>
						</div> -->
						<div class="form-group">
							<label>Cake Shape</label>
							<select name="shape" class="form-control" required>
								<?php $ambil = $koneksi->query("SELECT * FROM shape;"); ?>
								<?php while($pecah = $ambil->fetch_assoc()) { ?>
									<option value="<?php echo $pecah['id_shape'] ?>"> <?php echo $pecah['nama_shape'].
									' (Rp '.$pecah['harga_shape'].')'?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Cake Size</label>
							<select name="size" class="form-control" required>
								<?php $ambil = $koneksi->query("SELECT * FROM size;"); ?>
								<?php while($pecah = $ambil->fetch_assoc()) { ?>
									<option value="<?php echo $pecah['id_size'] ?>"> <?php echo $pecah['nama_size'].
									' (Rp '.$pecah['harga_size'].')'?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Cake Flavor</label>
							<select name="flavor" class="form-control" required>
								<?php $ambil = $koneksi->query("SELECT * FROM flavor;"); ?>
								<?php while($pecah = $ambil->fetch_assoc()) { ?>
									<option value="<?php echo $pecah['id_flavor'] ?>"> <?php echo $pecah['nama_flavor'].
									' (Rp '.$pecah['harga_flavor'].')'?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Cake Icing</label>
							<select name="icing" class="form-control" required>
								<?php $ambil = $koneksi->query("SELECT * FROM icing;"); ?>
								<?php while($pecah = $ambil->fetch_assoc()) { ?>
									<option value="<?php echo $pecah['id_icing'] ?>"> <?php echo $pecah['nama_icing'].
									' (Rp '.$pecah['harga_icing'].')'?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Qty</label>
							<input type="number" min ="1" max="100" class="form-control" name="jumlahcustom" required>
						</div>
						<!-- <div class="form-group">
							<label>Additional Information</label>
							<textarea class="form-control" name="deskripsi" rows="2"></textarea>
						</div> -->
					</div>
					<div class="modal-footer">
						<div class="input-group-btn">
							&nbsp; &nbsp;<button class="btn btn-primary" name="belicustom"><img src ="icon/svg/si-glyph-trolley-arrow-down.svg" width=20 height=20></button>
						</div>

						<?php
						if(isset($_POST['belicustom'])){
							$_SESSION['order'] = "custom";
						}
						?>
						<!-- <?php
							$_SESSION['id1'] = $_POST['shape'];
							$_SESSION['id2'] = $_POST['size'];
							$_SESSION['id3'] = $_POST['flavor'];
							$_SESSION['id4'] = $_POST['icing'];
							?> -->
						<!-- <?php 
								if(isset($_POST['beli'])){
									$_SESSION['order'] = "custom";
									$_SESSION['id1'] = $_POST['shape'];
									$_SESSION['id2'] = $_POST['size'];
									$_SESSION['id3'] = $_POST['flavor'];
									$_SESSION['id4'] = $_POST['icing'];
									$jumlah = $_POST['jumlahcustom'];
									$_SESSION['jumlahorder'] = $jumlah ;
									// $_SESSION['keranjangcustom'][$id_produk] = $jumlah;
									echo "<script> alert('Added to cart'); </script>";
									echo "<script> location='keranjang_produk.php'; </script>";
								}
								?> -->
								<button type="reset" class="btn btn-danger"> Reset </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<hr class="my-4">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- <h4>Build your own cake!</h4> -->

				</div>
			</div>
		</div>




		<!--- Connect -->
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