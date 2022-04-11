<?php
if(isset($_POST)){

    //Conexion a la BD
    require_once 'includes/conexionBD.php';

    $titulo = isset($_POST['txtTitulo']) ? mysqli_real_escape_string($DB, $_POST['txtTitulo']): false;
    $descripcion =  isset($_POST['txtDescripcion']) ? mysqli_real_escape_string($DB, $_POST['txtDescripcion']): false;
    $categoria =  isset($_POST['selCategoria']) ? (int)$_POST['selCategoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    //Array de errores
    $errores= array();

      //Validar Titulo
      if(empty($titulo)){
         $errores['titulo'] ="El titulo no es valido";
     }

     //Validar Descripcion
     if(empty($descripcion)){
         $errores['descripcion'] ="La descripcion no es valida";
     }

     //Validar Categoria
     if(empty($categoria) && !is_numeric($categoria)){
         $errores['categoria'] ="La categoria no es valida";
     }
   
    //Validacion si no llegan errores
    if(count($errores) == 0){
        $sql = "INSERT INTO entradas VALUES(null, $usuario , $categoria, '$titulo', '$descripcion', CURDATE())";
        if(isset($_GET['editar'])){
            $entrada_id=$_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET categoria_id='$categoria', titulo ='$titulo', descripcion ='$descripcion'"."WHERE id =$entrada_id AND usuario_id =$usuario_id" ; 
        }

        $guardar_entradas = mysqli_query($DB, $sql);

         header('Location: index.php');
  
        
    }else{
        $guardar_entradas = false;
        $_SESSION['errores_entradas'] = $errores;
        if(isset($_GET['editar'])){
        header('Location: editar-entrada.php?id='.$_GET['editar']);

        }

        header('Location: crear-entradas.php');

      
    }
    

}
?>