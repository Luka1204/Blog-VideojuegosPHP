<?php
require_once 'includes/conexionBD.php';
?>

<?php
require_once 'includes/helpers.php';
?>

<?php
    $entradaActual = ConseguirEntrada($DB, $_GET['id']);

    if(!isset($entradaActual['id'])){
        header('Location: index.php');
    }
?>

<!--Cabecera-->
<?php
require_once 'includes/cabecera.php';
?>

<!--Contenedor(Cuerpo)-->

    <?php
    require_once 'includes/aside.php';
    ?>
<!--CAJA PRINCIPAL-->
<h1>Editar Entradas</h1>
<div class="principal">
<form action ="guardar-entradas.php?editar=<?=$entradaActual['id']?>" method="POST">
    <p>Edita tu entrada <?= $entradaActual['titulo']?></p>
    <br>
        <label for="txtTitulo">Titulo:</label>
        <input type="text" name="txtTitulo" value="<?=$entradaActual['titulo']?>">
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'],'titulo') :'' ?>

        <label for="txtDescripcion">Descripción:</label>
        <textarea name="txtDescripcion"><?=$entradaActual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'],'descripcion') :'' ?>


        <label for="selCategoria">Categoria:</label>
        <select name="selCategoria">
        <?php $categorias = ObtenerCategorias($DB); 
        if (!empty($categorias)):
            while($categoria = mysqli_fetch_assoc($categorias)):
        ?>
            <option value= "<?=$categoria['id'] ;?>" <?= ($categoria['id'] == $entradaActual['categoria_id']) ? 'selected="selected"' : '' ?>>
            <?=$categoria['nombre']; ?>
            </option>
        <?php endwhile; endif; ?>
        </select>

        <input type="submit" value="Guardar">

        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'],'categoria') :'' ?>
        <?php borrarErrores() ?>

    </form>
</div>

<?php require_once 'includes/footer.php'; ?>