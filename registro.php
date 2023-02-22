<?php
if (isset($_POST)) {

  // Conexión a la base de datos
  require_once 'includes/conexion.php';

  // Iniciar sesión
  if (!isset($_SESSION)) {
    session_start();
  }

  // Recorger los valores del formulario de registro
  //  Con mysqli_real_escape_string podemos escapar las comillas, etc
  $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
  $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
  $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
  $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

  // Array de errores
  $errores = [];

  // Validar los datos antes de guardarlos en la base de datos
  // Validar campo nombre
  if (empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) {
    $errores['nombre'] = "El nombre no es válido";
  }

  // Validar apellidos
  if (empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)) {
    $errores['apellidos'] = "El apellidos no es válido";
  }

  // Validar el email
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = "El email no es válido";
  }

  // Validar la contraseña
  if (empty($password)) {
    $errores['password'] = "La contraseña está vacía";
  }

  $guardar_usuario = false;

  if (count($errores) == 0) {
    $guardar_usuario = true;

    // Cifrar la contraseña
    $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

    // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
    $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
    $guardar = mysqli_query($db, $sql);

    if ($guardar) {
      $_SESSION['completado'] = "El registro se ha completado con éxito";
    } else {
      $_SESSION['errores']['general'] = "Fallo al guardar el usuario en la BD!!";
    }
  } else {
    $_SESSION['errores'] = $errores;
  }
}

header('Location: index.php');
