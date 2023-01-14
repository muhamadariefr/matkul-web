<?php 
usleep(500000);
require '../functions.php';

$keyword = $_GET["keyword"];

$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM animelist"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$query = "SELECT * FROM animelist
            WHERE
          name LIKE '%$keyword%' OR
          episode LIKE '%$keyword%' OR
          rating LIKE '%$keyword%' OR
          studio LIKE '%$keyword%'
          ORDER BY rating DESC LIMIT $awalData, $jumlahDataPerHalaman";

$animelist = query($query);
?>
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