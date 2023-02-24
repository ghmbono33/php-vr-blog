<?php
require_once "includes/redireccion.php"; /* Comprueba si está logueado y sino vuelve a index.php */
require_once "includes/cabecera.php";
require_once "includes/lateral.php";
?>
<!-- CAJA PRINCIPAL -->

<div id="principal">
  <h1>Mis Datos</h1>
  </p>
  <form action="actualizar-usuario.php" method="post">
    <?= mostrarCompletado() ?>
    <label for="nombre">Nombre:</label>
    <?= mostrarError("err_misdatos", "nombre");  ?>
    <input type="text" name="nombre" id="nombre">
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos">
    <?= mostrarError("err_misdatos", "apellidos");  ?>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <?= mostrarError("err_misdatos", "email");  ?>
    <div id="botones">
      <input type="submit" value="Actualizar" />
      <input type="button" value="Salir" onclick="window.location.replace('index.php')">
    </div>
    <?= mostrarError("err_misdatos", "general") ?>
  </form>
  <?php borrarErrores(); ?>

</div>
<?php require_once "includes/pie.php" ?>