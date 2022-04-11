<?php
	if(!isset($_POST['txtBusqueda'])){
		header("Location: index.php");
	}
?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/aside.php'; ?>
		
<!-- CAJA PRINCIPAL -->
<div id="principal">

	<h1>Busqueda: <?=$_POST['txtBusqueda']?></h1>
	
	<?php 
		$entradas = conseguirEntradas($DB, null, null, $_POST['txtBusqueda']);

		if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
			while($entrada = mysqli_fetch_assoc($entradas)):
	?>
				<article class="entrada">
					<a href="entrada.php?id=<?=$entrada['id']?>">
						<h2><?=$entrada['titulo']?></h2>
						<span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
						<p>
							<?=substr($entrada['descripcion'], 0, 180)."..."?>
						</p>
					</a>
				</article>
	<?php
			endwhile;
		else:
	?>
		<div class="alerta">No hay entradas en esta categoría</div>
	<?php endif; ?>
</div> <!--fin principal-->
			
<?php require_once 'includes/footer.php'; ?>