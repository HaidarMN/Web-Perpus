<?php
include 'config.php';

$username = (@$_POST['username']);
$password = (md5(@$_POST['password']));

$query = "SELECT * FROM `t_petugas` WHERE username = '$username' AND password = '$password' ";


if(mysqli_query ($koneksi, $query)){
  session_start();
  $_SESSION["username"] = $username;
  header("location: tampil_petugas.php");
}else{
  echo "<h1>Username atau Password salah!!</h1>";
  echo "<div class='form'>
        <h3>
          <br/>Klik untuk <a href='index_admin.php'>login lagi</a>
        </h3>
        </div>";
}
 ?>
