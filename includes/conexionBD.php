<?php
//Conexion a MYSQL


$server ="localhost";
$username ="root";
$password="";
$database="blog_master";

$DB = mysqli_connect($server,$username,$password,$database);

mysqli_query($DB, "SET NAMES 'utf8'");

//Iniciamos la session
if(!isset($_SESSION)){
    session_start();
}


?>

