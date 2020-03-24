<?php
//memasukkan file config.php
include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data Buku</title>
    <!-- CSS online dari bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
	<script>
        $(document).ready(function(){
            $("#myModal").on("show.bs.modal", function(event){
                // Get the button that triggered the modal
                var button = $(event.relatedTarget);

                // Extract value from the custom data-* attribute
                var titleData = button.data("title");
                $(this).find(".modal-title").text(titleData);
            });
        });
    </script>
    <style>
        .bs-example{
            margin: 20px;
        }
				body{
					background-color: #616161;
					font-family: "Trade Winds";
				}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" style="color: #fff">LIBRARY</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="../user.php" class="nav-item nav-link active">Home</a>
                <a href="tampil_buku.php" class="nav-item nav-link active">Book</a>
								<a href="#" class="nav-item nav-link active">Profile</a>
            </div>
            <form class="form-inline ml-auto">
                <div class="navbar-nav">
                    <a href="logoutP.php" class="nav-item nav-link active">Logout</a>
                </div>
            </form>
        </div>
    </nav>

	<div class="container" style="margin-top:20px; color: #ffffff;">
		<h2>Daftar Buku</h2>
		<hr>
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
          <th>Judul</th>
					<th>Penerbit</th>
					<th>Pengarang</th>
					<th>Ringkasan</th>
					<th>Cover</th>
          <th>Stok</th>
          <th>ID Kategori</th>
          <th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel t_buku urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM `t_buku` ORDER BY id_buku DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						?>

						<tr>
              <td style="color: #ffffff;"><?php echo $no; ?></td>
              <td style="color: #ffffff;"><?php echo $data['judul'] ?></td>
							<td style="color: #ffffff;"><?php echo $data['penerbit'] ?></td>
							<td style="color: #ffffff;"><?php echo $data['pengarang'] ?></td>
							<td style="color: #ffffff;"><?php echo $data['ringkasan'] ?></td>
							<td style="color: #ffffff;"><?php echo $data['cover'] ?></td>
              <td style="color: #ffffff;"><?php echo $data['stok'] ?></td>
              <td style="color: #ffffff;"><?php echo $data['id_kategori'] ?></td>
							<td>
								<a href="#edit<?php echo $data['id_buku']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
								<a href="#del<?php echo $data['id_buku']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('modal_form.php'); ?>
							</td>
						</tr>
						<?php
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6" style="color: #ffffff;">Tidak ada data</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>

        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-title="tambahBuku">Tambah Buku</button>
        </div>
        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" style="color: #ffffff; background-color: #616161;">
                    <form action="tambah_buku.php" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" style="">Tambah Data Buku</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label">Judul:</label>
                                <input type="text" name="judul"class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Penerbit:</label>
                                <input type="text" name="penerbit" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Pengarang:</label>
                                <input type="text" name="pengarang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ringkasan:</label>
                                <input type="text" name="ringkasan" class="form-control">
                            </div>
                            <div class="form-group">
																<label class="control-label">Cover:</label>
                            		<input type="text" name="cover" class="form-control">
                            </div>
														<div class="form-group">
																<label class="control-label">Stok:</label>
																<input type="number" name="stok" class="form-control">
                            </div>
														<div class="form-group">
																<label class="control-label">ID Kategori:</label>
																<input type="number" name="id_kategori" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  </head>
  <body>
</html>
