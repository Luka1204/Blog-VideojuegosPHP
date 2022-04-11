<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/aside.php';?>

<!--Principal-->
<div class="principal">
<h1>Mis datos</h1>

<!--Mostrar Errores-->
    <?php if(isset($_SESSION['completado']) && !null): ?>
            <div class="alerta alerta-exito">
            <?=($_SESSION['completado']);?>
        </div>

        <?php elseif(isset($_SESSION['errores']['general']) && !null):?>
            <div class="alerta alerta-error">
            <?=($_SESSION['errores']['general']);?>
        </div>
        <?php endif; ?>

    <form action="actualizar-usuario.php" method="POST">

        <label for="txtNombre">Nombre</label>
        <input type="text" name="txtNombre" required="required" value="<?= $_SESSION['usuario']['nombre']?> ">
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') :'' ?>

        <label for="txtApellido">Apellido</label>
        <input type="text" name="txtApellido" required="required" value= "<?= $_SESSION['usuario']['apellidos']?>" >
        <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'apellido'):'' ?>


        <label for="txtEmail">Email</label>
        <input type="email" name="txtEmail" required="required" value="<?= $_SESSION['usuario']['email']?>">
        <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'email'):'' ?>



         <input type="submit" name="submit" value="Actualizar">

    </form>
    <?php borrarErrores();?>
</div>

<!--Cierre-Principal-->




<?php require_once 'includes/footer.php'; ?>

