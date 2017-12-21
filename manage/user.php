<?php
require_once 'header.php';
include '../configuration/konek.php';
?>

<div class="container">
<br>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
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
              <button name="edit" class="btn btn-success">Edit</button>
              <button name="hapus" class="btn btn-success">Hapus</button>
            </td>
          </tr>
        </tbody>
      <?php } } ?>
      </table>
    </form>
  </div>
</div>

<?php require_once 'footer.php'; ?>
