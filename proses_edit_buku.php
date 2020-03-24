<?php
	include('config.php');

	$id_buku = @$_GET['id_buku'];

  $judul			   = @$_POST['judul'];
  $penerbit			 = @$_POST['penerbit'];
  $pengarang		 = @$_POST['pengarang'];
  $ringkasan	   = @$_POST['ringkasan'];
  $cover	    	 = @$_POST['cover'];
  $stok	         = @$_POST['stok'];
  $id_kategori	 = @$_POST['id_kategori'];

	$sql = mysqli_query($koneksi,"UPDATE t_buku
  SET judul='$judul', penerbit='$penerbit', pengarang='$pengarang', ringkasan='$ringkasan', cover='$cover', stok='$stok', id_kategori='$id_kategori' where id_buku='$id_buku'");
    if($sql){
        echo '<script>alert("Berhasil menyimpan data."); document.location="tampil_petugas.php?id='.$id.'";</script>';
    }else{
        echo '<div class="alert alert-warning">Gagal melakukan proses edit data</div>';
    }
    // header('location:tampil_petugas.php');

?>
