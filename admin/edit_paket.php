<?php

$title = "Edit Paket";
include ("layout/sidebar.php");

$id = $_GET['id'];
$sho = mysqli_query($conn, "SELECT * FROM paket WHERE id_paket = '$id'");
$show = mysqli_fetch_array($sho);
$show2 = mysqli_query($conn, "SELECT * FROM kategoripaket");

if(isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $kategoripaket = $_POST['kategoripaket'];
    $harga = $_POST['harga'];

    $sql = mysqli_query($conn, "UPDATE paket SET nama_paket = '$nama', harga = '$harga', id_kategori = '$kategoripaket' WHERE id_paket = '$id'");
    if($sql) {
        echo "<script language='javascript'>(window.alert('Data Paket Berhasil Diubah'))</script>";
        echo "<script>location='paket.php';</script>";
    } else {
        echo "<script language='javascript'>(window.alert('Data Paket Gagal Diubah'))</script>";
        echo "<script>location='edit_paket.php?id=$id';</script>";
    }
}

?>  

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Edit Paket</h2>
    <div  class="form-group">
      <label>Nama Paket :</label>
      <input required="required" type="text" name="nama" class="form-control form-control-user" placeholder="Nama Paket" value="<?= $show['nama_paket']; ?>" autocomplete="off">
  </div>
  <div class="form-group">
      <label>Kategori Paket :</label>
      <select required="required" name="kategoripaket" class="form-control form-control-user" placeholder="Level">
         <?php while($sh = mysqli_fetch_array($show2)) { ?>
            <option value="<?= $sh['id_kategori']; ?>"><?= $sh['nama_kategori']; ?></option>
        <?php } ?>
    </select>
</div>
<div  class="form-group">
    <label>Harga Paket :</label>
    <input required="required" type="number" name="harga" class="form-control form-control-user" placeholder="Harga Paket" value="<?= $show['harga']; ?>" autocomplete="off">
</div>

<div class="right">
  <a href="paket.php" class="btn btn-warning">Kembali</a>
  <input type="submit" name="add" value="Edit Paket" class="btn btn-primary">
</div>

</form>
</div>


<?php include 'layout/script.php' ?>