<?php
require_once "includes/cabecera.php";
require_once "includes/lateral.php";

?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
  <h1>Últimas entradas</h1>
  <article>
    <?= obtenerEntradas(true) ?>
  </article>
  <div id="ver-todas">
    <a href="entradas.php">Ver todas las entradas</a>
  </div>
</div>

<!-- Fin PRINCIPAL -->
<?php require_once "includes/pie.php" ?>