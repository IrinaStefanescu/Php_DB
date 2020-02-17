<?php

if(isset($_GET["tabel"]) && $_GET[array_keys($_GET)[1]]){

    $connection = new PDO("mysql:host=localhost".";dbname=spital","root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt =  $connection->prepare("delete from ".$_GET["tabel"]." where ".array_keys($_GET)[1]." = ".$_GET[array_keys($_GET)[1]]); 
    $stmt->execute();
    
    header("Location:http://localhost/BDIrina/".$_GET["tabel"].".php");
 
}else{
    echo "delete from ".$_GET["tabel"]." where ".array_keys($_GET)[1]." = ".$_GET[array_keys($_GET)[1]];
    //header("Location:http://localhost/BDIrina/index.php");
}
?>