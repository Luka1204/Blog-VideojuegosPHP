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
    <h1>Todas las entradas</h1>

    <?php
        $entradas = conseguirEntradas($DB,null);
        if(!empty($entradas)):
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
        endif;
    ?>
   


</div> <!--FIN CONTENEDOR-->





<!--PIE DE PAGINA-->
<?php
    require_once'includes/footer.php';
?>



</body>
</html>