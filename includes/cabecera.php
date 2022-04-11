<?php
require_once 'includes/conexionBD.php';
?>

<?php require_once 'includes/helpers.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <title>Document</title>
</head>
<body>
<!--CABECERA-->
<header id="header">
    <!--LOGO-->
    <div id="logo">
        <a href="index.php">
            Blog de Videojuegos
        </a>
    </div>
    <!--MENU-->
    <?php
  
    ?>

    <nav id="menu">
        <ul>
            <li><a href="index.php">Inicio</a></li>

            <?php 
                $categorias = ObtenerCategorias($DB);
                 if(!empty($categorias)):
                     while($categoria = mysqli_fetch_assoc($categorias)):
                    ?>
                        <li><a href="categoria.php?id=<?=$categoria['id']?>"> <?= $categoria['nombre'] ?></a></li>
            <?php 
                    endwhile; 
                endif;?>
        

            <li><a href="">Sobre Mi</a></li>
            <li><a href="">Contacto</a></li>


        
        </ul>

    </nav>

    <div class="clearfix"></div>

</header>

<div id="contenedor">