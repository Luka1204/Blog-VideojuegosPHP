
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
    <h1>Ultimas Entradas</h1>

    <?php
        $entradas = Obtener_UltimasEntradas($DB);
        if(!empty($entradas)):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
 <article id="entrada">
        <a href="entrada.php?id=<?= $entrada['id'] ?>">
            <h2><?=$entrada['titulo']?></h2>
            <span class="fecha"><?=$entrada['nombre'].' | '.$entrada['fecha']?></span>
                <p>
                <?php if(strlen($entrada['descripcion'] > 180)): ?>
                    <?=substr($entrada['descripcion'], 0, 180)."..."?>
                <?php else: ?>
                    <?=$entrada['descripcion']?>
                <?php endif; ?>
                </p>
        </a>
    </article>

    <?php
            endwhile;
        endif;
    ?>
   

    <div id="ver-todas">
        <a href="entradas.php"> Ver todas las entradas</a>
    </div>

</div> <!--FIN CONTENEDOR-->





<!--PIE DE PAGINA-->
<?php
    require_once'includes/footer.php';
?>



</body>
</html>