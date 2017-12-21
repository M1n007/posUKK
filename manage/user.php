<?php
require_once 'header.php';
include '../configuration/konek.php';
?>

<div class="container">
<br>
  <div class="row">
    <div class="col-md-4">
      <a href="index.php"><button class="btn btn-primary">Kembali</button></a>
    </div>
    <div class="col-md-4">
        <?php

        if (isset($_POST['tambah'])) {
          $user = $_POST['useradd'];
          $pass = $_POST['passadd'];
          $query = mysqli_query($konek, "insert into user(username, password)values('$user', '$pass')");
          if ($query) {
            ?><font class="alert alert-success card card-title"><b>Tambah Data Berhasil!!<b></font>
            <?php
          }else{
            ?><font class="alert alert-dangercard card-title"><b>Tambah Data Gagal!!<b></font>
            <?php
          }
        }

        //edit data
        if (isset($_GET['edit'])) {
          $tampil = $konek->query("select * from user where id=".$_GET['edit']);
          $tam = $tampil->fetch_array(MYSQLI_BOTH);
        }
        if (isset($_POST['update'])) {
          $user1 = $_POST['useradd'];
          $pass1 = $_POST['passadd'];
          $update = "update user set username='$user1', password='$pass1' where id=".$_GET['edit'];
          $update1 = $konek->query($update);
          if ($update1) {
            echo "update data berhasil!!";
          }else{
            echo "gagal update data!!";
          }
        }
        ?>
        <center><font class="alert alert-warning card card-title"><b>Silahkan Tambah/merubah data user<b></font></center>
        <form action="" method="post">
          <label>username :</label>
          <input type="text" name="useradd" value="<?php if(isset($_GET['edit'])){ echo $tam['1']; } ?>" class="form-control" placeholder="masukan username"><br>
          <label>password :</label>
          <input type="text" name="passadd" value="<?php if(isset($_GET['edit'])){ echo $tam['2']; } ?>" class="form-control" placeholder="masukan password"><br>
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
    <center><font class="alert alert-info card card-title"><b>List Data User<b></font></center>
    <br>
    <?php
    //hapus Data
    if (isset($_GET['hapus'])) {
      $hapus = "delete from user where id=".$_GET['hapus'];
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
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $query = mysqli_query($konek, "select * from user");{
        while ($r = mysqli_fetch_array($query)) {
         ?>
        <tbody>
          <tr>
            <td><?php echo $r['0']; ?></td>
            <td><?php echo $r['1']; ?></td>
            <td><?php echo $r['2']; ?></td>
            <td>
              <a href="?edit=<?php echo $r['0'] ?>"><button class="btn btn-success">Edit</button></a>
              <a href="?hapus=<?php echo $r['0'] ?>"<button class="btn btn-success">Hapus</button></a>
            </td>
          </tr>
        </tbody>
      <?php } } ?>
      </table>
    </form>
  </div>
</div>

<?php require_once 'footer.php'; ?>
