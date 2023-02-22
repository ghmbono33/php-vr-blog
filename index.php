<?php
require_once "includes/cabecera.php";

?>

<?php require_once "includes/lateral.php" ?>
<!-- CAJA PRINCIPAL -->
<div id="principal">
  <h1>Últimas entradas</h1>
  <article>
    <a href="">
      <h2>Título de mi entrada</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor ad quas sed quaerat sint eaque similique quos! Eius eligendi soluta amet sint modi adipisci enim ex repellendus inventore! Earum!</p>
    </a>
    <?= obtenerUltimasEntradas() ?>
  </article>
  <div id="ver-todas">
    <a href="">Ver todas las entradas</a>
  </div>
</div>

<!-- Fin PRINCIPAL -->
<?php require_once "includes/pie.php" ?>