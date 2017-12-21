<?php
#Special thanks for SMK Muhammadiyah Majenang
#ProjectUKK by Aminudin
#Contact amin4udin@gmail(dot)com

require_once 'header.php';
session_start();
if (empty($_SESSION['username'])) {
	header("Location: ../about.php");
}
?>


	<br>
	<div class="container-fluid">
		<div class="col-md-5">
			<a href="user.php"><button class="btn btn-default">Manage User</button></a>
			<font color="red" size="1">*untuk menambah / mengedit data user</font><br><hr>
			<a href="barang.php"><button class="btn btn-default">Manage Barang</button></a>
			<font color="red" size="1">*untuk menambah / mengedit data barang</font><br><hr>
			<a href="#"><button class="btn btn-default">Riwayat Transaksi</button></a>
			<font color="red" size="1">*untuk melihat riwayat transaksi</font>
			<br>
			<br>
			 Anda login sebagai <b><?php echo $_SESSION['username']; ?></b> ? <a href="logout.php">LogOut</a>
		</div>
		<div class="col-md-7">

		</div>
	</div>

<?php require_once 'footer.php'; ?>
