<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

//ambil data di URL
$id_produk = $_GET["id_produk"];

//query data mebel berdasarkan id_produk
$mbl = query("SELECT * FROM produk WHERE id_produk = $id_produk")[0];



//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {





    //cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diupdate!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diupdate!');
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
    <title>UPDATE PRODUK</title>
</head>
<body>
	<h1>Update data Mebel</h1>

<form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id_produk" value="<?= $mbl["id_produk"];  ?>">
        <input type="hidden" name="gambarLama" value="<?= $mbl["gambar"];  ?>">
		<ul>
			<li>
				<label for="nama">nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $mbl["nama"]; ?>">
			</li>
			<li>
				<label for="deskripsi">Deskripsi : </label>
				<input type="text" name="deskripsi" id="deskripsi" required value="<?= $mbl["deskripsi"]; ?>">
			</li>
			<li>
				<label for="harga">Harga :</label>
				<input type="text" name="harga" id="harga" required value="<?= $mbl["harga"]; ?>">
			</li>
			<li>
				<label for="bahan">bahan :</label>
				<input type="text" name="bahan" id="bahan" required value="<?= $mbl["bahan"]; ?>">
			</li>
            <li>
				<label for="warna">Warna :</label>
				<input type="text" name="warna" id="warna" required value="<?= $mbl["warna"]; ?>">
			</li>
            <li>
				<label for="ukuran">Ukuran :</label>
				<input type="text" name="ukuran" id="ukuran" required value="<?= $mbl["ukuran"]; ?>">
			</li>
            <li>
				<label for="gambar">gambar :</label>
                <img src="img/<?= $mbl['gambar']; ?>" width="200"> <br>
				<input type="file" name="gambar" id="gambar" required >
			</li>
			<li>
				<button type="submit" name="submit">UPDATE</button>
			</li>
		</ul>

	</form>

    
</body>
</html>