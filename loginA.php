<?php
include 'config.php';

$username = ($_POST['username']);
$password = (md5($_POST['password']));

$query = "SELECT * FROM `t_anggota` WHERE username = '$username' AND password = '$password'";
$sql = mysqli_query($koneksi, $query);
if ($sql->num_rows > 0) {
  session_start();
  $_SESSION['username'] = $username;
  header("Location: t_anggota.php");
}else {
  echo "<h1> Username atau Password anda salah </h1>";
  echo "<div class='form'
        <h3>
          <br/> Klik untuk <a href='login_anggota.php'>Login lagi</a>
        </h3>
        </div>";
}
?>
