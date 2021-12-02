<?php

$title = "Tambah Kategori Paket";
include ("layout/sidebar.php");

if(isset($_POST['add'])) {
    $nama = $_POST['nama'];

    $sql = mysqli_query($conn, "INSERT INTO kategoripaket VALUES('','$nama')");
    
  if($conn) {
    echo "<script language='javascript'>(window.alert('Data Kategori Paket Berhasil Ditambahkan'))</script>";
    echo "<script>location='kategoripaket.php';</script>";
  } else {
    echo "<script language='javascript'>(window.alert('Data Kategori Paket Gagal Ditambahkan'))</script>";
    echo "<script>location='tambah_kategoripaket.php';</script>";
  }
}

?>  

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Tambah Kategori Paket Paket</h2>

    <div  class="form-group">
      <label>Nama Kategori Paket :</label>
      <input required="required" type="text" name="nama" class="form-control form-control-user" placeholder="Nama Kategori" autocomplete="off">
    </div>

    <div class="right">
      <a href="kategoripaket.php" class="btn btn-warning">Kembali</a>
      <input type="submit" name="add" value="Tambah Kategori" class="btn btn-primary" >
    </div>

  </form>
</div>


<?php include 'layout/script.php' ?>