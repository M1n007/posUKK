<?php
require_once 'header.php';
include '../configuration/konek.php';
error_reporting(0);
?>


<br>
<br>

<div class="container">
  <div class="card card-default">
    <div class="card-heading">
      <center><font class="alert alert-primary card card-title" size="6"><b>Menu Transaksi</b></font></center>
    </div>
    <div class="card-body">

      <form action="" method="get" class="col-md-6">
        <label>ID :</label>
        <input type="text" name="cari" placeholder="cari berdasarkan id...">
        <input type="submit" value="Cari">
      </form>
      <?php
      $cari = $_GET['cari'];
      if ($cari != '') {
      $query = mysqli_query($konek, "select * from barang where id like '".$cari."'");
      }
      if (mysqli_num_rows($query)) {
        while ($tam = mysqli_fetch_array($query)) {

      ?>
      <br>

      <form action="" method="post" class="col-md-4">
        <label>Nama Item :</label>
        <input type="text" name="namabrg" value="<?php echo $tam['1'] ?>" class="form-control" readonly>
        <label>Harga Item(Rp) :</label>
        <input type="text" name="hargabrg" value="<?php echo $tam['2'] ?>" class="form-control" readonly>
        <label>Stok Item :</label>
        <input type="number" name="stokbrg" value="<?php echo $tam['3'] ?>" class="form-control" readonly>
        <label>Jumlah Item :</label>
        <input type="number" name="hargabrg" class="form-control"><br>
        <input type="submit" name="add" value="Tambah" class="btn btn-default">
        <input type="submit" name="langsung" value="Langsung Bayar" class="btn btn-success">
      </form>
      <?php
        }
        }else{
          ?><form class="col-md-4">
            <label>Nama Item :</label>
            <input type="text" name="namabrg" value="<?php echo $tam['1'] ?>" class="form-control" readonly>
            <label>Harga Item(Rp) :</label>
            <input type="text" name="hargabrg" value="<?php echo $tam['2'] ?>" class="form-control" readonly>
            <label>Stok Item :</label>
            <input type="number" name="stokbrg" value="<?php echo $tam['3'] ?>" class="form-control" readonly>
            <label>Jumlah Item :</label>
            <input type="number" name="hargabrg" class="form-control"><br>
            <input type="submit" name="add" value="Tambah" class="btn btn-default">
            <input type="submit" name="langsung" value="Langsung Bayar" class="btn btn-success">
          </form>
          <?php
      }

      ?>
    </div>
  </div>
  <br>
  <div class="col-md-10">
    <a href="index.php"><button class="btn btn-primary">Kembali ke home page</button></a> |
    <a href="transaksi.php"><button class="btn btn-primary">Refresh this page</button></a>
  </div>
</div>


<?php require_once 'footer.php'; ?>
