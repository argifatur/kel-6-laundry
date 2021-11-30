<?php

$title = "Data Kategori Paket";
include ("layout/sidebar.php");

$show = mysqli_query($conn, "SELECT * FROM kategoripaket");

?>

<div class="info2">
  <h2 class="" style="padding-bottom: 15px; border-bottom: 1px solid #d2d2d2; margin-bottom: 20px;" >Kategori Paket</h2>
  <a href="tambah_kategoripaket.php" class="btn btn-primary" style="margin-bottom: 15px !important"><span class="fas fa-fw fa-plus"></span> Kategori Paket</a>
  <table class="content-table" id="datatables" style="width: 100%;">
    <thead>
     <tr>
      <td>No</td>
      <td>Nama</td>
      <td width="19%">Aksi</td>
  </tr>
</thead>
<tbody>
    <?php $no = 1;
    while($s = mysqli_fetch_array($show)) {
     ?>
     <tr>
        <td><?= $no++; ?></td>
        <td><?= $s['nama_kategori']; ?></td>
        <td>
            <a title="Ubah" href="edit_kategoripaket.php?id=<?= $s['id_kategori']; ?>" class="btn btn-warning"><span class="fas fa-fw fa-pen"></span> Edit</a> 
            <a title="Hapus" href="hapus_kategoripaket.php?id=<?= $s['id_kategori']; ?>" onclick="return confirm('Yakin ingin Menghapus Kategori Dengan Nama : \n<?php echo $s['nama_kategori'];?>');" class="btn btn-danger"><span class="fas fa-fw fa-trash"></span> Hapus</a>
        </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>


<?php include 'layout/script.php' ?>