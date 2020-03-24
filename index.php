<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <style media="screen">
      html{
        font-family: sans-serif;
        background-image: linear-gradient(to bottom right, #c2e59c, #64b3f4);
        position: relative;
        height: 100%;
      }
      .form{
        width: 300px;
        height: 500px;
        padding: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 24px;
        transform: translate(-50%,-50%);
        background: #191919;
        text-align: center;
      }
      .box{
        width: 300px;
        padding: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 24px;
        transform: translate(-50%,-50%);
        background: #191919;
        text-align: center;
      }
      .box1{
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 40px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
      <form method="post" class="box">
        <h1 style="color: #fff; font-weight: 500">LOGIN</h1>
        <a href="login_petugas.php" class="box1" align="center" style="color:#fff">Petugas</a>
        <a href="login_anggota.php" class="box1" align="center" style="color:#fff">Anggota</a>
      </form>
  </body>
</html>
