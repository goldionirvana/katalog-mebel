<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user pegawai baru berhasil ditambahkan!');
              </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

<h1>Halaman Registrasi</h1>

<form action="" method="post">

	<ul>
		<li>
			<label for="nama_pegawai">Nama :</label>
			<input type="text" name="nama_pegawai" id="nama_pegawai">
		</li>
		<li>
			<label for="username">username :</label>
			<input type="text" name="username" id="username">
		</li>
        <li>
			<label for="email">Email :</label>
			<input type="text" name="email" id="email">
		</li>
        <li>
			<label for="tgllahir">Tanggal Lahir :</label>
			<input type="text" name="tgllahir" id="tgllahir">
		</li>
		<li>
			<label for="password">password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="password2">konfirmasi password :</label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<button type="submit" name="register">Register!</button>
		</li>
	</ul>
	
</form>

</body>
</html>
