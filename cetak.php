<?php
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$animelist = query("SELECT * FROM animelist ORDER BY rating DESC");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anime List</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
   <h1>Anime List</h1>
   <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Rating</th>
            <th>Name</th>
            <th>Episodes</th>
            <th>Studio</th>
        </tr>';

     $i = 1;
     foreach( $animelist as $row ) {
        $html .= '<tr>
            <td>'. $i++ .'</td>
            <td><img src="img/'. $row["image"] .'" width="50"></td>
            <td>'. $row["rating"] .'</td>
            <td>'. $row["name"] .'</td>
            <td>'. $row["episode"] .'</td>
            <td>'. $row["studio"] .'</td>
        </tr>';
     }   

$html .= '</table>    
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('animelist.pdf', 'I');

?>