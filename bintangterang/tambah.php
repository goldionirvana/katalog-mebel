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
	<link rel="stylesheet" href="style/styleregistrasi.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT PRODUK</title>
</head>
<body>


<form action="" method="post" enctype="multipart/form-data">
<div class="container">
		<div class="title">Input Produk</div>
		<div class="sub-container">
		<div class="form">
      		<label for="nama" class="label">Nama Produk :</label><br>
      		<input type="text" class="input" placeholder="tuliskan nama produk" name ="nama" id="nama"required>
   		 </div>
			<div class="form">
      		<label for="deskripsi" class="label">Deskripsi Produk :</label><br>
      		<input type="text" class="input" placeholder="Tuliskan Deskripsi produk" name ="deskripsi" id="deskripsi"required>
   		 </div>
			
			<div class="form">
      		<label for="harga" class="label">Harga Produk :</label><br>
      		<input type="text" class="input" placeholder="Tuliskan harga produk yang ingin dijual" name ="harga" id="harga"required>
   		 </div>
			<div class="form">
      		<label for="bahan" class="label">Terbuat dari bahan :</label><br>
      		<input type="text" class="input" placeholder="Tuliskan jenis bahan kayu apa yang digunakan" name ="bahan" id="bahan"required>
   		 </div>
			<div class="form">
      		<label for="warna" class="label">warna Produk :</label><br>
      		<input type="text" class="input" placeholder="Tuliskan warna produk" name ="warna" id="warna"required>
   		 </div>
			<div class="form">
      		<label for="ukuran" class="label">Ukuran Produk :</label><br>
      		<input type="text" class="input" placeholder="Tuliskan ukuran produk yang ingin dijual" name ="ukuran" id="ukuran"required>
   		 </div>
			<div class="form">
      		<label for="type_produk" class="label">Type Produk :</label><br>
      		<input type="text" class="input" placeholder="Tuliskan type produk yang ingin dijual" name ="type_produk" id="type_produk"required>
   		 </div>
			<div class="form">
      		<label for="gambar" class="label">Gambar Produk :</label><br>
      		<input type="file"   name ="gambar" id="gambar"required>
   		 </div>
			
			
			<button class="btn" type="submit" name="submit">Tambah data!</button>
				
			
		</ul>
		</div>
</div>
	</form>

    
</body>
</html>
