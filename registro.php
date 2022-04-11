<?php


if(isset($_POST)){
    //Conexion a BD
    require_once 'includes/conexionBD.php';
    //Inicia la sesion

    if(!isset($_SESSION)){
        session_start();
    }
   

    //Obtenemos los valores del formulario de registro
    
        $nombre = isset($_POST['txtNombre']) ? mysqli_real_escape_string($DB, $_POST['txtNombre']): false;
        $apellido = isset($_POST['txtApellido']) ? mysqli_real_escape_string($DB, $_POST['txtApellido'])  : false;
        $email = isset($_POST['txtEmail']) ? mysqli_real_escape_string($DB, trim( $_POST['txtEmail'])): false;
        $password = isset($_POST['txtPass']) ? mysqli_real_escape_string($DB, trim($_POST['txtPass'])) : false;

        //Array de errores
    $errores = array();
   
    //Validar datos antes de subirlos a la base de datos

    //Validar Nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
       $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] ="El nombre no es valido";
    }

    //Validar Apellidos
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellido_validado = true;
     }else{
         $apellido_validado = false;
         $errores['apellido'] ="El apellido no es valido";
     }

     //Validar Email
     if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
     }else{
         $email_validado = false;
         $errores['email'] ="El email no es valido";
     }

     //Validar La contraseña
     if(!empty($password)){
        $password_validado = true;
     }else{
         $password_validado = false;
         $errores['password'] ="La contraseña esta vacia";
     }

     $guardar_usuario = false;
     
     if(count($errores) == 0){

        //Cifrar la contraseña
        $password_secure = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$email', '$password_secure', CURDATE())";
        $guardar = mysqli_query($DB, $sql);
        if($guardar){
            $_SESSION['completado'] = "El registro fue exitoso";
        }else{
            $_SESSION['errores']['general'] = "Error en el registro de datos";
        }

         //INSERTAR USUARIO EN BD
     $guardar_usuario = true;
     }else{
        $guardar_usuario = false;
        $_SESSION['errores'] = $errores;
      
     }


   
}
      
header('Location: index.php');
?>