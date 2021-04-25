<?php

class DB_Class
{
    protected $host;
    protected $username;
    protected $pw;
    protected $con;

    function __construct()
    {
        $this->host="localhost";
        $this->username="root";
        $this->pw="";
    }

    function __destruct()
    {

    }

    function Connection($dbname)
    {
        try
        {
            $this->con=new PDO("mysql:host=$this->host;dbname=$dbname",$this->username,$this->pw);
            $this->con->exec("set names 'UTF-8'");
        }
        catch(PDOException $e)
        {
            die("<h1>Kapcsolódási hiba</h1><p>$e</p>");
        }
        
    }

    function Listázás()
    {
        $res=$this->con->prepare("SELECT * FROM festmenyek");

        $res->execute();
        echo "<div style='display:table;'>";
        while($row=$res->fetch())
        {
            echo "<div class='lista'><h3>" . $row["f_nev"]. "</h3><p>" . $row["f_festo"]. "</p><p>" . $row["f_datum"]. "</p><p>" . $row["f_szelesseg"]. " x " . $row["f_magassag"]. "</p><p>" . $row["f_masolat"]. "</p></div>";
        }
        echo "</div>";

    }

    function felvetel($festnev,$szerznev,$date,$szel,$mag,$mas)
    {
        $success=false;
        $res=$this->con->prepare("INSERT INTO festmenyek(f_nev,f_festo,f_datum,f_szelesseg,f_magassag,f_masolat) VALUES(?,?,?,?,?,?)");

        $res->bindparam(1,$festnev);
        $res->bindparam(2,$szerznev);
        $res->bindparam(3,$date);
        $res->bindparam(4,$szel);
        $res->bindparam(5,$mag);
        $res->bindparam(6,$mas);

        $row=$res->execute();
        if($row>0)
        {
            $success=true;
        }
        else
        {
            $success=false;
        }
        return $success;
    }

    function modLista()
    {
        $id;
        $van="van_keszen";
        $res=$this->con->prepare("SELECT * FROM festmenyek");

        $res->execute();
        echo "<div>";
        while($row=$res->fetch())
        {
            $id=$row["f_id"];
            echo "<div class='lista'><h3>" . $row["f_nev"]. "</h3><p>" . $row["f_festo"]. "</p><p>" . $row["f_datum"]. "</p><p>" . $row["f_szelesseg"]. " x " . $row["f_magassag"]. "</p><p>" . $row["f_masolat"]. "</p>
            <br><button id=$id class='btn btn-success'>Hozzáad</button><button class='btn btn-warning'>Levesz</button>
            </div>";
            echo "";
        }
        echo "</div>";

    }

    function modositas()
    {
        $update=$this->con->prepare("UPDATE festmenyek SET f_masolat= :pMod WHERE f_id= :pId");
        $update->bindparam("pMod",$van);
        $update->bindparam("pId",$id);

        $update->execute();

        echo "<script>alert($id)</script>";
    }
}

?>