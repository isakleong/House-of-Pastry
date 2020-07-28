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
	<title> Admin Kategori | House of Pastry </title>
	<!-- Fav Icon di bar -->
	<link rel="shortcut icon" type="image/png" href="img/logo1.jpg"> 
-
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
	<h2 style="text-align: center"> Data Kategori </h2>
	<hr>
	<br>

	<table class=" table table-bordered text-center" id="datatables">
		<thead>
			<tr>
				<th> No </th>
				<th> Nama </th>
				<th> Foto </th>
				<th> Update </th>
				<th> Delete </th>
			</tr>
		</thead>


		<tbody>
			<?php $nomor = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM kategori"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
				<tr>
					<td> <?php echo $nomor; ?> </td>
					<td> <?php echo $pecah['nama_kategori'] ?> </td>
					<td> 
						<img src="foto_kategori/<?php echo $pecah['foto_kategori'] ?>" width="100">  
					</td>
					<td> <a href="admin_update_kategori.php?id=<?php echo $pecah['id_kategori']; ?>"> <button class="btn btn-lg btn-success" data-target="update"><i class="fa fa-edit"></i> </button> </a> </td>

					<td> <a href="admin_delete_kategori.php?id=<?php echo $pecah['id_kategori']; ?>"> <button class="btn btn-lg btn-danger" onClick="return confirm('Are You Sure ?')"> <i class="fa fa-trash"> </i></button></a> </td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>
			<tfoot>
				<tr>
					<th colspan="5"><button class="btn btn-primary" data-toggle="modal" data-target="#kategori"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Kategori </button> </th>
				</tr>
				<tr>
					<th colspan="5"><a href="pdf_data_kategori.php" class="btn btn-danger"><i class="fa fa-print" aria-hidden="true"></i> Cetak PDF </a> </th>
				</tr>
				<tr>
					<th colspan="5"><a href="excel_kategori.php" class="btn btn-outline-dark"><i class="fa fa-print" aria-hidden="true"></i> Export Excel </a> </th>
				</tr>
			</tfoot> 
		</tbody>
	</table>

	<!-- Form Kategori -->
	<div id="kategori" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"> Tambah Kategori </h4>
					<button class="close" data-dismiss="modal"> x </button>
				</div>
				<form method="post" action="admin_upload_kategori.php" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label> Nama Kategori </label>
							<input type="text" class="form-control" name="nama" required>
						</div>
						<div class="form-group">
							<label> Foto </label>
							<input type="file" class="form-control" name="file" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" name="save" value="Save">
						<button type="reset" class="btn btn-danger"> Reset </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>