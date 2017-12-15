
<?php require_once 'layout/header.php' ?>

<div class="container">

			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<font><b>Form Login :)</b></font>
					</div>
					<div class="modal-body">
						<?php 
						if (isset($_POST['log'])) {
							$user = $_POST['userlog'];
							$pass = $_POST['passlog'];
							$query = $konek->query("SELECT * FROM user");
							$h = $query->fetch_array(MYSQLI_BOTH);
							$username = $h['username'];
							$password = $h['password'];
							$level = $h['level'];
							if ($username == $user && $password == $pass ) {
								$_SESSION['level'] == $level;
								header("Location: manage/index.php");
							}else{
								?><font class="alert alert-danger">Login Gagal username/password salah!!!</font>
								<?php
							}

						}

						?>
						<hr>
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

<?php require_once 'layout/footer.php' ?>