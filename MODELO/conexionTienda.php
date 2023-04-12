<?php


    try{

        $conexion = new PDO("mysql:host=localhost;dbname=spartans","root","");
        $conexion->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        $conexion->exec("SET CHARACTER SET utf8");
    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }


?>