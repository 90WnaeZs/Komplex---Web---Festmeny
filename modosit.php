<?php
require "db.php";
session_start();
$db=new DB_Class();
$db->Connection("festmeny");
?>

<!DOCTYPE html>
<html lang="hu">

<head>
<title>Festmények</title>
<link rel="stylesheet" href="bs/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
</head>

<body>
<div class="container">
<div class="doboz flex-row">
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="eddig.php">Eddigi munkáim</a></li>
            <li class="nav-item"><a class="nav-link" href="felvetel.php">Festmény felvétele</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Állapot módosítása</a></li>
        </ul>
    </nav>
    <div class="hdr">
    <h1>Festmények</h1>
    </div>
    <?php $db->modLista(); ?>
</div>



<div class="doboz flex-row">
    <p><b>Készítette: </b>Váczi Zsolt, 2021.</p>
</div>

</div>
</body>
</html>