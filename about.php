
<?php
#Special thanks for SMK Muhammadiyah Majenang
#ProjectUKK by Aminudin
#Contact amin4udin@gmail(dot)com
require_once 'layout/header.php';
?>

<div class="container">

			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<font><b>Form Login :)</b></font>
					</div>
					<div class="modal-body">
						<?php
						if (isset($_POST['log'])) {
							$username = $_POST['userlog'];
							$password = $_POST['passlog'];
							$level = $_POST['levellog'];
							$query = mysqli_query($konek, "select * from user where username='$username' and password='$password' and level='$level'");
							$ya = mysqli_num_rows($query);
							if ($ya==TRUE) {
								$_SESSION['username'] = $username;
								$_SESSION['level'] = $level;
								header("Location: manage/index.php");
							}else{
								?><font class="alert alert-danger card card-title"><b>Login Gagal!!, pastikan data sesuai.<b></font>
		            <?php
							}
						}

						?>
						<form action="" method="post">
							<label>Username :</label>
							<input class="form-control" type="text" name="userlog" placeholder="masukan username...">
							<label>Password :</label>
							<input class="form-control" type="text" name="passlog" placeholder="masukan password...">
							<label>level :</label>
							<select name="levellog" class="form-control">
								<option value="admin">admin</option>
								<option value="kasir">kasir</option>
							</select>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" name="log">Login</button>
					</div>
						</form>
				</div>
			</div>


</div>

<?php require_once 'layout/footer.php'; ?>
