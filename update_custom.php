<?php 
session_start();

include 'koneksi.php';

//cobaaddproduk
if(isset($_POST['belicustom'])){
	$nama="Custom";
	$total=0;
	$filename='custom.png';
	$harga=0;

	$ambila = $koneksi->query("SELECT * FROM shape where id_shape = '$_POST[shape]'");
	$ambilb = $koneksi->query("SELECT * FROM size where id_size = '$_POST[size]'");
	$ambilc = $koneksi->query("SELECT * FROM flavor where id_flavor = '$_POST[flavor]'");
	$ambild = $koneksi->query("SELECT * FROM icing where id_icing = '$_POST[icing]'");
	while ($perproduk = $ambila->fetch_assoc()){
		$total += $perproduk['harga_shape'];
		$harga+=$perproduk['harga_shape'];
	}
	while ($perproduk = $ambilb->fetch_assoc()){
		$total += $perproduk['harga_size'];
		$harga+=$perproduk['harga_size'];
	}
	while ($perproduk = $ambilc->fetch_assoc()){
		$total += $perproduk['harga_flavor'];
		$harga+=$perproduk['harga_flavor'];
	}
	while ($perproduk = $ambild->fetch_assoc()){
		$total += $perproduk['harga_icing'];
		$harga+=$perproduk['harga_icing'];
	}

	$koneksi->query("INSERT INTO produk (id_produk, nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk, id_kategori) VALUES (null, '$nama', '$total', 0, '$filename', 0, 0)");

	$idproduk = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 1");
	while($pecah = $idproduk->fetch_assoc()){
		$idcustom = $pecah['id_produk'];
	}

	$subtotal = $harga * $_POST['jumlahcustom'];
	$koneksi->query("INSERT INTO keranjang (id_produk, jumlah, subtotal, harga) VALUES ($idcustom, $_POST[jumlahcustom] , $subtotal, $harga)");

	echo "<script> alert('Added to cart'); </script>";
	echo "<script> location='keranjang_produk.php'; </script>";
}

?>