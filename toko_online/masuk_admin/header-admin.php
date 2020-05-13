<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
// *** LOAD SESSION
session_start();
// *** LOAD CONFIGURATION VARS
include "../web_config_vars.php";
// *** DB CONNECTION
include "../db_conn.php";
?>
<head>
   
<link rel="shortcut icon" href="favicon.ico" >
<link href="style_admin.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="lib/ckeditor/ckeditor.js"></script>
<script src="plugin/nicEdit.js" type="text/javascript"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>


</head>
<body>


<?php


if (!empty($_POST['username'])){
   //echo "user yang diketik adalah : ".$_POST['username'];
   $password_md5= md5($_POST['password']);
   $sql="SELECT username,password FROM admin_web WHERE username='". $_POST['username'] ."' AND password='". $password_md5 ."'";
   $check=@mysql_num_rows(@mysql_query($sql));
   //echo "[ $check ]";
   if ($check>0){
       $_SESSION['admin_username'] = $_POST['username'];
      $_SESSION['islogin']=$_POST['username'].$password_md5;

    echo'<script>alert("Selamat anda berhasil untuk login!");window.location ="index.php";</script>';
   } else {

       echo'<script>alert("Maaf username dan Password anda salah, coba lagi!!!");window.location ="index.php";</script>';
   }


}
if (empty($_SESSION['islogin'])){
?>


<center>

<h1>Login</h1>

<form method="post" class="login-form">
<img src="../images/mapan.jpg" width=70%;><br>



<div class="txtb">
   <input  placeholder="Input Username" type="text" name="username" maxlength="12"><br>
</div>
<div class="txtb">
   <input  placeholder="Type Your Password" type="password" name="password"><br><br>
</div>


<input class="logbtn" type="submit" value="LOGIN">

</form>

<script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>

</center>

<?php

exit;
} else {

echo "<center>Halaman Administrator </center>";
?>

<div id="wrapper">
<div id="head_admin">
<div class="cleared"></div></div>
<div id="bg_admin_menu">
<div class="adminmenu">

<ul>
	<li><a href="index.php">Beranda</a></li>
		<li><a href="tambah_kategori.php">Kategori</a></li>
		   <li><a href="tambah_user.php">Admin</a></li>
               <!-- <li><a href="admin_order.php">Order</a></li> -->
             <li><a href="admin_product.php">Produk</a></li>
          <!-- <li><a href="konfirmasi.php">Konfirmasi</a></li> -->
  <!-- <li><a href="admin_artikel.php">Artikel</a></li> -->
<li><a href="admin_logout.php">Keluar</a></li>

</ul>
</div>
</div>

<?php
}

?>




