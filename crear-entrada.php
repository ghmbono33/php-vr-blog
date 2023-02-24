<?php
require_once "includes/redireccion.php"; /* Comprueba si está logueado y sino vuelve a index.php */
require_once "includes/cabecera.php";
require_once "includes/lateral.php";
?>
<!-- CAJA PRINCIPAL -->
<!-- <style>
  input[type="submit"] {
    display: inline !important;
    margin-right: 20px;
  }

  input[type="button"] {
    display: inline !important;
    background-color: grey;
  }

  select {
    padding: 5px;
    display: block;
    margin: 10px 0;
  }

  #botones {
    text-align: center;
  }
</style> -->
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
    <select id="chinchi" name="categoria"> <?= obtenerCategorias(false) ?> </select>
    <div id="botones">
      <input type="submit" value="Guardar" id="guardar" />
      <input type="button" value="Salir" id="salir" onclick="window.location.replace('index.php')">
    </div>
    <?= mostrarError("err_entrada", "general") ?>
  </form>
  <?php borrarErrores(); ?>

</div>
<?php require_once "includes/pie.php" ?>