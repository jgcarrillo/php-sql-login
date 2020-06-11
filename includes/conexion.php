<?php

$server = 'localhost:3308';
$username = 'root';
$password = '';
$database = 'empresa';

$db = mysqli_connect($server, $username, $password, $database);

// Comprobacion de conexión satisfactoria o no
try{
    $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
    die('Conexion fallida: '. $e->getMessage());

}

// Codificación de caracteres a uft8
mysqli_query($db, "SET NAMES 'utf8");