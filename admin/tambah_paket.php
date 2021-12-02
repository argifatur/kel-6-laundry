<?php

$title = "Tambah Paket";
include ("layout/sidebar.php");

$show = mysqli_query($conn, "SELECT * FROM paket JOIN kategoripaket ON kategoripaket.id_kategori = paket.id_kategori");
$show2 = mysqli_query($conn, "SELECT * FROM kategoripaket");

if(isset($_POST['add'])) {
  $nama = $_POST['nama'];
  $kategoripaket = $_POST['kategoripaket'];
  $harga = $_POST['harga'];

  $sql = mysqli_query($conn, "INSERT INTO paket VALUES('','$nama','$harga','$kategoripaket')");
  if($sql) {
    echo "<script language='javascript'>(window.alert('Data Paket Berhasil Ditambahkan'))</script>";
    echo "<script>location='paket.php';</script>";
  } else {
    echo "<script language='javascript'>(window.alert('Data Paket Gagal Ditambahkan'))</script>";
    echo "<script>location='tambah_paket.php';</script>";
  }
}

?>  

<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Tambah Paket</h2>
    <div  class="form-group">
      <label>Nama Paket :</label>
      <input required="required" type="text" name="nama" class="form-control form-control-user" placeholder="Nama Paket" autocomplete="off">
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
    <input required="required" type="number" name="harga" class="form-control form-control-user" placeholder="Harga Paket" autocomplete="off">
  </div>

<div class="right">
  <a href="paket.php" class="btn btn-warning">Kembali</a>
  <input type="submit" name="add" value="Tambah Paket" class="btn btn-primary">
</div>

</form>
</div>


<?php include 'layout/script.php' ?>