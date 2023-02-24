<?php require_once 'includes/cabecera.php'; ?>

<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
  <h1>Todas las entradas</h1>
  <article>
    <?= obtenerEntradas() ?>
  </article>
</div> <!--fin principal-->

<?php require_once 'includes/pie.php'; ?>