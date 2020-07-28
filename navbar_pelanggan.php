<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"> <!--fixed-top / sticky top-->
	<div class="container-fluid">
		<a class="navbar-brand" href="#"> <img src="img/logo1.png">
			<?php 
			if(isset($_SESSION['pelanggan'])){
				echo "Welcome, ".$_SESSION['pelanggan'];
			}
			else{
				echo "";
			}
			?>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="home.php"> <img src ="icon/svg/si-glyph-house.svg" width=20 height=20> Home </a>
				</li>

				<div class="dropdown">
					<li class="nav-item active">
						<a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

						 <img src ="icon/svg/si-glyph-bread.svg" width=20 height=20> Products </a>
						 
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="kategori.php">Products</a>
							<a class="dropdown-item" href="custom.php">Custom Products</a>
						</div>
					</li>
				</div>

				<li class="nav-item active">
					<a class="nav-link" href="storelocations.php"> <img src ="icon/svg/si-glyph-store.svg" width=20 height=20> Store Locations </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="keranjang_produk.php"> <img src ="icon/svg/si-glyph-trolley-2.svg" width=20 height=20> My Cart </a>
				</li>

				<?php if(isset($_SESSION['pelanggan'])): ?>
					<li class="nav-item active">
						<a class="nav-link" href="history.php"> <img src ="icon/svg/si-glyph-history.svg" width=20 height=20> History </a>
					</li>							
				<?php endif ?>

				<?php if(isset($_SESSION['pelanggan'])): ?>
					<li class="nav-item active">
						<a class="nav-link" href="logout.php" onClick="return confirm('Are You Sure to logout (Your cart will empty) ?')"> <img src ="icon/svg/si-glyph-button-error.svg" width=20 height=20> Logout </a>
					</li>
					<?php else: ?>
						<li class="nav-item active">
							<a class="nav-link" href="login.php"> <img src ="icon/svg/si-glyph-sign-in.svg" width=20 height=20> Login </a>
						</li>
					<?php endif ?>

					<?php if(isset($_SESSION['pelanggan'])): ?>
						<li class="nav-item active">
							<a class="nav-link" href="edit_profile.php?id=<?php echo $_SESSION['id']; ?>"> <img src ="img/profile5.png" width=25 height=25> </a>
						</li>							
					<?php endif ?>
				</ul>

			</div>
		</div>
	</nav>