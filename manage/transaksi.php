<?php
#
#Thanks To SMK Muhammadiyah Majenang
#
require_once 'header.php';
include '../configuration/konek.php';
error_reporting(0);
session_start();
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
      <center><font class="alert alert-primary card card-title" size="6"><b>Menu Transaksi <br>Hy <font class="alert alert-success"><?php echo $_SESSION['username']; ?></font></b></font></center>
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

              <form action="" method="post" name="harga">
                <label>Nama Item :</label>
                <input type="text" name="namabrg" value="<?php echo $tam['1'] ?>" class="form-control" readonly>
                <label>Harga Item(Rp) :</label>
                <div class="input-group">
                  <span class="input-group-addon"><strong>Rp</strong></span><input type="text" id="hargabrg" name="hargabrg" value="<?php echo $tam['2'] ?>" class="form-control" readonly>
                </div>
                <label>Stok Item :</label>
                <input type="number" name="stokbrg" value="<?php echo $tam['3'] ?>" class="form-control" readonly>
              </form>
              <?php
                }
                }else{
                  ?><form action="" method="post">
                    <label>Nama Item :</label>
                    <input type="text" value="<?php echo "Belum ada data silahkan cari melalui id diatas" ?>" class="form-control" readonly>
                    <label>Harga Item(Rp) :</label>
                    <div class="input-group">
                      <span class="input-group-addon"><strong>Rp</strong></span><input type="text" value="0" class="form-control" readonly>
                    </div>
                    <label>Stok Item :</label>
                    <input type="number" value="<?php echo "0" ?>" class="form-control" readonly>
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
              <form action="" method="post" name="total">
                <label>Jumlah Item :</label>
                <input type="number" id="jumlahbrg" name="jumlahbrg" class="form-control">
                <label>Total Harga :</label>
                <div class="input-group">
                  <span class="input-group-addon"><strong>Rp</strong></span><input type="text" id="totalbrg" value="<?php echo $quer; ?>" name="totalbrg" class="form-control" readonly>
                </div>
                <label>Jumlah Uang Yang Dibayarkan :</label>
                <div class="input-group">
                  <span class="input-group-addon"><strong>Rp</strong></span><input type="text" name="duitbrg" class="form-control">
                </div>
                <label>Kembalian :</label>
                <div class="input-group">
                  <span class="input-group-addon"><strong>Rp</strong></span><input type="text" name="kembalibrg" class="form-control"><br>
                </div>
                <br>
                <input type="submit" name="langsung" value="cetak" class="btn btn-success">
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
