<?php
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian ='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Admin Detail Pembelian | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="admin.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>

	<script type="text/javascript">
		$(document).ready( function () {
			$('#datatables').DataTable();
		} );
	</script>
</head>
<body>
	<?php 
	require ('navbar_admin.php');
	?>

	<br>
	<hr>
	<h2 style="text-align: center"> Detail Pembelian </h2>
	<hr>
	<br>

	<table class=" table table-bordered text-center" id="datatables">
		<thead>
			<tr>
				<th> No </th>
				<th> Nama Produk</th>
				<th> Harga </th>
				<th> Jumlah </th>
				<th> Sub Total </th>
			</tr>
		</thead>


		<tbody>
			<?php $nomor = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk join produk on pembelian_produk.id_produk=produk.id_produk where pembelian_produk.id_pembelian ='$_GET[id]'"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
				<tr>
					<td> <?php echo $nomor; ?> </td>
					<td> <?php echo $pecah['nama_produk'] ?> </td>
					<td> Rp. <?php echo number_format($pecah['harga_produk']); ?> </td>
					<td> <?php echo $pecah['jumlah'] ?> </td>
					<td> Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?></td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>

			<tr>
				<?php $ambil = $koneksi->query("SELECT * FROM pembelian join ongkir on pembelian.id_ongkir=ongkir.id_ongkir where pembelian.id_pembelian='$_GET[id]'" ); 
				$pecah = $ambil->fetch_assoc();
				?>
				<td colspan="4"> Biaya Ongkir <!-- <?php echo $pecah['nama_kota'] ?> --> </td>
				<td colspan="1"> Rp. <?php echo number_format($pecah['tarif']); ?> </td>
			</tr>


			<td colspan="4"> Total Akhir </td>
			<td colspan="1"> Rp. <?php echo number_format($pecah['total_pembelian']); ?> </td>
		</tbody>
		<tfoot>
			<td colspan="5"><a href="admin_pembelian.php" class="btn btn-primary"> Back </a> </td>	
		</tfoot>
	</table>

</body>
</html