<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

include 'koneksi.php';

$koneksi->query("DELETE from flavor where id_flavor='$_GET[id]'");

echo "<script> alert('Flavor Terhapus!'); </script>";
echo "<script> location='admin_flavor.php'; </script>";
?>