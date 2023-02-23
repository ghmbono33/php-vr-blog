<?php
if (!$_POST) {
  // para que no entren por la url
  header("location:index.php");
}

require_once "includes/helpers.php";

$titulo = postBDatos("titulo");
$descripcion = postBDatos("descripcion");
$errores = [];
if (empty($nombre)) {
  $errores['nombre'] = "El nombre no es válido";
}
if (empty($descripcion)) {
  $errores['descripcion'] = "El descripción no es válida";
}

if (count($errores) == 0) {
  $sql = "INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion) values ('$nombre')";
  entrada_log($sql);
  $query = mysqli_query($GLOBALS["db"], $sql);
  if ($query) {
    entrada_log("completo");
    $_SESSION['completado'] = "La categoría se ha guardado correctamente.";
  } else {
    entrada_log("error general");
    $_SESSION['err_categoria']['general'] = "Fallo al guardar la categoría en la BD!!";
  }
} else {
  entrada_log("error categoria");
  $_SESSION['err_categoria'] = $errores;
}
header("location:crear-categoria.php");
