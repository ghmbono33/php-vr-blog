<?php
require_once "helpers.php";
// print_r($_SESSION);

?>
<!-- BARRA LATERAL -->
<aside id="sidebar">

  <div id="buscador" class="bloque">
    <h3>Buscar</h3>
    <form action="buscar.php" method="POST">
      <input type="text" name="busqueda" />
      <input type="submit" value="Buscar" />
    </form>
  </div>

  <?php if (isset($_SESSION['usuario'])) { ?>
    <div id="usuario-logueado" class="bloque">
      <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>
      <!--botones-->
      <a href="mnto-entrada.php?id=0" class="boton boton-verde">Crear entradas</a>
      <a href="crear-categoria.php" class="boton">Crear categoria</a>
      <a href="mis-datos.php" class="boton boton-naranja">Mis datos</a>
      <a href="cerrar.php" class="boton boton-rojo">Cerrar sesión</a>
    </div>
  <?php } else { ?>

    <div id="login" class="bloque">
      <h3>Identificarse</h3>
      <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <?= mostrarError("err_login", "email");  ?>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <?= mostrarError("err_login", "password");  ?>
        <input type="submit" value="Entrar">
        <?= mostrarError("err_login", "general");  ?>
      </form>
    </div>

    <div id="register" class="bloque">
      <h3>Regístrate</h3>
      <?= mostrarCompletado() ?>
      <form action="registro.php" method="POST">
        <label for="nombre">nombre:</label>
        <?= mostrarError("err_registro", "nombre");  ?>
        <input type="text" name="nombre" id="nombre">
        <label for="apellidos">apellidos:</label>
        <input type="text" name="apellidos" id="apellidos">
        <?= mostrarError("err_registro", "apellidos");  ?>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <?= mostrarError("err_registro", "email");  ?>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <?= mostrarError("err_registro", "password");  ?>
        <input type="submit" value="Registrarse">
        <?= mostrarError("err_registro", "general");  ?>

      </form>
      <?php borrarErrores(); ?>

    </div>
  <?php } ?>
</aside>