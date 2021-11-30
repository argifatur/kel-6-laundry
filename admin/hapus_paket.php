<?php

require '../conn.php';

$id = $_GET['id'];
$hps = mysqli_query($conn, "DELETE FROM paket WHERE id_paket = '$id'");

if($hps) {
    echo "<script language='javascript'>(window.alert('Data Paket Berhasil Dihapus'))</script>";
	echo "<script>location='paket.php';</script>";
} else {
    echo "<script language='javascript'>(window.alert('Data Paket Sedang Digunakan'))</script>";
	echo "<script>location='paket.php';</script>";
}

?>