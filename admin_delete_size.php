<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

include 'koneksi.php';

$koneksi->query("DELETE from size where id_size='$_GET[id]'");

echo "<script> alert('Size Terhapus!'); </script>";
echo "<script> location='admin_size.php'; </script>";
?>