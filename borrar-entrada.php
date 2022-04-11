<?php
require_once 'includes/conexionBD.php';
session_start();

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $entrada_id  = $_GET['id'];
    $usuarioid= $_SESSION['usuario']['id'];
    $sql = "DELETE FROM entradas WHERE usuario_id = $usuarioid AND id = $entrada_id";

    $borrar = mysqli_query($DB, $sql);

}
    header('Location: index.php')
?>