<?php
require_once 'header.php';
include '../configuration/konek.php';
?>

<div class="container">
<br>
  <div class="row">
    <div class="col-md-4">
      <a href="index.php"><button class="btn btn-primary">Kembali ke home page</button></a><br><br>
      <a href="barang.php"><button class="btn btn-primary">Refresh this page</button></a>
    </div>
    <div class="col-md-4">
        <?php

        if (isset($_POST['tambah'])) {
          $nama1 = $_POST['namabrg'];
          $harga1 = $_POST['hargabrg'];
          $stok1 = $_POST['stokbrg'];
          $query = mysqli_query($konek, "insert into barang(namabrg, hargabrg, stokbrg)values('$nama1', '$harga1', '$stok1')");
          if ($query) {
            ?><font class="alert alert-success card card-title"><b>Tambah Data Berhasil!!<b></font>
            <?php
          }else{
            ?><font class="alert alert-danger card card-title"><b>Tambah Data Gagal!!<b></font>
            <?php
          }
        }

        //edit data
        if (isset($_GET['edit'])) {
          $tampil = $konek->query("select * from barang where id=".$_GET['edit']);
          $tam = $tampil->fetch_array(MYSQLI_BOTH);
        }
        if (isset($_POST['update'])) {
          $nama = $_POST['namabrg'];
          $harga = $_POST['hargabrg'];
          $stok = $_POST['stokbrg'];
          $update = "update barang set namabrg='$nama', hargabrg='$harga', stokbrg='$stok' where id=".$_GET['edit'];
          $update1 = $konek->query($update);
          if ($update1) {
            ?><font class="alert alert-success card card-title"><b>Update Data Berhasil!!<b></font>
              <?php
          }else{
            ?><font class="alert alert-danger card card-title"><b>Update Data Gagal!!<b></font>
            <?php
          }
        }
        ?>
        <center><font class="alert alert-warning card card-title"><b>Silahkan Tambah/merubah data Barang<b></font></center>
        <form action="" method="post">
          <label>Nama Item :</label>
          <input type="text" name="namabrg" value="<?php if(isset($_GET['edit'])){ echo $tam['1']; } ?>" class="form-control" placeholder="masukan nama barang"><br>
          <label>Harga Item :</label>
          <input type="text" name="hargabrg" value="<?php if(isset($_GET['edit'])){ echo $tam['2']; } ?>" class="form-control" placeholder="masukan harga"><br>
          <label>Stok Item :</label>
          <input type="number" name="stokbrg" value="<?php if(isset($_GET['edit'])){ echo $tam['3']; } ?>" class="form-control" placeholder="masukan stok barang"><br>
          <?php
            if (isset($_GET['edit'])) {
              ?><button name="update" class="btn btn-primary">Update Data</button>
              <?php
            }else{
              ?><button name="tambah" class="btn btn-primary">Tambah Data</button>
              <?php
            }
          ?>
        </form>
    </div>
  </div>
  <div class="col-md-4"></div>
</div>

<br>
<div class="container-fluid">
  <div class="col-md-12">
    <center><font class="alert alert-info card card-title"><b>List Data Barang<b></font></center>
    <br>
    <?php
    //hapus Data
    if (isset($_GET['hapus'])) {
      $hapus = "delete from barang where id=".$_GET['hapus'];
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
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Stok</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $query = mysqli_query($konek, "select * from barang");{
        while ($r = mysqli_fetch_array($query)) {
         ?>
        <tbody>
          <tr>
            <td><?php echo $r['0']; ?></td>
            <td><?php echo $r['1']; ?></td>
            <td>Rp.<?php echo $r['2']; ?>,00</td>
            <td><?php echo $r['3']; ?></td>
            <td>
              <a href="?edit=<?php echo $r['0'] ?>" class="btn btn-success">Edit</a>
              <a href="?hapus=<?php echo $r['0'] ?>" class="btn btn-success">Hapus</a>
            </td>
          </tr>
        </tbody>
      <?php } } ?>
      </table>
    </form>
  </div>
</div>

<?php require_once 'footer.php'; ?>
