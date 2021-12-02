<?php

$title = "Tambah Transaksi";
include 'layout/sidebar.php';

$show = mysqli_query($conn, "SELECT * FROM transaksi JOIN member ON member.id_member = transaksi.id_member JOIN detail_transaksi ON detail_transaksi.kode_transaksi = transaksi.kode_transaksi JOIN paket ON paket.id_paket = detail_transaksi.id_paket");
$show2 = mysqli_query($conn, "SELECT * FROM member");
$show3 = mysqli_query($conn, "SELECT * FROM paket");

$sa = mysqli_query($conn, "SELECT MAX(kode_transaksi) AS kode FROM transaksi");
$data = mysqli_fetch_array($sa);
$urutan = (int) substr($data['kode'], 3, 3);
 

$urutan++;
$huruf = "TRX";
$kodeTrx = $huruf . sprintf("%03s", $urutan);

if(isset($_POST['add'])) {
    $id = $_SESSION['id'];
    $member = $_POST['member'];
    $terima = $_POST['terima'];
    $selesai = $_POST['selesai'];
    $total = $_POST['total'];
    $paket = $_POST['paket'];
    $qty = $_POST['qty'];
    $pembayaran = $_POST['pembayaran'];
    

    $sql = mysqli_query($conn, "INSERT INTO transaksi VALUES('$kodeTrx','$member','$id','$terima','$selesai','','$total','','proses','lunas')");
    if($sql) {
        $v = mysqli_insert_id($conn);
        $sql2 = mysqli_query($conn, "INSERT INTO detail_transaksi VALUES('', '$kodeTrx', '$paket', '$qty')");
        if($sql2) {

            echo "<script language='javascript'>(window.alert('Data Transaksi Berhasil Ditambahkan'))</script>";
            echo $id;
            echo "<script>location='transaksi.php';</script>";

        }
    } else {
        echo "<script language='javascript'>(window.alert('Data Transaksi Gagal Ditambahkan'))</script>";
        echo "<script>location='tambah_transaksi.php';</script>";
    }
}

?>


<div class="info">
  <form method="POST" action="">
    <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Tambah Transaksi</h2>
    <div  class="form-group">
      <label>Nota :</label>
      <input required="required" type="text" name="nota" class="form-control form-control-user" placeholder="Nota" readonly value="<?= $kodeTrx; ?>">
  </div>

  <div class="form-group">
      <label>Member :</label>
      <select required="required" name="member" class="form-control form-control-user" placeholder="Member">
       <?php while($sh = mysqli_fetch_array($show2)) { ?>
        <option value="<?= $sh['id_member']; ?>"><?= $sh['nama_member']; ?></option>
    <?php } ?>
</select>
</div>

<div class="form-group">
   <label>Tanggal Terima :</label>
   <input type="date" name="terima" class="form-control form-control-user" placeholder="Tanggal Terima">
</div>

<div  class="form-group">
   <label>Tanggal Selesai :</label>
   <input type="date" name="selesai" class="form-control form-control-user" placeholder="Tanggal Selesai">
</div>

<div class="form-group">
   <label>Paket :</label>
   <select required="required" name="paket" id="paket" class="form-control form-control-user" placeholder="Paket">
    <option value="">Pilih Paket</option>
    <?php while($sh = mysqli_fetch_array($show3)) { ?>
        <option value="<?= $sh['id_paket']; ?>"><?= $sh['nama_paket']; ?></option>
    <?php } ?>
</select>
</div>
<div class="form-group">
    <label>Harga :</label>
    <input required="required" type="number" name="harga" readonly id="harga" class="form-control form-control-user" placeholder="Harga Paket">
</div>
<div class="form-group">
    <label>QTY :</label>
    <input required="required" type="number" name="qty" id="qty" class="form-control form-control-user" placeholder="QTY">
</div>

<div  class="form-group">
    <label>Total :</label>
    <input required="required" type="number" name="total" readonly value="0" id="total" class="form-control form-control-user" placeholder="Pajak">
</div>
<div  class="form-group">
 <label>Pembayaran :</label>
 <select required="required" name="pembayaran" id="paket" class="form-control form-control-user" placeholder="Status">
     <option value="lunas">Lunas</option>
     <option value="belum lunas">Belum Lunas</option>
 </div>
 <select nam id=""></select>

 <div class="right">
  <a href="transaksi.php" class="btn btn-warning">Kembali</a> 
  <input type="submit" name="add" value="Tambah Transaksi" class="btn btn-primary">
</div>

</form>
</div>
</div>
<?php include 'layout/script.php' ?>

<script>
    $(document).ready(function(){
        $('#paket').change(function(){
            var id = $(this).val();
            $.ajax({
                url: 'ajax.php',
                dataType: 'json',
                type: 'POST',
                data:{id:id},
            })
            .done(function(data){
                var harga = data.harga;
                $('#harga').val(harga);
            })
            .fail(function(){
                console.log('gagal');
            })
        });
        $('#qty').change(function(){
            var qty = $(this).val();
            var harga = $('#harga').val();
            var sum = Math.round(Number(harga)*Number(qty));
            $('#total').val(sum);
        })
    })
</script>