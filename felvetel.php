<?php
require "db.php";

$nemures=false;

/*if(isset($_POST["sub"]) && (empty($_POST["f_nev"]) || empty($_POST["sz_nev"]) || empty($_POST["datum"]) || empty($_POST["szel"]) || empty($_POST["mag"]) || empty($_POST["mas"])))
{
    //echo "<script>alert('Töltse ki az üres mezőket!')</script>";
}
else
{
    }*/
    if(isset($_POST['sub']))
    {
        $db=new DB_Class();
        $db->Connection("festmeny");
        session_start();
        
        $f_nev=$_POST["f_nev"];
        $sz_nev=$_POST["sz_nev"];
        $datum=$_POST["datum"];
        $szel=$_POST["szel"];
        $mag=$_POST["mag"];
        $mas=$_POST["mas"];
    
        $db->felvetel($f_nev,$sz_nev,$datum,$szel,$mag,$mas);
    }




?>

<!DOCTYPE html>
<html lang="hu">

<head>
<title>Festmények</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="bs/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<script src="ellenorzes.js"></script>
</head>

<body>
<div class="container">

    <div class="doboz flex-row">
        <nav class="navbar navbar-expand-sm">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="eddig.php">Eddigi munkáim</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Festmény felvétele</a></li>
                <li class="nav-item"><a class="nav-link" href="modosit.php">Állapot módosítása</a></li>
            </ul>
        </nav>
        <div class="hdr">
        <h1>Festmények</h1>
        </div>
    </div>

    <div id="felv_form" class="doboz flex-row">
    <form name="felvetel" action="#" method="POST" onsubmit="return formvalidation()">
        <div class="form-group">
            <label for="f_nev">Festmény neve:</label>
            <input class="form-control" type="text" id="f_nev" name="f_nev">
        </div>
        <div class="form-group">
            <label for="sz_nev">Festő neve:</label>
            <input class="form-control" type="text" id="sz_nev" name="sz_nev">
        </div>
        <div class="form-group">
            <label for="">Készítés dátuma:</label>
            <input class="form-control" type="date" id="datum" name="datum">
        </div>
        <div class="form-group">
            <label for="szel">Szélesség:</label>
            <input class="form-control" type="number" id="szel" name="szel">
        </div>
        <div class="form-group">
            <label for="mag">Magasság:</label>
            <input class="form-control" type="number" id="mag" name="mag">
        </div>
        <div class="form-group">
            <label for="mas">Másolat:</label>
            <select class="form-control" id="mas" name="mas">
                <option value="megrendelesre">Megrendelésre</option>
                <option value="van_keszen">Van készen</option>
            </select>
        </div>
        <button type="submit" id="sub" name="sub" class="btn btn-primary" onclick="check()">Felvétel</button>
    </form>
    </div>


<div class="doboz flex-row">
    <p><b>Készítette: </b>Váczi Zsolt, 2021.</p>
</div>

</div>
</body>
</html>