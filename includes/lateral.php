<?php
require_once "helpers.php";
// print_r($_SESSION);

?>
<!-- BARRA LATERAL -->
<aside id="sidebar">

  <div id="login" class="bloque">
    <h3>Identificarse</h3>
    <form action="login.php" method="POST">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
      <input type="submit" value="Entrar">
    </form>
  </div>

  <div id="register" class="bloque">
    <h3>Regístrate</h3>
    <?= mostrarCompletado() ?>
    <form action="registro.php" method="POST">
      <label for="nombre">nombre:</label>
      <?= mostrarError("nombre");  ?>
      <input type="text" name="nombre" id="nombre">
      <label for="apellidos">apellidos:</label>
      <input type="text" name="apellidos" id="apellidos">
      <?= mostrarError("apellidos");  ?>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email">
      <?= mostrarError("email");  ?>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
      <?= mostrarError("password");  ?>
      <input type="submit" value="Registrarse">
      <?= mostrarError("general");  ?>

    </form>
    <?php borrarErrores(); ?>

  </div>
</aside>