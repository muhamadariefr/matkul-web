<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data animelist berdasarkan id
$anime = query("SELECT * FROM animelist WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( change($_POST) > 0 ) {
		echo "
			<script>
				alert('Data changed successfully!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data failed to change!');
				document.location.href = 'index.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Anime Data</title>
	<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Change Anime Data</h1>

	<form action="" method="post" enctype="multipart/form-data" class="change-data">
	<h2>Change Data</h2>
		<input type="hidden" name="id" value="<?= $anime["id"]; ?>">
		<input type="hidden" name="oldimage" value="<?= $anime["image"]; ?>">
			<div class="change-input">
				<label for="rating">Rating : </label>
				<input type="text" name="rating" id="rating" required value="<?= $anime["rating"]; ?>" style="text-align: center;">
			</div>
			<div class="change-input">
				<label for="name">Name : </label>
				<input type="text" name="name" id="name" value="<?= $anime["name"]; ?>" style="text-align: center;">
			</div>
			<div class="change-input">
				<label for="episode">Episodes :</label>
				<input type="text" name="episode" id="episode" value="<?= $anime["episode"]; ?>" style="text-align: center;">
			</div>
			<div class="change-input">
				<label for="studio">Studio :</label>
				<input type="text" name="studio" id="studio" value="<?= $anime["studio"]; ?>" style="text-align: center;">
			</div>
			<div class="change-input">
				<label for="image">Image :</label> <br>
				<img src="img/<?= $anime['image']; ?>" width="40"> <br>
				<input type="file" name="image" id="image">
			</div>
			<div class="change-button">
				<button type="submit" name="submit">Change Data!</button>
			</div>
	</form>




</body>
</html>