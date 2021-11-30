<?php

$title = "Edit Kategori Paket";
include 'layout/sidebar.php';

$id = $_GET['id'];
$sho = mysqli_query($conn, "SELECT * FROM kategoripaket WHERE id_kategori = '$id'");
$show = mysqli_fetch_array($sho);

if(isset($_POST['add'])) {
    $nama = $_POST['nama'];

    $sql = mysqli_query($conn, "UPDATE kategoripaket SET nama_kategori = '$nama' WHERE id_kategori = '$id'");
    if($sql) {
        echo "<script language='javascript'>(window.alert('Data Kategori Berhasil Diubah'))</script>";
        echo "<script>location='kategoripaket.php';</script>";
    } else {
        echo "<script language='javascript'>(window.alert('Data Kategori Gagal Diubah'))</script>";
        echo "<script>location='edit_kategoripaket.php';</script>";
    }
}

?>

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Edit Kategori Paket</h2>

    <div  class="form-group">
      <label>Nama Kategori Paket :</label>
      <input required="required" type="text" name="nama" class="form-control form-control-user" placeholder="Nama Kategori" value="<?= $show['nama_kategori']; ?>" autocomplete="off">
  </div>

  <div class="right">
    <a href="kategoripaket.php" class="btn btn-warning" style="margin-top: 10px;">Kembali</a>
    <input type="submit" name="add" value="Edit Kategori" class="btn btn-primary btn-user btn-block" style="margin-top: 10px; margin-right: 5px;">
</div>

</form>
</div>

<?php include 'layout/script.php' ?>