<?php

require '../conn.php';

$id = $_GET['id'];
$hps = mysqli_query($conn, "DELETE FROM kategoripaket WHERE id_kategori = '$id'");

if($hps) {
	echo "<script language='javascript'>(window.alert('Data Kategori Paket Telah Dihapus'))</script>";
	echo "<script>location='kategoripaket.php';</script>";
} else {
	echo "<script language='javascript'>(window.alert('Data Kategori Paket Sedang Digunakan'))</script>";
	echo "<script>location='kategoripaket.php';</script>";
}

?>