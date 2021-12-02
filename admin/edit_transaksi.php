<?php

$title = "Edit Transaksi";
include 'layout/sidebar.php';

$id = $_GET['id'];
$sho = mysqli_query($conn, "SELECT * FROM transaksi WHERE kode_transaksi = '$id'");
$show = mysqli_fetch_array($sho);

if(isset($_POST['add'])) {
    $status = $_POST['pembayaran'];

    $sql = mysqli_query($conn, "UPDATE transaksi SET lunas = '$status' WHERE kode_transaksi = '$id'");
    if($sql) {
        echo "<script language='javascript'>(window.alert('Data Transaksi Berhasil Diubah'))</script>";
      echo "<script>location='transaksi.php';</script>";
  } else {
    echo 'gagal';
      echo "<script language='javascript'>(window.alert('Data Transaksi Gagal Diubah'))</script>";
      echo "<script>location='edit_transaksi.php';</script>";
}
}

?>
<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Edit Transaksi</h2>

    <div class="form-group">
      <label>Status :</label>
      <select name="pembayaran" required="required" class="form-control form-control-user" placeholder="Member">
        <option value="lunas"<?php if($show["lunas"] == 'lunas') echo "selected";?>>Lunas</option>
        <option value="belum lunas"<?php if($show["lunas"] == 'belum lunas') echo "selected";?>>Belum Lunas</option>
    </select>
</select>
</div>

<div class="right">
  <a href="transaksi.php" class="btn btn-warning" >Kembali</a>
  <input type="submit" name="add" value="Edit Transaksi" class="btn btn-primary">
</div>

</form>
</div>

<?php include 'layout/script.php' ?>