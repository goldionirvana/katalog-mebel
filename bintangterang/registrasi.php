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
	<link rel="stylesheet" href="style/styleregistrasi.css">
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>



<form action="" method="post">

	<div class="container">
		<div class="title">create an account</div>
		<div class="sub-container">
		<div class="form">
      		<label for="nama_pegawai" class="label">Nama Pegawai :</label><br>
      		<input type="text" class="input" placeholder="tuliskan nama anda" name ="nama_pegawai" id="nama_pegawai">
   		 </div>
			
		<div class="form">
      		<label for="username" class="label">Username :</label><br>
      		<input type="text" class="input" placeholder="tuliskan Username anda" name ="username" id="username">
		</div>
			
		<div class="form">
      		<label for="email" class="label">Email :</label><br>
      		<input type="email" class="input" placeholder="Tuliskan email anda" name ="email" id="email">
   		</div>
		   <div class="form">
      		<label for="tgllahir" class="label">Tanggal Lahir :</label><br>
      		<input type="date" class="input" placeholder="Tuliskan email anda" name ="tgllahir" id="tgllahir">
		</div>
		<div class="form">
      		<label for="password" class="label">Password :</label><br>
      		<input type="password" class="input" placeholder="tuliskan password anda" name="password" id="password">
		</div>  
		<div class="form">
      		<label for="password2" class="label">Password :</label><br>
      		<input type="password" class="input" placeholder="tuliskan kembali password anda" name="password2" id="password2">
    	</div> 

			<button class="btn" type="submit" name="register">Register!</button>
		

	</div>
</div>
	
</form>

</body>
</html>
</html>
