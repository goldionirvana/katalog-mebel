<?php 

require 'functions.php';


//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {





    //cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT PRODUK</title>
</head>
<body>
<h1>Tambah data Mebel</h1>

<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="deskripsi">Deskripsi : </label>
				<input type="text" name="deskripsi" id="deskripsi" required>
			</li>
			<li>
				<label for="harga">Harga :</label>
				<input type="text" name="harga" id="harga" required>
			</li>
			<li>
				<label for="bahan">bahan :</label>
				<input type="text" name="bahan" id="bahan" required>
			</li>
            <li>
				<label for="warna">Warna :</label>
				<input type="text" name="warna" id="warna" required>
			</li>
            <li>
				<label for="ukuran">Ukuran :</label>
				<input type="text" name="ukuran" id="ukuran" required>
			</li>
            <li>
				<label for="gambar">gambar :</label>
				<input type="file" name="gambar" id="gambar" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>

	</form>

    
</body>
</html>