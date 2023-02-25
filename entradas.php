<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">

  <?php
  $busqueda = "";
  if (isset($_POST["busqueda"])) {
    $busqueda = $_POST["busqueda"];
    echo "<h1>Entradas con : $busqueda </h1>";
  } else {
    echo "<h1>Todas las Entradas</h1>";
  }
  echo obtenerEntradas(null, null, $busqueda);

  ?>
</div> <!--fin principal-->

<?php require_once 'includes/pie.php'; ?>