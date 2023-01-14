<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "animelist");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function add($data) {
	global $conn;

	$name = htmlspecialchars($data["name"]);
	$rating = htmlspecialchars($data["rating"]);
	$episode = htmlspecialchars($data["episode"]);
	$studio = htmlspecialchars($data["studio"]);

	// upload gambar
	$image = upload();
	if( !$image ) {
		return false;
	}

	$query = "INSERT INTO animelist
				VALUES
			  ('', '$name', '$rating', '$episode', '$studio', '$image')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['image']['name'];
	$ukuranFile = $_FILES['image']['size'];
	$error = $_FILES['image']['error'];
	$tmpName = $_FILES['image']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('Select an image first!');
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
	if( $ukuranFile > 1000000 ) {
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




function delete($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM animelist WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function change($data) {
	global $conn;

	$id = $data["id"];
	$name = htmlspecialchars($data["name"]);
	$rating = htmlspecialchars($data["rating"]);
	$episode = htmlspecialchars($data["episode"]);
	$studio = htmlspecialchars($data["studio"]);
	$oldimage = htmlspecialchars($data["oldimage"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['image']['error'] === 4 ) {
		$image = $oldimage;
	} else {
		$image = upload();
	}
	

	$query = "UPDATE animelist SET
				name = '$name',
				rating = '$rating',
				episode = '$episode',
				studio = '$studio',
				image = '$image'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function search($keyword) {
	$query = "SELECT * FROM animelist
				WHERE
			  name LIKE '%$keyword%' OR
			  rating LIKE '%$keyword%' OR
			  episode LIKE '%$keyword%' OR
			  studio LIKE '%$keyword%'
			";
	return query($query);
}


function registration($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('Username Already Registered!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('Password Confirmation Does Not Match!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}









?>