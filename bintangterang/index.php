<?php

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM produk"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;


//query data yang mau ditambpilkan
$mebel = query("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");

//jika tombol cari diklik
if( isset($_POST["cari"]) ) {
	$mebel = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pegawai</title>
</head>
<body>

    <a href="logout.php">Logout</a>
    
    <h1>Daftar Barang</h1>

    <a href="tambah.php">Input Produk </a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
        <button type="submit" name="cari">SEARCH</button>
    </form>


	<!-- navigasi halaman -->
<a href="?halaman=1">awal</a>

<?php if( $halamanAktif > 1 ) : ?>
	<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
<?php endif; ?>

<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
<?php endif; ?>

<a href="?halaman=<?= $jumlahHalaman; ?>">akhir</a>


    <br>
    <table border="1" cellpadding="10" cellspacing="0">
    
    <tr>
		<th>No.</th>
		<th>Opsi</th>
		<th>Gambar</th>
		<th>Nama</th>
		<th>Deskripsi</th>
		<th>Harga</th>
		<th>Bahan</th>
        <th>Warna</th>
        <th>Ukuran</th>
	</tr>



	<?php $i = 1; ?>
	<?php foreach( $mebel as $row ) : ?>
    <tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id_produk=<?= $row["id_produk"]; ?>">update</a> |
			<a href="hapus.php?id_produk=<?= $row["id_produk"]; ?>" onclick="return confirm('data akan dihapus. Lanjutkan?');">hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="150"></td> 
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["deskripsi"]; ?></td>
		<td><?= $row["harga"]; ?></td>
		<td><?= $row["bahan"]; ?></td>
        <td><?= $row["warna"]; ?></td>
        <td><?= $row["ukuran"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>



    </table>
        

</body>
</html>
