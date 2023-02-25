<?php
session_start();
if (!isset($_SESSION["usuario"])  || !isset($_POST)) {
  // para que no entren por la url
  header("location:index.php");
}

require_once "includes/helpers.php";
require_once "includes/conexion.php";

$id = $_POST["id"];
if ($_POST["eliminar"]) {
  // Eliminamos la entrada
  $sql = "DELETE FROM entradas WHERE id=$id";
  $query = mysqli_query($db, $sql);
  // header("location:index.php");
  $mensaje = "Se ha eliminado la entrada";
  if (!$query) {
    $mensaje = "No se ha podido eliminar la entrada";
  }
  echo "<script>alert('$mensaje');window.location.href='index.php'</script>";
  die();
}

$titulo = postBDatos("titulo");
$descripcion = postBDatos("descripcion");
$categoria_id = postBDatos("categoria_id");
$errores = [];
if (empty($titulo)) {
  $errores['titulo'] = "Introduzca el título";
}
if (empty($descripcion)) {
  $errores['descripcion'] = "Introduzca la descripción";
}
if (empty($categoria_id)) {
  $errores['categoria'] = "Introduzca la categoría";
}

if (count($errores) == 0) {
  $idUsuario = $_SESSION["usuario"]["id"];
  $sql = "";
  if ($id) {
    // Modificamos 
    $sql =
      "UPDATE ENTRADAS SET  
      usuario_id = $idUsuario, categoria_id = $categoria_id, titulo = '$titulo', descripcion = '$descripcion', fecha = CURDATE()
     WHERE id=$id";
  } else {
    $sql = "INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion, fecha ) 
            values ('$idUsuario', '$categoria_id', '$titulo', '$descripcion', CURDATE());";
  }
  entrada_log($sql);
  echo "<h3>$sql</h3>";
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
header("location:mnto-entrada.php?id=$id");
