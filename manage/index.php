<?php
#Special thanks for SMK Muhammadiyah Majenang
#ProjectUKK by Aminudin
#Contact amin4udin@gmail(dot)com

require_once 'header.php';
session_start();
if (empty($_SESSION['level'])) {
	header("Location: ../about.php");
}
?>


	<br>
	<div class="container-fluid">
		<div class="row justify-content-start">
			<div class="col-6">
				<?php
				if ($_SESSION['level'] == "kasir" ) {

				?>
				<button class="btn btn-default">Manage User</button>
				<font color="red" size="1">*hanya untuk admin</font><br><hr>
				<button class="btn btn-default">Manage Barang</button>
				<font color="red" size="1">*hanya untuk admin</font><br><hr>
				<a href="transaksi.php"><button class="btn btn-success">Transaksi</button></a>
				<font color="red" size="1">*untuk melakukan transaksi</font>
				<?php
				}else{
				?>
				<a href="user.php"><button class="btn btn-success">Manage User</button></a>
				<font color="red" size="1">*untuk menambah / mengedit data user</font><br><hr>
				<a href="barang.php"><button class="btn btn-success">Manage Barang</button></a>
				<font color="red" size="1">*untuk menambah / mengedit data barang</font><br><hr>
				<a href="transaksi.php"><button class="btn btn-success">Transaksi</button></a>
				<font color="red" size="1">*untuk melakukan transaksi</font>
				<?php
				}
				?>
			</div>
			<div class="col-6">
				<b>Hy <font color="green"><i><?php echo $_SESSION['username']; ?></i></font>, selamat datang di aplikasi sederhana ini semoga dapat dipakai dengan mudah :).</b>
			</div>
		</div>
	</div>

	<br>
	<br>

	<div class="container-fluid">
		<div class="card card-default col-12">
		 <div class="card-body">
			 <font class="alert alert-success">hak akses sebagai <b><?php echo $_SESSION['level']; ?>.</b></font><a href="logout.php">LogOut</a>
		 </div>
		</div>
	</div>

<?php require_once 'footer.php'; ?>
