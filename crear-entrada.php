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
  <h1>Crear Entradas</h1>
  <p>
    Añade nuevas entradas al blog para que los usuarios puedan
    leerlas y disfrutar de nuestro contenido.
  </p> <br>

  </p>
  <form action="guardar-entrada.php" method="post">
    <?= mostrarCompletado() ?>
    <label for="nombre">Título:</label>
    <input type="text" name="titulo" />
    <?= mostrarError("err_entrada", "titulo") ?>

    <label for="nombre">Descripción:</label>
    <input type="text" name="descripcion" />
    <?= mostrarError("err_entrada", "descripcion") ?>

    <label for="nombre">Categoría:</label>
    <select name="categoria"> <?= obtenerCategorias(false) ?> </select>

    <input type="submit" value="Guardar" />
    <input type="button" value="Salir" onclick="window.location.replace('index.php')">
    <?= mostrarError("err_entrada", "general") ?>
  </form>
  <?php borrarErrores(); ?>

</div>
<?php require_once "includes/pie.php" ?>