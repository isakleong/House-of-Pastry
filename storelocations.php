<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Store Locations | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 
	<link href="https://fonts.googleapis.com/css?family=Mr+Dafoe" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="storelocations1.css" rel="stylesheet">
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

	<figure>
		<div class="fixed-wrap">
			<div id="fixed"></div>
			<div class="table-cell">
				<h1> Store Locations </h1>
			</div>
		</div>
	</figure>

	<!-- Store Location -->
	<div class="store">
		<h4> Our Store Locations </h4>
		<hr class="my-4">
	</div>

	<div class="row multi-columns-row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 detail">
			<h4>HAYAM WURUK</h4>
			<h5>Jl. Hayam Wuruk No. 79 Jakarta Barat
			</h5>
			<h5>Ph. 021 625 1269</h5>
			<h5>Fax. 021 649 5150</h5>
			<a class="location" href="https://www.google.co.id/maps/place/Holland+Bakkery+Hayam+Wuruk/@-6.1579971,106.8149556,16z/data=!4m5!1m2!2m1!1sholland+bakery+Hayam+Wuruk+No.+79+Jakarta+Barat!3m1!1s0x2e69f5d9b89e60b7:0xd1e3a1077acdb16e" class="">location map</a>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 detail">
			<h4>CIDENG</h4>
			<h5>Jl. K.H Hasyim Ashari No.29, Cideng Jakarta Barat
			</h5>
			<h5>Ph. 021 632 6165</h5>
			<h5>Fax. </h5>
			<a class="location" href="https://www.google.co.id/maps/place/Holland+Bakkery+Cideng/@-6.1658904,106.8086074,17z/data=!3m1!4b1!4m2!3m1!1s0x2e69f66f8b5d8b43:0x7af864b82966e500">location map</a>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 detail">
			<h4>GAJAH MADA</h4>
			<h5>Jl. Gajah Mada No. 172 &amp; 173 Jakarta Barat
			</h5>
			<h5>Ph. 021 63867867</h5>
			<h5>Fax. 021 63867873</h5>
			<a class="location" href="https://www.google.co.id/maps/place/Holland+Bakery+gajah+mada/@-6.1509486,106.8164798,18z/data=!4m2!3m1!1s0x2e69f609f6f9011d:0xe08b294f349498e5?hl=id">location map</a>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 first-in-row detail">
			<h4>SUNTER</h4>
			<h5>Jl. Danau Sunter Utara Raya Blok E No. 1A</h5>
			<h5>Ph. 021 651 4877</h5>
			<h5>Fax. 021 651 4932</h5>
			<a class="location" href="https://www.google.co.id/maps/place/Holland+Bakery/@-6.1387407,106.8612875,17z/data=!3m1!4b1!4m2!3m1!1s0x2e69f57f53513c35:0xbb7f2340a6b89ef7">location map</a>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 detail">
			<h4>CIKINI</h4>
			<h5>Jl. Cikini Raya No. 65</h5>
			<h5>Ph. 021 315 2223</h5>
			<h5>Fax. 021 315 1958</h5>
			<a class="location" href="https://www.google.co.id/maps/place/Holland+Bakery+-+Cikini/@-6.1893099,106.8356789,17z/data=!3m1!4b1!4m2!3m1!1s0x2e69f43f27fc212d:0xd9ce78a951c3152d">location map</a>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 detail">
			<h4>JATINEGARA</h4>
			<h5>Jl. Raya Jatinegara Timur No. 109</h5>
			<h5>Ph. 021 851 5105</h5>
			<h5>Fax. 021 8590 4771</h5>
			<a class="location" href="https://www.google.co.id/maps/place/Holland+Bakery+Jatinegara/@-6.2237015,106.8660237,17z/data=!3m1!4b1!4m2!3m1!1s0x2e69f37fc2f1453d:0x10b1fca20772a007">location map</a>
		</div>
	</div>

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