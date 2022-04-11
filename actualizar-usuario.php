<?php
if(isset($_POST)){
	
	// Conexión a la base de datos
	require_once 'includes/conexionBD.php';

	// Recorger los valores del formulario de actulizacion
	$nombre = isset($_POST['txtNombre']) ? mysqli_real_escape_string($DB, $_POST['txtNombre']) : false;
	$apellidos = isset($_POST['txtApellido']) ? mysqli_real_escape_string($DB, $_POST['txtApellido']) : false;
	$email = isset($_POST['txtEmail']) ? mysqli_real_escape_string($DB, trim($_POST['txtEmail'])) : false;

	// Array de errores
	$errores = array();
	
	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
	}
	
	// Validar apellidos
	if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellidos_validado = true;
	}else{
		$apellidos_validado = false;
		$errores['apellido'] = "Los apellidos no son válido";
	}
	
	// Validar el email
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;
	}else{
		$email_validado = false;
		$errores['email'] = "El email no es válido";
	}
	
	$guardar_usuario = false;
	
	if(count($errores) == 0){
		$usuario = $_SESSION['usuario'];
		$guardar_usuario = true;
		
		// COMPROBAR SI EL EMAIL YA EXISTE
		$sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
		$isset_email = mysqli_query($DB, $sql);
		$isset_user = mysqli_fetch_assoc($isset_email);
		
		if($isset_user['id'] == $_SESSION['usuario']['id']|| empty($isset_user)){
			// ACTULIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
			
			$sql = "UPDATE usuarios SET ".
				   "nombre = '$nombre', ".
				   "apellidos = '$apellidos', ".
				   "email = '$email' ".
				   "WHERE id = ".$usuario['id'];
			$guardar = mysqli_query($DB, $sql);


			if($guardar){
				$_SESSION['usuario']['nombre'] = $nombre;
				$_SESSION['usuario']['apellidos'] = $apellidos;
				$_SESSION['usuario']['email'] = $email;

				$_SESSION['completado'] = "Tus datos se han actualizado con éxito";
			}else{
				$_SESSION['errores']['general'] = "Fallo al guardar el actulizar tus datos!!";
			}
		}else{
			$_SESSION['errores']['general'] = "El usuario ya existe!!";
		}
		
	}else{
		$_SESSION['errores'] = $errores;
	}
}

header('Location: mis-datos.php');

      
header('Location: mis-datos.php');

?>