<?php
session_start();

/*echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";*/

include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM keranjang;");

$isi = $ambil->num_rows;

if($isi >= 1){
	$ambil = $koneksi->query("SELECT * FROM keranjang;");
}else{
	echo "<script> alert ('Your cart is empty !'); </script>";
	echo "<script> location='kategori.php'; </script>";
}

/*if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
	echo "<script> alert ('Your cart is empty'); </script>";
	echo "<script> location='kategori.php'; </script>";
}*/
$_SESSION['keranjang'] = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Shopping Cart | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="produk1.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
</head>
<body>
	
	<?php 
	require ('navbar_pelanggan1.php');
	?>

	<section class="konten" id="updateDiv">
		<div class="container">
			<br>
			<h1 style="text-align: center;">  Shopping Cart </h1>
			<hr>
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th> No </th>
						<th> Product </th>
						<th> Name </th>
						<th> Quantity </th>
						<th> Price </th>
						<th> Subtotal </th>
						<!-- <th> Update </th> -->
						<th> Delete </th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; $total=0; ?>
					<?php $ambil = $koneksi->query("SELECT * from keranjang join produk on keranjang.id_produk = produk.id_produk; "); ?>
					<?php while($pecah = $ambil->fetch_assoc()) { ?>
						<tr>
							<td> <?php echo $nomor; ?> </td>
							<td> 
								<img src="foto_produk/<?php echo $pecah['foto_produk'] ?>" width="100"> 
							</td>
							<td> 
								<?php echo $pecah['nama_produk']; ?>
							</td>

							<td> <input type="number" name="jumlah" min="1" max="100"
								value="<?php echo $pecah['jumlah']; ?>" style="width: 50px;" id="upCart<?php echo $nomor; ?>" onchange="updateproduk('<?php echo $pecah['id_produk']; ?>',this.value)" >

							</td>

							<td> IDR. <?php echo number_format($pecah['harga_produk']); ?> </td>
							<td>  IDR. <?php echo number_format($pecah['subtotal']); ?> </td>
							<!-- <td> 
								<button class="btn btn-sm btn-success"> <img src=icon/svg/si-glyph-pencil.svg width=20 height=20 name="update" ></button>

								<a href="update_keranjang.php?id=<?php //echo $pecah['id_keranjang']?> & jumlah=<?php //'jumlah' ?>"> <button class="btn btn-sm btn-success"> <img src=icon/svg/si-glyph-pencil.svg width=20 height=20></button></a>
							</td> -->

							<td> 
								<a href="delete_keranjang.php?id=<?php echo $pecah['id_keranjang']; ?>" > <button class="btn btn-sm btn-danger" onClick="return confirm('Are You Sure ?')"> <img src=icon/svg/si-glyph-trash.svg width=20 height=20> </button> </a>
							</td>
						</tr>
						<?php $nomor++; 
						$total += $pecah['subtotal']; ?>
					<?php } ?>
				</tbody>

				<tfoot>
					<td colspan="5" style="font-weight: bold"> Total </td>
					<td colspan="1"style="font-weight: bold"> IDR. <?php echo number_format( $total); ?></td>
				</tfoot>
			</table>

			<a href="kategori.php" class="btn btn-outline-dark"> Back to Shopping </a>
			<a href="shopping_list.php" class="btn btn-primary"> Go to Payment </a>
			<!-- <a href="kosongkan_keranjang.php" class="btn btn-primary"> Truncate Keranjang </a> -->
		</div>
	</section>
	<script>
		function updateproduk(idprod,jumlah){
			<?php 
			$ambil = $koneksi->query("SELECT * from keranjang join produk on keranjang.id_produk = produk.id_produk;");
			$pecah = $ambil->fetch_assoc();
			?>

			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("updateDiv").innerHTML = this.responseText;

				}
			};

			// Cek Jumlah qty yg baru
			if(jumlah <= 0 ){
				alert('Minimum Quantity is 1');
				jumlah = 1;
				/*jumlah = <?php echo $pecah['jumlah']; ?>;*/
			}else if(jumlah > 100){
				alert('Maximum Quantity is 100');
				jumlah = 100;
				/*jumlah = <?php echo $pecah['jumlah']; ?>;*/
			}

			xhttp.open("GET", "update_keranjang.php?proId=" + idprod + "&qty=" + jumlah, true);
			xhttp.send();

			if(jumlah >= 1 || jumlah <=100){
				alert('Update Quantity Success !');
				window.location.href="keranjang_produk.php";
			}
			
		}
	</script>
</body>
</html>

