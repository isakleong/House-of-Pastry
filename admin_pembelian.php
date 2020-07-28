<?php
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}
include 'koneksi.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Admin Pembelian | House of Pastry </title>
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
	<h2 style="text-align: center"> Data Pembelian </h2>
	<hr>
	<br>

	<table class=" table table-bordered text-center" id="datatables">
		<thead>
			<tr>
				<th> No </th>
				<th> Nama Pelanggan </th>
				<th> Tanggal </th>
				<th> Total </th>
				<th> Notes </th>
				<th> Status </th>
				<th> Nota </th>
				<th> Detail </th>
				<th> Edit </th>
			</tr>
		</thead>


		<tbody>
			<?php $nomor = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM pembelian join pelanggan join ongkir on pembelian.id_pelanggan=pelanggan.id_pelanggan and pembelian.id_ongkir=ongkir.id_ongkir order by pembelian.tanggal_pembelian" ); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
				<tr>
					<td> <?php echo $nomor; ?> </td>
					<td> <?php echo $pecah['nama_pelanggan'] ?> </td>
					<td> <?php echo $pecah['tanggal_pembelian'] ?> </td>
					<td> Rp. <?php echo number_format($pecah['total_pembelian']); ?> </td>
					<td> <?php echo $pecah['alamat_tujuan'] ?> </td>
					<td>
					<?php 
						if ($pecah['status_pembelian'] == "Accept"){
							 echo "<font color='#ff0000'>" .$pecah['status_pembelian']. "</font>";		
						}else{
							echo $pecah['status_pembelian'];
						}
					?>
					</td>
					<td> <img src="foto_nota/<?php echo $pecah['foto_nota'] ?>" width="100">   </td>
					<td> <a href="admin_detail_pembelian.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-lg btn-info"><i class="fa fa-search"></i> </a> </td>
					<td> <a href="admin_detail_pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-lg btn-success"><i class="fa fa-edit"></i> </a> </td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="9"><a href="pdf_data_pembelian.php" class="btn btn-danger"><i class="fa fa-print" aria-hidden="true"></i> Cetak PDF </a> </th>
			</tr>
			<tr>
				<th colspan="9"><a href="excel_pembelian.php" class="btn btn-outline-dark"><i class="fa fa-print" aria-hidden="true"></i> Export Excel </a> </th>
			</tr>
		</tfoot>
	</table>

</body>
</html>