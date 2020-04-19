<?php

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bintangterang");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

    //ambil data dari setiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga = htmlspecialchars($data["harga"]);
    $bahan = htmlspecialchars($data["bahan"]);
    $warna = htmlspecialchars($data["warna"]);
    $ukuran = htmlspecialchars($data["ukuran"]);

    //upload gambar
	$gambar = upload();
	    if( !$gambar ) {
		    return false;
	}

    //query insert data

    $query = "INSERT INTO produk(nama, deskripsi, harga, bahan, warna, ukuran, gambar)
                VALUES
                ('$nama', '$deskripsi', '$harga', '$bahan', '$warna', '$ukuran', '$gambar')
                ";
    mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id_produk) {
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk");
	return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    //ambil data dari setiap elemen dalam form
    $id_produk = $data["id_produk"];
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $harga = htmlspecialchars($data["harga"]);
    $bahan = htmlspecialchars($data["bahan"]);
    $warna = htmlspecialchars($data["warna"]);
    $ukuran = htmlspecialchars($data["ukuran"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

    //query insert data

    $query =    " UPDATE produk SET 
                    nama = '$nama',
                    deskripsi = '$deskripsi',
                    harga = '$harga',
                    bahan = '$bahan',
                    warna = '$warna',
                    ukuran = '$ukuran',
                    gambar = '$gambar'
                    WHERE id_produk = $id_produk
                
                ";
    mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM produk
				WHERE
			  nama LIKE '%$keyword%' OR
			  bahan LIKE '%$keyword%' OR
			  warna LIKE '%$keyword%' OR
			  ukuran LIKE '%$keyword%'
			";
	return query($query);
}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 100000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}

function registrasi($data) {
    global $conn;
    $nama_pegawai = htmlspecialchars($data["nama_pegawai"]);
    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $tgllahir = htmlspecialchars($data["tgllahir"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM pegawai WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO pegawai(nama_pegawai, username, email, tgllahir, password) VALUES('$nama_pegawai', '$username', '$email','$tgllahir', '$password')");

	return mysqli_affected_rows($conn);

}



?>