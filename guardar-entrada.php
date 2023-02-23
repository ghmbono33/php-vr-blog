<?php
if (!$_POST || !isset($_SESSION["usuario"])) {
  // para que no entren por la url
  header("location:index.php");
}

require_once "includes/helpers.php";

$titulo = postBDatos("titulo");
$descripcion = postBDatos("descripcion");
$categoria = postBDatos("categoria");
$errores = [];
if (empty($titulo)) {
  $errores['titulo'] = "Introduzca el título";
}
if (empty($descripcion)) {
  $errores['descripcion'] = "Introduzca la descripción";
}
if (empty($categoria)) {
  $errores['categoria'] = "Introduzca la categoría";
}

if (count($errores) == 0) {
  $idUsuario = $_SESSION["usuario"]["id"];
  $sql = "INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion, fecha ) 
          values ('$idUsuario', '$categoria', '$titulo', '$descripcion', CURDATE())";
  entrada_log($sql);
  $query = mysqli_query($GLOBALS["db"], $sql);
  if ($query) {
    entrada_log("completo");
    $_SESSION['completado'] = "La entrada se ha guardado correctamente.";
  } else {
    entrada_log("error general");
    $_SESSION['err_entrada']['general'] = "Fallo al guardar la entrada en la BD!!";
  }
} else {
  entrada_log("error entrada");
  $_SESSION['err_entrada'] = $errores;
}
header("location:crear-entrada.php");
