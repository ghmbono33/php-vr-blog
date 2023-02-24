<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
  <h1>Entrada seleccionada</h1>
  <?= obtenerEntradas(null, null, null, $_GET["id"]) ?>
  <a href=""></a>
</div> <!--fin principal-->

<?php require_once 'includes/pie.php'; ?>