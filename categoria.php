<?php
require_once 'includes/conexionBD.php';
?>

<?php
require_once 'includes/helpers.php';
?>

<?php
    $categoriaActual = ObtenerCategoria($DB, $_GET['id']);

    if(!isset($categoriaActual['id'])){
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

<div class="principal">


    <h1>Entradas de <?=$categoriaActual['nombre']?></h1>

    <?php
        	$entradas = conseguirEntradas($DB, null, $_GET['id']);
        if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
			while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
 <article id="entrada">
        <a href="entrada.php?id=<?= $entrada['id'] ?>">
            <h2><?=$entrada['titulo']?></h2>
            <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p>
                    <?=substr($entrada['descripcion'], 0, 200)."..."?>
                </p>
        </a>
    </article>

    <?php
            endwhile;
        else:
            ?>
                <div class="alerta">No hay entradas en esta categoría</div>
            <?php endif; ?>


</div> <!--FIN CONTENEDOR-->





<!--PIE DE PAGINA-->
<?php
    require_once'includes/footer.php';
?>



</body>
</html>