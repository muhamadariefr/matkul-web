<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( add($_POST) > 0 ) {
		echo "
			<script>
				alert('Data added successfully!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data failed to add!');
				document.location.href = 'index.php';
			</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Anime Data</title>
	<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Add Anime Data</h1>
	<form action="" method="post" enctype="multipart/form-data" class="form-add">
	<h2>Add Anime Data</h2>		
		<div class="anime-data">
			<label for="rating" class="text-add">Rating : </label>
			<input type="text" name="rating" id="rating" required style="text-align: center;">
		</div>	
		<div class="anime-data">
			<label for="name" class="text-add">Name : </label>
			<input type="text" name="name" id="name" style="text-align: center;">
		</div>		
		<div class="anime-data">
			<label for="episode" class="text-add">Episodes :</label>
			<input type="text" name="episode" id="episode" style="text-align: center;">
		</div>
		<div class="anime-data">
			<label for="studio" class="text-add">Studio :</label>
			<input type="text" name="studio" id="studio" style="text-align: center;">
		</div>										
		<div class="image-data">
			<label for="image">Image :</label>
			<input type="file" name="image" id="image">
		</div>
		<div class="add-data">
			<button type="submit" name="submit">Add Data!</button>			
		</div>
	</form>
<footer>
	&copy Created by Muhamad Arief Rahmatulloh
</footer>
</body>
</html>