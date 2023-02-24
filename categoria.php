<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
if (!isset($_GET["id"])) {
	header("location:index.php");
}
$id = $_GET["id"];
$categoria = obtenerUnaCategoria($id);

// if (!isset($categoria['id'])) {
if (!$categoria) {
	// No existe la categoría (posiblemente el usuario la ha introducido por la url)
	header("Location: index.php");
}
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
  <h1>Entradas de la categoría  <?=$categoria["nombre"]?> </h1>
	<?php 
		$html = obtenerEntradas(null, $id ) ;
		echo $html;
		if (!$html) {
			echo '<br><div class="alerta alerta-error">No hay entradas en esta categoría</div>';
		}
	?>
</div> <!--fin principal-->

<?php require_once 'includes/pie.php'; ?>