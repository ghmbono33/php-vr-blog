<?php
require_once "conexion.php";
require_once "helpers.php";
?>
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
        informe
      </a>
    </div>
    <!-- MENÚ -->
    <nav id="menu">
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <?= obtenerCategorias(); ?>
        <li><a href="">Sobre mí</a></li>
        <li><a href="">Contacto</a></li>
      </ul>
    </nav>
    <div class="clearfix"></div> <!-- para que borre los flotados -->
  </header>
  <div id="contenedor">