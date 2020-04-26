<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id_pegawai']) && isset($_COOKIE['key']) ) {
	$id_pegawai = $_COOKIE['id_pegawai'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM pegawai WHERE id_pegawai = $id_pegawai");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}


}


if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}




if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id_pegawai', $row['id_pegawai'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>

	<link rel="stylesheet" href="style/loginstyle.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>



<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic; background-color: #f1f1f1; padding: 20px">username / password salah</p>
<?php endif; ?>

<form action="" method="post" class="login-form">

<h1>Login</h1>

	<div class="txtb">
		<input type="text" name="username" id="username">
		<span data-placeholder="Username"></span>
	</div>

	<div class="txtb">
		<input type="password" name="password" id="password">
		<span data-placeholder="Password"></span>
	</div>


	<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>


	<input type="submit" class="logbtn" value="login" name="login">




	<div class="bottom-text">
	Belum punya akun?	<a href="registrasi.php">Register</a>
	</div>
	



	
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



</body>
</html>
