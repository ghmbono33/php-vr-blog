<?php
if (!$_POST || !isset($_SESSION["usuario"])) {
  // para que no entren por la url
  header("location:index.php");
}

// Conexión a la base de datos
require_once 'includes/conexion.php';
// funciones 
require_once 'includes/helpers.php';

// Recorger los valores del formulario de registro
//  Con mysqli_real_escape_string podemos escapar las comillas, etc
$nombre = postBDatos("nombre");
$apellidos = postBDatos("apellidos");
$email = postBDatos("email");

// Array de errores
$errores = [];

// Validar los datos antes de guardarlos en la base de datos
// Validar campo nombre
if (empty($nombre) || preg_match("/[0-9]/", $nombre)) {
  $errores['nombre'] = "El nombre no es válido";
}

// Validar apellidos
if (empty($apellidos) || preg_match("/[0-9]/", $apellidos)) {
  $errores['apellidos'] = "El apellidos no es válido";
}

// Validar el email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errores['email'] = "El email no es válido";
}


if (count($errores) == 0) {
  $usuario = $_SESSION['usuario'];

  // COMPROBAR SI EL EMAIL YA EXISTE
  $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
  $isset_email = mysqli_query($db, $sql);
  $isset_user = mysqli_fetch_assoc($isset_email);

  if ($isset_user['id'] != $usuario['id']  &&  !empty($isset_user['id'])) {
    $_SESSION['err_misdatos']['general'] = "Este email pertenece a otro usuario!!";
  } else {
    // ACTUALIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
    // Si es el mismo email se actualizará ese 

    $sql = "UPDATE usuarios SET " .
      "nombre = '$nombre', " .
      "apellidos = '$apellidos', " .
      "email = '$email' " .
      "WHERE id = " . $usuario['id'];
    $guardar = mysqli_query($db, $sql);
    if ($guardar) {
      $_SESSION['usuario']['nombre'] = $nombre;
      $_SESSION['usuario']['apellidos'] = $apellidos;
      $_SESSION['usuario']['email'] = $email;
      $_SESSION['completado'] = "Tus datos se han actualizado con éxito";
    } else {
      $_SESSION['err_misdatos']['general'] = "Fallo al guardar el actulizar tus datos!!";
    }
  }
} else {
  $_SESSION['err_misdatos'] = $errores;
}

header('Location: mis-datos.php');
