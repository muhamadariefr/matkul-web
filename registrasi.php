<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registration($_POST) > 0 ) {
		echo "<script>
				alert('New User Added Successfully!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
	<style>
		.logo-icon {
			display: block;
			margin: 10px auto 10px auto;			
			width: 150px;
			
		}
	</style>
</head>
<body>
<div id="preloader"></div>
<h1 data-aos="fade-down" data-aos-duration="2000" data-aos-once="true">Registration Page</h1>
<p class="text-desc" data-aos="zoom-in" data-aos-duration="2000" data-aos-once="true">Note: This website is made for assignments or exams for PHP web programming courses</p>
<form action="" method="post" class="form-logreg" data-aos="zoom-in" data-aos-duration="2000" data-aos-once="true">
	<h2>Registration Form</h2>
	<img src="img/1.png" alt="logo-icon" class="logo-icon">
	<div class="username">
		<label for="username">Username :</label>
		<input type="text" name="username" id="username" style="text-align: center;">
	</div>
	<div class="password">
		<label for="password">Password :</label>
		<input type="password" name="password" id="password" style="text-align: center;">
	</div>
	<div class="konf-pw">
		<label for="password2">Confirm Password :</label>
		<input type="password" name="password2" id="password2" style="text-align: center;">
	</div>
	<div class="log-register">
		<button type="submit" name="register">
			<i class='bx bxs-user-plus bx-fw'></i>Register!
		</button>
	</div>
	<p class="regis">
		Already have an account?		
		<a href="login.php" class="login">Login</a>
	</p>
</form>
<script src="js/load.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<footer>
	&copy Created by Muhamad Arief Rahmatulloh
</footer>
</body>
</html>