<?php require_once 'includes/redireccion.php' ?>
<?php require_once 'includes/cabecera.php';?>

<div class="principal">
    <h1>Crear Categorias</h1>

    <form action ="guardar-categoria.php" method="POST">
    <p>Añade nuevas categorias al blog para que los usuarios puedan 
    usarlas al crear sus entradas.</p>
    <br>
        <label>Nombre de la categoria</label>
        <input type="text" name="txtNombre">

        <input type="submit" value="Guardar">
    </form>

</div>

<?php require_once 'includes/aside.php';?>

<?php require_once 'includes/footer.php'; ?>