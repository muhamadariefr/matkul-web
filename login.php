<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}


}

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if( isset($_POST['remember']) ) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page | Animelist</title>
	<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<style>
		.logo-icon {
			display: block;
			margin: 10px auto 10px auto;			
			width: 150px;
			
		}
	</style>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
<div id="preloader"></div>
<h1 data-aos="fade-down" data-aos-duration="2000" data-aos-once="true">Login Page</h1>
<p class="text-desc" data-aos="zoom-in" data-aos-duration="2000" data-aos-once="true">Note: This website is made for assignments or exams for PHP web programming courses</p>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic; text-align:center; font-weight:bold;">Wrong Username or Password!</p>
<?php endif; ?>

<form action="" method="post" class="form-logreg" data-aos="zoom-in" data-aos-duration="2000" data-aos-once="true">
	<h2 >Login Form</h2>
	<img src="img/1.png" alt="logo-icon" class="logo-icon">
		<div class="username">
			<label for="username">Username :</label>
			<input type="text" name="username" id="username" style="text-align: center;">
		</div>
		<div class="password">
			<label for="password">Password :</label>
			<input type="password" name="password" id="password" style="text-align: center;">
		</div>			
		<div class="remember">
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>
		</div>
		<div class="log-register">
			<button type="submit" name="login">
				<i class='bx bx-log-in bx-fw'></i>Login
			</button>			
		</div>
		<p class="regis">
			Don't have an account yet?		
			<a href="registrasi.php" class="register">Registration</a>
		</p>
</form>

<footer>
	&copy Created by Muhamad Arief Rahmatulloh
</footer>
<script src="js/load.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>