<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <!-- CABECERA -->
  <header id="cabecera">
    <div id="logo">
      <a href="index.php">
        Blog
      </a>
    </div>
    <!-- MENÚ -->
    <nav id="menu">
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="">Categoría 1</a></li>
        <li><a href="">Categoría 2</a></li>
        <li><a href="">Categoría 3</a></li>
        <li><a href="">Categoría 4</a></li>
        <li><a href="">Sobre mí</a></li>
        <li><a href="">Contacto</a></li>
      </ul>
    </nav>
    <div class="clearfix"></div> <!-- para que borre los flotados -->
  </header>
  <div id="contenedor">
    <aside id="sidebar">
      <!-- BARRA LATERAL -->
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
        <form action="registro.php" method="POST">
          <label for="nombre">nombre:</label>
          <input type="text" name="nombre" id="nombre">
          <label for="apellidos">apellidos:</label>
          <input type="text" name="apellidos" id="apellidos">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email">
          <label for="password">Password:</label>
          <input type="password" name="password" id="password">
          <input type="submit" value="Registrarse">
        </form>
      </div>
    </aside>
    <!-- CAJA PRINCIPAL -->
    <div id="principal">
      <h1>Últimas entradas</h1>
      <article>
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor ad quas sed quaerat sint eaque similique quos! Eius eligendi soluta amet sint modi adipisci enim ex repellendus inventore! Earum!</p>
        </a>
      </article>
      <article>
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor ad quas sed quaerat sint eaque similique quos! Eius eligendi soluta amet sint modi adipisci enim ex repellendus inventore! Earum!</p>
        </a>
      </article>
      <article>
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor ad quas sed quaerat sint eaque similique quos! Eius eligendi soluta amet sint modi adipisci enim ex repellendus inventore! Earum!</p>
        </a>
      </article>
      <article>
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor ad quas sed quaerat sint eaque similique quos! Eius eligendi soluta amet sint modi adipisci enim ex repellendus inventore! Earum!</p>
        </a>
      </article>
      <article>
        <a href="">
          <h2>Título de mi entrada</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor ad quas sed quaerat sint eaque similique quos! Eius eligendi soluta amet sint modi adipisci enim ex repellendus inventore! Earum!</p>
        </a>
      </article>
      <div id="ver-todas">
        <a href="">Ver todas las entradas</a>
      </div>
      <!-- Fin PRINCIPAL -->
    </div>
    <div class="clearfix"></div>
  </div>
  <!-- PIE DE PÁGINA -->
  <footer id="pie">
    <p>Desarrollado por MBA &copy; 2023</p>
  </footer>
</body>

</html>