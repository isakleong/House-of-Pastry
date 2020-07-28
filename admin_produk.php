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
	<title> Admin Produk | House of Pastry </title>
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
	<h2 style="text-align: center"> Data Produk </h2>
	<hr>
	<br>

	<table class=" table table-bordered text-center" id="datatables">
		<thead>
			<tr>
				<th> No </th>
				<th> Nama </th>
				<th> Harga </th>
				<th> Size </th>
				<th> Kategori </th>
				<th> Rating </th>
				<th> Foto </th>
				<th> Update </th>
				<th> Delete </th>
			</tr>
		</thead>


		<tbody>
			<?php $nomor = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM produk join kategori on produk.id_kategori=kategori.id_kategori;"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
				<tr>
					<td> <?php echo $nomor; ?> </td>
					<td> <?php echo $pecah['nama_produk'] ?> </td>
					<td> Rp. <?php echo number_format($pecah['harga_produk']); ?> </td>
					<td> <?php echo $pecah['berat_produk'] ?> </td>
					<td> <?php echo $pecah['nama_kategori'] ?> </td>
					<td> <?php echo $pecah['rating'] ?> </td>
					<td> 
						<img src="foto_produk/<?php echo $pecah['foto_produk'] ?>" width="100">  
					</td>
					<td> <a href="admin_update_produk.php?id=<?php echo $pecah['id_produk']; ?>"> <button class="btn btn-lg btn-success" data-target="update"><i class="fa fa-edit"></i> </button> </a> </td>

					<td> <a href="admin_delete_produk.php?id=<?php echo $pecah['id_produk']; ?>"> <button class="btn btn-lg btn-danger" onClick="return confirm('Are You Sure ?')"> <i class="fa fa-trash"> </i></button></a> </td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>
			<tfoot>
				<tr>
					<th colspan="9"><button class="btn btn-primary" data-toggle="modal" data-target="#produk"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Produk </button> </th>
				</tr>
				<tr>
					<th colspan="9"><a href="pdf_data_produk.php" class="btn btn-danger"><i class="fa fa-print" aria-hidden="true"></i> Cetak PDF </a> </th>
				</tr>
				<tr>
					<th colspan="9"><a href="excel_produk.php" class="btn btn-outline-dark"><i class="fa fa-print" aria-hidden="true"></i> Export Excel </a> </th>
				</tr>
			</tfoot> 
		</tbody>
	</table>

	<!-- Form produk -->
	<div id="produk" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"> Tambah Produk </h4>
					<button class="close" data-dismiss="modal"> x </button>
				</div>
				<form method="post" action="admin_upload_produk.php" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label> Nama </label>
							<input type="text" class="form-control" name="nama" required>
						</div>
						<div class="form-group">
							<label> Harga (Rp) </label>
							<input type="number" class="form-control" name="harga" required>
						</div>
						<div class="form-group">
							<label> Size </label>
							<input type="text" class="form-control" name="berat" required>
						</div>
						<div class="form-group">
							<label> Kategori </label>
							<select name="kategori" class="form-control" required>
								<?php $ambil = $koneksi->query("SELECT * FROM kategori;"); ?>
								<?php while($pecah = $ambil->fetch_assoc()) { ?>
									<option value="<?php echo $pecah['id_kategori'] ?>"> <?php echo $pecah['nama_kategori']?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label> Rating </label>
							<input type="number" class="form-control" name="rating" min="1" max="5" required>
						</div>
						<div class="form-group">
							<label> Deskripsi </label>
							<textarea class="form-control" name="deskripsi" rows="10" required></textarea>
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