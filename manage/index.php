<?php 
require_once 'header.php';
?>

	<nav>
		<ul>
			<li>APP_KASIR</li>
			<?php 
			$level = $_SESSION['level'] == 'kasir';
			if ($level) {
			?>
			<li>Manage User</li>
			<li>Manage Barang</li>
			<?php }else{ ?>
			<li>Transaksi</li>
			<?php } ?>
			<li>LogOut</li>
		</ul>
	</nav>

<?php require_once 'footer.php'; ?>