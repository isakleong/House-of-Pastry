<?php 
session_start();
if(empty($_SESSION['admin'])){
	header("location:login.php");
}

include 'koneksi.php';

$koneksi->query("DELETE from shape where id_shape='$_GET[id]'");

echo "<script> alert('Shape Terhapus!'); </script>";
echo "<script> location='admin_shape.php'; </script>";
?>