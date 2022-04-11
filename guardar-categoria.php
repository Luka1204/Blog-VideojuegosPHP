<?php
    if(isset($_POST)){

        //Conexion a la BD
        require_once 'includes/conexionBD.php';

        $nombre = isset($_POST['txtNombre']) ? mysqli_real_escape_string($DB, $_POST['txtNombre']): false;

        //Array de errores
          $errores = array();
   
    //Validar datos antes de subirlos a la base de datos

    //Validar Nombre
    if(!empty($nombre) && !is_numeric($nombre)){
       $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] ="El nombre no es valido";
    }

    //Validacion si no llegan errores
    if(count($errores) == 0){

        //Cifrar la contraseña
        $sql = "INSERT INTO categorias VALUES(null, '$nombre')";
        $guardar_categoria = mysqli_query($DB, $sql);
       
     }else{
        $guardar_categoria = false;
        $_SESSION['errores'] = $errores;
      
     }


    }

    header('Location: index.php')
?>