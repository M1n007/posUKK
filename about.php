
<?php
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
							$query = mysqli_query($konek, "select * from user where username='$username' and password='$password'");
							$ya = mysqli_num_rows($query);
							if ($ya==TRUE) {
								$_SESSION['username'] = $username;
								header("Location: manage/index.php");
							}else{
								?><font color="red" class="alert alert-danger">Anda gagal login, kemungkinan username/password salah!!</font>
								<?php
							}
						}

						?>
						<form action="" method="post">
							<label>Username :</label>
							<input class="form-control" type="text" name="userlog" placeholder="masukan username...">
							<label>Password :</label>
							<input class="form-control" type="text" name="passlog" placeholder="masukan password...">
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" name="log">Login</button>
					</div>
						</form>
				</div>
			</div>


</div>

<?php require_once 'layout/footer.php'; ?>
