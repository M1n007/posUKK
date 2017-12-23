<?php
#
#Thanks To SMK Muhammadiyah Majenang
#
require_once 'header.php';
include '../configuration/konek.php';
error_reporting(0);
?>


<br>
<br>

<div class="container">
  <div class="col-md-10">
    <a href="index.php"><button class="btn btn-primary">Kembali ke home page</button></a> |
    <a href="transaksi.php"><button class="btn btn-primary">Refresh this page</button></a>
  </div>
  <br>
  <div class="card card-default">
    <div class="card-heading">
      <center><font class="alert alert-primary card card-title" size="6"><b>Menu Transaksi</b></font></center>
    </div>
    <div class="card-body">
      <div class="row justify-content-start">
        <div class="col-7">
          <div class="card card-primary">
            <div class="card card-body">
              <form action="" method="get">
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

              <form action="" method="post">
                <label>Nama Item :</label>
                <input type="text" name="namabrg" value="<?php echo $tam['1'] ?>" class="form-control" readonly>
                <label>Harga Item(Rp) :</label>
                <input type="text" id="harga" name="hargabrg" value="<?php echo 'Rp' . $tam['2'] ?>" class="form-control" readonly>
                <label>Stok Item :</label>
                <input type="number" name="stokbrg" value="<?php echo $tam['3'] ?>" class="form-control" readonly>
              </form>
              <?php
                }
                }else{
                  ?><form action="" method="post">
                    <label>Nama Item :</label>
                    <input type="text" name="namabrg" value="<?php echo $tam['1'] ?>" class="form-control" readonly>
                    <label>Harga Item(Rp) :</label>
                    <input type="text" id="harga" name="hargabrg" value="<?php echo $tam['2'] ?>" class="form-control" readonly>
                    <label>Stok Item :</label>
                    <input type="number" name="stokbrg" value="<?php echo $tam['3'] ?>" class="form-control" readonly>
                  </form>
                  <?php
              }

              ?>
            </div>
          </div>
        </div>

        <div class="col-5">
          <div class="card card-primary">
            <div class="card card-body">
              <form action="" method="post">
                <label>Jumlah Item :</label>
                <input type="number" id="jumlahitem" name="jumlahbrg" class="form-control">
                <label>Total Harga :</label>
                <input type="text" id="totalharga" name="totalbrg" class="form-control" readonly>
                <label>Jumlah Uang Yang Dibayarkan :</label>
                <input type="number" name="duitbrg" class="form-control">
                <label>Kembalian :</label>
                <input type="number" name="kembalibrg" class="form-control"><br>
                <input type="submit" name="langsung" value="Bayar" class="btn btn-success">
              </form>
            </div>
          </div>
        </div>

        </div>
      </div>
  </div>
  <br>
</div>


<?php require_once 'footer.php'; ?>
