<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-weidth, initial-scale=1">
	<title> Home | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 
	<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
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
				$('body,html').animate({scrollTop : 0}, 500);  // Scroll to top of body
			});

		});
	</script>

	<script>
		$(document).ready(function(){
  // Add smooth scrolling to all links
  $('#ax').on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
      	scrollTop: 2210
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
    });
    } // End if
});
});
</script>

</head>
<body>

	<?php 
	require ('navbar_pelanggan.php');
	?>

	<!--- Image Slider -->
	<div id="slides" class="carousel slide" data-ride="carousel" id="top">
		<ul class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>	
		</ul>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img src="img/b4.jpeg">
				<div class="carousel-caption">
					<h1> House of Pastry </h1>
					<h3> Fresh From The Oven </h3>
					<button type="button" class="btn btn-outline-light btn-lg" id="ax" href="#section2"> About Us</button>
				</div>
			</div>
			<div class="carousel-item">
				<img src="img/satu.jpeg">
			</div>
			<div class="carousel-item">
				<img src="img/tiga.jpg">
			</div>
		</div>
		<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<!--- Our Spirit -->
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4"> Our Spirit </h1>
			</div>
			<hr>
			<div class="col-12">
				<p class="lead"> House of Pastry comes as a solution that answers the needs of cake lovers. The solution given is to be home to a variety of cakes with amazing flavors. In the course of building the house, we are committed to bringing innovation to every product we make. Every product we make certainly gives an unforgettable taste sensation. This encourages us to continue to produce quality products.
				</p>
			</div>
		</div>
	</div>


	<!--- Our Motto -->
	<div class="container-fluid motto">
		<div class="row text-center">
			<div class="col-xs-12 col-sm-12 col-md-4" >
				<img src="img/motto1.jpg">
				<h3> PREMIUM INGREDIENTS  </h3>
				<p>  Every product that we make in our bakeries follows rigorous procedures from start to finish. We produce the finest quality products without compromising taste, texture and nutrition. </p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<img src= "img/motto2.jpg" >
				<h3> NO ADDITIVE & PRESERVATIVES  </h3>
				<p>  In order to preserve the natural taste and to bring the best version of Maison Féerie's products, we choose healthy and nutritious ingredients instead of using addictive and preservatives. </p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<img src= "img/motto3.jpg">
				<h3> HEART WARMING SERVICE  </h3>
				<p> Serving our beloved customers with heart and joy is our fairies work-ethic. This ensures they're well-prepared to explicate every detail of our products for you. </p>
			</div>
		</div>
		<hr class="my-4">
	</div>

	<!--- Fun Fact -->
	<!-- <div class="container-fluid padding">
		<div class="row padding">
			<div class="col-lg-8">
				<h2> Fun Fact </h2>
				<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
				<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
				<a href="#" class="btn btn-primary"> See More </a>
			</div>
			<div class="col-lg-4">
				<br>
				<img src="img/b6.jpg" class="img-fluid">
			</div>
		</div>
	</div>

	<hr class="my-4"> -->

	<!--- Fixed background -->
	<figure>
		<div class="fixed-wrap">
			<div id="fixed">
			</div>
		</div>
	</figure>

	<!--- Meet the team -->
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4"> About Us </h1>
			</div>
			<hr>

		</div>
	</div>

	<!--- Two Column Section -->
	<div class="container-fluid padding" id="section2">
		<div class="row padding">
			<div class="col-lg-4" id="section2">
				<img src="img/b7.jpg" class="img-fluid">
			</div>
			<div class="col-lg-8">
				<br>
				<p> Holland Bakery is one of the first pioneer in modern bakery business in Indonesia. Established in 1978, Holland Bakery is currently managed under PT. Mustika Citra Rasa.</p>


				<p>With more than 300 outlets in Indonesia, our vision is to promote our products to become one alternative of the staple foods of Indonesian people. Our products are healthy, nutritious, and affordable by all levels of society.</p>


				<p>Holland Bakery offers wide range of products: fashion and classic breads, sandwiches, pastries, cakes, traditional snacks, cookies, bika ambon, pisang bolen, layer cakes and premium srikaya jam. As one of the license holder of Disney characters, Holland Bakery offers varieties of cakes with various Disney models and characters. Holland Bakery also offers various model of birthday and wedding cakes. Because almost all bakery products can be conveniently found in every shop, Holland Bakery is often called as one stop shopping bakery.</p>


				<p>Holland Bakery is well known for its quality because all products are made only from finest high quality ingredients, processed and baked with strict quality control using modern machines and equipments. It is not surprising if Holland Bakery has a motto: “Teratas karena Kualitas” (Top for its quality).</p>

				<p>Holland Bakery has won various awards and achievements, such as 7 times consecutive winner of Top Brand Award by Frontier Consulting Group and Marketing Magazine since 2009 to 2015. Holland Bakery was also awarded “The Most Favourite and Popular Bakery” by Bakery Indonesia Magazine in 2009. </p>
				<br>
			</div>
		</div>
		<hr class="my-4">
	</div>

	<!--- Fixed background -->
	<figure>
		<div class="fixed-wrap">
			<div id="fixed2">
			</div>
		</div>
	</figure>

	<!--- Meet the team -->
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4">News</h1>
			</div>
			<hr>
		</div>
	</div>

	<!--- Cards -->
	<div class="container-fluid padding">
		<div class="row padding">
			<?php $ambil = $koneksi->query("SELECT * FROM news;"); ?>
			<?php while($pernews = $ambil->fetch_assoc()) { ?>
			<div class="col-md-4" style="padding-bottom: 25px;">
				<div class="card">
					<img class="card-img-top" src="img/<?php echo $pernews['foto_news']; ?>">
					<div class="card-body">
						<h4 class="card-title"> <?php echo $pernews['nama_news'];  ?> </h4>
						<p class="card-text"> <?php echo $pernews['deskripsi_news'];  ?> </p>
					</div>
				</div>
			</div>
			<?php } ?>
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