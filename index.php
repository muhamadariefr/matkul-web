<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM animelist"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$animelist = query("SELECT * FROM animelist ORDER BY rating DESC LIMIT $awalData, $jumlahDataPerHalaman");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$animelist = search($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="shortcut icon" href="img/icon.png" type="gambar/x-icon">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>	
	<style>
		.loader {
			width: 100px;
			position: absolute;
			top: 118px;
			left: 300px;
			z-index: -1;
			display: none;		
		}
		.fullname{
			text-align: left;
			font-weight: bolder;
			color: #4f74c8;
			text-shadow: 1px 1px #000;;
		}
		@media print{
			.logout,.add,.search,.aksi{
				display:none;
			}
		}	
		.bx{
			text-align: justify;
		}
	</style>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body class="admin-page">

<h1>Anime List</h1>
<p class="text-desc">Note: This website is made for assignments or exams for PHP web programming courses</p>
<br>
<a href="tambah.php" class="add">
	<i class='bx bx-add-to-queue bx-fw'></i>Add Anime Data
</a>
<a href="logout.php" class="logout">
	<i class='bx bx-log-out bx-fw'></i> Log-out
</a>
<a href="cetak.php" class="print" target="_blank">
	<i class='bx bx-printer bx-fw'></i>Print
</a>
<br><br>
<form action="" method="post" class="search">
	<i class='bx bx-search bx-fw' style="color: #fff;"></i>
	<input type="text" name="keyword" size="40" autofocus placeholder="Enter search keywords.." autocomplete="off" id="keyword" style="text-align: center;">
	<button type="submit" name="cari" class="search-button" id="tombol-cari">Seacrh!</button>
	<img src="img/loader.gif" class="loader">
</form>
<br><br>
<div id="container" class="data">
	<table border="1" cellpadding="10" cellspacing="0" class="table-center">		
			<th>No</th>
			<th class="aksi">Action</th>
			<th>Image</th>
			<th>Name</th>
			<th>Score</th>
			<th>Episodes</th>
			<th>Studio</th>
		<?php $i = $awalData + 1; ?>
		<?php foreach( $animelist as $row ) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td class="aksi">
				<a href="ubah.php?id=<?= $row["id"]; ?>" class="ubah">
					<i class='bx bx-customize bx-fw'></i>Change
				</a>  |
				<a href="hapus.php?id=<?= $row["id"]; ?>" class="hapus" onclick="return confirm('Sure delete this data?');">
					<i class='bx bx-trash bx-fw'></i>Delete
				</a>
			</td>
			<td><img src="img/<?= $row["image"]; ?>" width="100"></td>
			<td class="fullname"><?= $row["name"]; ?></td>
			<td><img src="img/star.png" width="30" style="display: block; padding-bottom: 10px"><?= $row["rating"]; ?></td>
			<td><?= $row["episode"]; ?></td>
			<td><?= $row["studio"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		
	</table>
</div>
<!-- navigasi -->
<a class="paging" href="?halaman=1">First</a>

<?php if( $halamanAktif > 1 ) : ?>
	<a class="paging" href="?halaman=<?= $halamanAktif - 1; ?>"><</a>
<?php endif; ?>

<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<a class="paging" href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
		<a class="paging" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<a class="paging" href="?halaman=<?= $halamanAktif + 1; ?>">></a>
<?php endif; ?>

<a class="paging" href="?halaman=<?= $jumlahHalaman; ?>">End</a>
<footer>
	&copy Created by Muhamad Arief Rahmatulloh
</footer>

</body>
</html>