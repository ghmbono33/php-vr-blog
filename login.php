<?php
if (!isset($_POST)) header('Location: index.php');

require_once 'includes/conexion.php';
require_once 'includes/helpers.php';

// Iniciar sesión
if (!isset($_SESSION)) {
  session_start();
}

$email = postBDatos("email");
$password = postBDatos("password");

// Array de errores
$errores = [];

// Validar el email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errores['email'] = "El email no es válido";
}

// Validar la contraseña
if (empty($password)) {
  $errores['password'] = "La contraseña está vacía";
}


if (count($errores) == 0) { //No hay errores
  // Consulta para comprobar las credenciales del usuario
  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $login = mysqli_query($db, $sql);

  // NOTA MBA: Importante comprobar que devuelve 1, ya que aunque no devuelva nada $login devuelve 'true'
  if ($login && mysqli_num_rows($login) == 1) {
    $usuario = mysqli_fetch_assoc($login);
    // Comprobar la contraseña
    $verify = password_verify($password, $usuario['password']);

    if ($verify) {
      // Utilizar una sesión para guardar los datos del usuario logueado
      $_SESSION['usuario'] = $usuario;
    } else {
      $errores["general"] = "Contraseña incorrecta";
    }
  } else {
    $errores["general"] = "No existe este usuario";
  }
}
$_SESSION['err_login'] = $errores;
header('Location: index.php');
