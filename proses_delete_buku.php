<?php
	include('config.php');
	$id_buku = @$_GET['id_buku'];
	$sql = mysqli_query($koneksi, "DELETE FROM t_buku WHERE id_buku='$id_buku'");
	header('location:tampil_petugas.php');
?>
