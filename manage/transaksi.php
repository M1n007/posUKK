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
  <?php
    if (isset($_POST['add'])) {
      $nama_item = $_POST['namabrg'];
      $harga_satuan = $_POST['hargabrg'];
      $jumlah_item = $_POST['jumlahbrg'];
      $total_harga_item = $_POST['totalbrg'];

      $keranjang = mysqli_query($konek, "insert into harga(nama_item,harga_satuan,jumlah_item,total_harga_item)values('$nama_item','$harga_satuan','$jumlah_item','$total_harga_item')");

      if ($keranjang) {
        ?><font class="alert alert-success card card-title"><b>Sukses Menambahkan keranjang!!</b></font>
        <?php
      }else{
        ?><font class="alert alert-danger card card-title"><b>Gagal menambahkan keranjang</b></font>
        <?php
      }
    }
   ?>
  <br>
  <div class="card card-default">
    <div class="card-heading">
      <center><font class="alert alert-primary card card-title" size="6"><b>Menu Transaksi <br>Hy <font class="alert alert-success"><?php echo $_SESSION['username']; ?></font></b></font></center>
    </div>
    <div class="card-body">
      <div class="row justify-content-start">
        <div class="col-5">
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
                  <span class="input-group-addon"><strong>Rp</strong></span><input type="text" id="hargabrg" onfocus="startHitung()" onblur="rampungHitung()" name="hargabrg" value="<?php echo $tam['2'] ?>" class="form-control" readonly>
                </div>
                <label>Stok Item :</label>
                <input type="number" name="stokbrg" value="<?php echo $tam['3'] ?>" class="form-control" readonly>
                <label>Jumlah Item :</label>
                <input type="number" id="jumlahbrg" onfocus="startHitung()" onblur="rampungHitung()" name="jumlahbrg" class="form-control">
                <label>Total Harga :</label>
                <div class="input-group">
                  <span class="input-group-addon"><strong>Rp</strong></span><input type="text" onfocus="startKembali()" onblur="rampungKembali()" name="totalbrg" id="totalbrg" name="totalbrg" class="form-control" readonly>
                </div>
                <label>Jumlah Uang Yang Dibayarkan :</label>
                <div class="input-group">
                  <span class="input-group-addon"><strong>Rp</strong></span><input type="text" onfocus="startKembali()" onblur="rampungKembali()" id="duitbrg" name="duitbrg" class="form-control">
                </div>
                <label>Kembalian :</label>
                <div class="input-group">
                  <span class="input-group-addon"><strong>Rp</strong></span><input type="text" id="kembalibrg" name="kembalibrg" class="form-control"><br>
                </div>
                <br>
                <input type="submit" name="langsung" value="cetak" class="btn btn-success">
                <input type="submit" name="add" value="masukan keranjang" class="btn btn-primary">
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


        <div class="col-7">
          <?php
          if (isset($_GET['hapus'])) {
            $hapus = "delete from harga where id=".$_GET['hapus'];
            $hapus1 = $konek->query($hapus);
            if ($hapus1) {
              ?><font class="alert alert-success card card-title"><b>Hapus Data Berhasil!!<b></font>
              <?php
            }else{
              ?><font class="alert alert-danger card card-title"><b>Hapus Data Gagal!!<b></font>
              <?php
            }
          }
           ?>
              <form action="" method="get">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th colspan="2">Nama Item</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah Item</th>
                      <th>Total Harga</th>
                    </tr>
                  </thead>
                  <?php
                  $keranjangtam = mysqli_query($konek, "select * from harga");{
                    while ($keranjangtam1 = mysqli_fetch_array($keranjangtam)) {
                      @$no++;
                   ?>
                  <tbody>
                    <tr>
                      <td colspan="2"><?php echo $keranjangtam1['1']; ?></td>
                      <td><span class="input-group-addon"><strong>Rp<?php echo $keranjangtam1['2']; ?></strong></span></td>
                      <td><?php echo $keranjangtam1['3']; ?></td>
                      <td><span class="input-group-addon"><strong>Rp<font name="totalhrgkeranjang" title="jumlah harga Rp<?php echo $keranjangtam1['4']; ?>"><?php echo $keranjangtam1['4']; ?></font></strong></span></td>
                      <td colspan="3"><a href="?hapus=<?php echo $keranjangtam1['0']; ?>" class="">Remove</a></td>
                    </tr>
                  </tbody>
                  <?php
                    }
                  }
                   ?>
                   <thead>
                     <tr>
                       <?php
                        //tahap nyesek
                        ?>
                       <th colspan="4">Total Semua Harga</th>
                       <td colspan="2"><span class="input-group-addon"><b>Rp</b><strong><font name="totalsemua" onfocus="readyHitung()" onblur="endHitung()" class="form-control" type="text"></font></strong></span></td>
                     </tr>
                   </thead>
                </table>
              </form>
            </div>

        </div>
      </div>
  </div>
  <br>
</div>
<?php require_once 'footer.php'; ?>
