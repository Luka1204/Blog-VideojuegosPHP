<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php';?>

<div class="principal">
    <h1>Crear Entradas</h1>

    <form action ="guardar-entradas.php" method="POST">
    <p>Añade nuevas entradas al blog para que los usuarios puedan 
    leerlas y disfrutar de nuestro contenido.</p>
    <br>
        <label for="txtTitulo">Titulo:</label>
        <input type="text" name="txtTitulo">
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'],'titulo') :'' ?>

        <label for="txtDescripcion">Descripción:</label>
        <textarea name="txtDescripcion"></textarea>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'],'descripcion') :'' ?>


        <label for="selCategoria">Categoria:</label>
        <select name="selCategoria">
        <?php $categorias = ObtenerCategorias($DB); 
        if (!empty($categorias)):
            while($categoria = mysqli_fetch_assoc($categorias)):
        ?>
            <option value= <?=$categoria['id'] ;?>>
            <?=$categoria['nombre']; ?>
            </option>
        <?php endwhile; endif; ?>
        </select>

        <input type="submit" value="Guardar">

        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'],'categoria') :'' ?>
        <?php borrarErrores() ?>

    </form>


</div>

<?php require_once 'includes/aside.php';?>

<?php require_once 'includes/footer.php'; ?>