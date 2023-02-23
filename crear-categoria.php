<?php
require_once "includes/redireccion.php"; /* Comprueba si está logueado y sino vuelve a index.php */
require_once "includes/cabecera.php";
require_once "includes/lateral.php";
?>
<!-- CAJA PRINCIPAL -->
<style>
  input[type="submit"] {
    display: inline !important;
  }

  input[type="button"] {
    display: inline !important;
    background-color: grey;
  }
</style>
<div id="principal">
  <h1>Crear categorías</h1>
  <p>
    Añade nuevas categorias al blog para que los usuarios puedan
    usarlas al crear sus entradas.
  </p> <br>

  </p>
  <form action="guardar-categoria.php" method="post">
    <?= mostrarCompletado() ?>
    <label for="nombre">Nombre de la categoría:</label>
    <input type="text" name="nombre" />
    <?= mostrarError("err_categoria", "nombre") ?>
    <input type="submit" value="Guardar" />
    <input type="button" value="Salir" onclick="window.location.replace('index.php')">
    <?= mostrarError("err_categoria", "general") ?>
  </form>
  <?php borrarErrores(); ?>

</div>
<?php require_once "includes/pie.php" ?>