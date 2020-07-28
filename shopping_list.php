<?php 
session_start();
include 'koneksi.php';

if(!isset($_SESSION['pelanggan']) || !isset($_SESSION['telepon'])){
	echo "<script> alert('Please login first !') </script>";
	echo "<script> location='login.php'; </script>"; 
}
/*if (empty($_SESSION['keranjang'])){
	echo "<script> alert ('Cart has not been filled'); </script>";
	echo "<script> location='zkategori.php'; </script>";
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Shopping List | House of Pastry </title>
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
		<!--pre>
			<?php print_r($_SESSION['pelanggan']); ?>
		</pre-->

		<section class="konten">
			<div class="container">
				<br>
				<h1 style="text-align: center;"> Shopping List </h1>
				<hr>
				<table class="table table-bordered text-center">
					<thead>
						<tr>
							<th> No </th>
							<th> Product Name </th>
							<th> Price </th>
							<th> Quantity </th>
							<th> Subtotal </th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1; ?>
						<?php $totalbelanja = 0; ?>
						<?php $ambil = $koneksi->query("SELECT * from keranjang join produk on keranjang.id_produk = produk.id_produk; "); ?>
						<?php while($pecah = $ambil->fetch_assoc()) { ?>
							<tr>
								<td> <?php echo $nomor; ?> </td>
								<td> <?php echo $pecah['nama_produk']; ?> </td>
								<td> <?php echo number_format($pecah['harga_produk']); ?> </td>
								<td> <?php echo $pecah['jumlah'] ?> </td>
								<td> IDR. <?php echo number_format($pecah['subtotal']); ?> </td>
							</tr>
							<?php $nomor++ ?>
							<?php $totalbelanja += $pecah['subtotal']; ?>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="4"> Total Price </th>
							<th> IDR. <?php echo number_format($totalbelanja) ?> </th>
						</tr>
					</tfoot>
				</table>

				<form method="post">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" readonly value="<?php echo $_SESSION['pelanggan'] ?>" class="form-control">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<input type="text" readonly value="<?php echo $_SESSION['telepon']; ?>" class="form-control">
							</div>
						</div>

						<div class="col-md-4">
							<select class="form-control" name="id_ongkir">
								<?php 
								$ambil = $koneksi->query("SELECT * FROM ongkir");
								while($perongkir = $ambil->fetch_assoc()){ ?>
									<option value="<?php echo $perongkir['id_ongkir']; ?>">
										<?php echo $perongkir['nama_kota'] ?> - 
										IDR. <?php echo number_format($perongkir['tarif']) ?>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label> Deliver to </label>
							<textarea class="form-control" name="alamat_pengiriman" placeholder="Please enter the address" required></textarea>
						</div>
						<a href="keranjang_produk.php" class="btn btn-outline-dark"> Back </a>
						<button class="btn btn-primary" onClick="return confirm('Please re-check your data')" name="bayar"> Pay </button>
					</form>

					<?php
					if(isset($_POST['bayar'])){
						$id_pelanggan = $_SESSION['pelanggan1']['id_pelanggan'];
						$id_ongkir = $_POST['id_ongkir'];
						$tanggal_pembelian = date("Y-m-d");
						$alamat_pengiriman = $_POST['alamat_pengiriman'];

						$ambil = $koneksi->query("SELECT * from ongkir where id_ongkir='$id_ongkir'");
						$arrayongkir = $ambil->fetch_assoc();
						$nama_kota = $arrayongkir['nama_kota'];
						$tarif = $arrayongkir ['tarif'];

						$total_pembelian = $totalbelanja + $tarif;
						// menyimpan data ke tabel pembelian
						$koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_tujuan) 
							VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarif', '$alamat_pengiriman')");

						// mendapat id_pembelian yg barusan terjadi
						$id_pembelian_barusan = $koneksi->insert_id;

						$ambil = $koneksi->query("SELECT * from keranjang join produk on keranjang.id_produk = produk.id_produk; ");
						while($perproduk = $ambil->fetch_assoc()) {

							$id_produk = $perproduk['id_produk'];
							$nama = $perproduk['nama_produk'];
							$harga = $perproduk['harga_produk'];
							$berat = $perproduk['berat_produk'];
							$subberat = $perproduk['berat_produk'];
							$subharga = $perproduk['subtotal'];
							$jumlah = $perproduk['jumlah'];

							$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES ('$id_pembelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah') ");
						}

						// mengosongkan keranjang belanja
						//unset($_SESSION['keranjang']);
						$koneksi->query(" TRUNCATE TABLE `keranjang` ");


							// tampilan di alihkan ke halaman nota
						echo "<script> alert('Payment Success !'); </script>";
						echo "<script> location='nota.php?id=$id_pembelian_barusan'; </script>";

					}
					?>
				</div>
			</section>

		</body>
		</html>