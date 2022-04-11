<?php
require_once 'includes/conexionBD.php';
?>

<?php
require_once 'includes/helpers.php';
?>



<!--Barra Lateral-->
    <aside id="side-bar">

    <?php if(isset($_SESSION['usuario'])):?>
        <div id="usuario_logueado" class="bloque">
        <h3>Bienvenido, <?=$_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellidos'] ?></h3>
        <!--Botones-->
        <a href="crear-entradas.php" class="boton boton-verde">Crear Entradas</a>
        <a href="crear-categoria.php" class="boton boton-azul">Crear Categorias</a>
        <a href="mis-datos.php" class="boton boton-naranja">Mis Datos</a>
        <a href="cerrar-sesion.php" class="boton">Cerrar Sesión</a>

        </div>
        <?php endif;?>

        <?php if(isset($_SESSION['error_login'])):?>
        <div id="error_logueo" class="alerta alerta alerta-error">
        <h3><?=$_SESSION['error_login'] ?></h3>

        </div>
        <?php endif;?>

        <div id="Buscador" class="bloque">
            <h3>Buscador</h3>
            <form action="buscar.php" method="POST">

                <input type="text" name="txtBusqueda" placeholder="Buscar...">
                 <input type="submit" value="Buscar">
  
            </form>
        </div>

        <?php if(!isset($_SESSION['usuario'])): ?>
        <div id="login" class="bloque">
            <h3>Entra a tu cuenta</h3>
            <form action="login.php" method="POST">

                <label for="txtEmail">Email</label>
                <input type="email" name="txtEmail">

                 <label for="txtPass">Contraseña</label>
                 <input type="password" name="txtPass">

                 <input type="submit" value="Entrar">
  
            </form>
        </div>

        <div id="register" class="bloque">
    
            <h3>¿No tienes cuenta? Registrate</h3>

    <!--Mostrar Errores-->
            <?php if(isset($_SESSION['completado'])): ?>
                    <div class="alerta alerta-exito">
                    <?=($_SESSION['completado']);?>
                </div>

                <?php elseif(isset($_SESSION['errores']['general'])):?>
                    <div class="alerta alerta-error">
                    <?=($_SESSION['errores']['general']);?>
                </div>
                <?php endif; ?>

            <form action="registro.php" method="POST">

                <label for="txtNombre">Nombre</label>
                <input type="text" name="txtNombre" required="required" value="<=? $_SESSION{?>">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') :'' ?>

                <label for="txtApellido">Apellido</label>
                <input type="text" name="txtApellido" required="required">
                <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'apellido'):'' ?>


                <label for="txtEmail">Email</label>
                <input type="email" name="txtEmail" required="required">
                <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'email'):'' ?>

                 <label for="txtPass">Contraseña</label>
                 <input type="password" name="txtPass" minlength = "5" required="required">
                <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'password'):'' ?>


                 <input type="submit" name="submit" value="Registrarse">
  
            </form>
            <?php borrarErrores();?>

            
        </div>
        <?php endif; ?>
    </aside>


