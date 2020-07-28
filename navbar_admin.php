<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top"> <!--fixed-top-->
	<div class="container-fluid">
		<a class="navbar-brand" href="#"> <img src="img/logo1.png"> Welcome, Admin </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="admin_kategori.php"> <img src ="icon/svg/si-glyph-bullet-list-2.svg" width=20 height=20> Kategori </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="admin_produk.php"> <img src ="icon/svg/si-glyph-bread.svg" width=20 height=20> Produk </a>
				</li>
				<div class="dropdown">
					<li class="nav-item active">
						<a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

							<img src ="icon/svg/si-glyph-cup-cake.svg" width=20 height=20> Custom </a>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="admin_shape.php"> Cake Shape</a>
								<a class="dropdown-item" href="admin_size.php">Cake Size</a>
								<a class="dropdown-item" href="admin_flavor.php">Cake Flavor</a>
								<a class="dropdown-item" href="admin_icing.php">Cake Icing</a>
							</div>
						</li>
					</div>
					<li class="nav-item active">
						<a class="nav-link" href="admin_pembelian.php"> <img src ="icon/svg/si-glyph-cashier-machine.svg" width=20 height=20> Pembelian </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="admin_pelanggan.php"> <img src ="icon/svg/si-glyph-book-person.svg" width=20 height=20> Pelanggan </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="admin_news.php"> <img src ="icon/svg/si-glyph-newspaper.svg" width=20 height=20> News </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="admin_ongkir.php"> <img src ="icon/svg/si-glyph-motobike.svg" width=20 height=20> Ongkir </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="logout.php"> <img src ="icon/svg/si-glyph-button-error.svg" width=20 height=20> Logout </a>
					</li>
				</ul>

			</div>
		</div>
	</nav>