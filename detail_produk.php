<?php
session_start();
include 'koneksi.php';

/*echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";*/

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Detail Product | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="kategori.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
</head>

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
	<!-- <script>
		function cek(tombol){
			var angka=document.getElementsByName('belii');
			var temp=parseInt(angka[0].value);
			if(tombol=="tambah"){
				temp+=1;
				angka[0].value=temp;
			}
			else{
				if(temp>0){
					temp-=1;
					angka[0].value=temp;
				}
				
			}
		}
		// function loading(){
		// 	var angka=document.getElementsByName('belii');
		// 	angka[0].value=1;
		// }
	</script> -->
	<body>

		<?php 
		require ('navbar_pelanggan1.php');
		?>
		<!-- <hr class="my-4"> -->
		

		<section class="konten">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<br> 
						<img style="width: 85%; height: 95%; padding-left: 5px; margin-left: 50px;" src="foto_produk/<?php echo $detail['foto_produk']; ?>">
					</div>
					<div class="col-md-5">
						<br>
						<!-- <div class="container-fluid">
							<div class="row">
								<div class="col-md-2"> </div>
								<div class="col-md-6"> <h4 style="float: right;"> Category : </h4> </div>
								<div class="col-md-4">
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
							</div>
						</div> -->
						<form method="post">
							<h2> <?php echo $detail['nama_produk']; ?> </h2>
							<?php if ($detail['rating'] == 1): ?>	
								<h5> Rating : <img src="img/star1.png" style="width: 120px; height: 30px;"> </h5>
								<?php elseif ($detail['rating'] == 2): ?>	
									<h5> Rating : <img src="img/star2.png" style="width: 120px; height: 30px;"> </h5>
									<?php elseif ($detail['rating'] == 3): ?>	
										<h5> Rating : <img src="img/star3.png" style="width: 120px; height: 30px;"> </h5>
										<?php elseif ($detail['rating'] == 4): ?>	
											<h5 style="font-size: 20px; "> Rating : <img src="img/star4.png" style="width: 120px; height: 30px;"> (Recommended) </h5>
											<?php elseif ($detail['rating'] == 5): ?>	
												<h5 style="font-size: 20px; "> Rating : <img src="img/star5.png" style="width: 120px; height: 30px;"> (Best Seller) </h5>
											<?php endif ?>

											<hr class="my-4" style="border-top: 2px solid; border-color: gold;">
											<h6 style="text-align: center;"> <?php echo $detail['deskripsi_produk']; ?> </h6>
											<hr class="my-4" style="border-top: 2px solid; border-color: gold;">
											<h5> Size : <?php echo $detail['berat_produk']; ?> </h5>
											<h5> <input type="hidden" name="harga" value="<?php echo $detail['harga_produk'] ?>"> IDR <?php echo number_format($detail['harga_produk']); ?> </h5>
											<br>
											<div class="form-group">
												<div class="input-group">
													<h5> Qty &nbsp; </h5>
													<input type="number" min ="1" max="100" class="form-control" name="jumlah" required>
													<div class="input-group-btn">
														&nbsp; &nbsp;<button class="btn btn-primary" name="beli"><img src ="icon/svg/si-glyph-trolley-arrow-down.svg" width=20 height=20></button>
													</div>
												</div>
											</div>
										</form>

										<?php 
										if(isset($_POST['beli'])){

											$ambil = $koneksi->query("SELECT * FROM keranjang where id_produk = $id_produk");
											$akunyangcocok = $ambil->num_rows;


											if($akunyangcocok == 0){
												$jumlah = $_POST['jumlah'];
												$harga = $_POST['harga'];
												$subtotal = $jumlah * $harga;
												echo "<script> alert('Added to cart Success !'); </script>";
												echo "<script> location='keranjang_produk.php' </script>"; 

												$koneksi->query("INSERT INTO keranjang (id_keranjang, id_produk, jumlah, subtotal, harga) VALUES (null, $id_produk, $jumlah, $subtotal, $harga)");
											}else{
												echo "<script> alert('Product already in Your Cart !'); </script>";
												/*echo "<script> location='detail_produk.php?id=<?php". echo $id_produk; ."?>' ; </script>";*/
											}
										}
										?>
										<br>
										<a href="produk.php?id=<?php echo $detail['id_kategori']; ?>" class="btn btn-primary"> Back </a> 

									</div>
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