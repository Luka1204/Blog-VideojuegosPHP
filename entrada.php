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

<div class="principal">


    <h1><?=$entradaActual['titulo']?></h1>
    <a href="categoria.php?id=<?=$entradaActual['categoria_id']?>">
    <h2><?=$entradaActual['categoria']?></h2>
    </a>
    
    <h4><?=$entradaActual['fecha']?> | <?= $entradaActual['usuario'] ?></h4>
    
    <p>
    <?=$entradaActual['descripcion']?></h2>

    </p>

    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entradaActual['usuario_id']): ?>
        <a href="editar-entrada.php?id=<?= $entradaActual['id'] ?>" class="boton boton-verde">Editar Entradas</a>
        <a href="borrar-entrada.php?id=<?= $entradaActual['id'] ?>" class="boton boton-azul">Borrar Entradas</a>
    <?php endif; ?>

    <div id="volver-menu">
        <a href="index.php">Volver Menú</a>
    </div>

</div> <!--FIN CONTENEDOR-->





<!--PIE DE PAGINA-->
<?php
    require_once'includes/footer.php';
?>



</body>
</html>