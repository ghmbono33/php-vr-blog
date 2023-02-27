<?php
if (isset($_POST)) {

  // Conexión a la base de datos
  require_once 'includes/conexion.php';
  require_once 'includes/helpers.php';

  // Iniciar sesión
  if (!isset($_SESSION)) {
    session_start();
  }

  // Recorger los valores del formulario de registro
  //  Con mysqli_real_escape_string podemos escapar las comillas, etc
  $_SESSION["registro"] = $_POST;
  var_dump($_SESSION["registro"]);
  $nombre = postBDatos("nombre");
  $apellidos = postBDatos("apellidos");
  $email = postBDatos("email");
  $password = postBDatos("password");

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
  // Nos aseguramos que no haya otro usuario con el mismo email
  $sql = "SELECT email FROM usuarios WHERE trim(lcase(email)) = '" . trim(strtolower($email)) . "'";
  $query = mysqli_query($db, $sql);
  if ($query && mysqli_num_rows($query) > 0) {
    $errores['email'] = "Ya existe otro usuario con el mismo email!!";
  }

  // Validar la contraseña
  if (empty($password)) {
    $errores['password'] = "La contraseña está vacía";
  }

  if (count($errores) == 0) {

    // Cifrar la contraseña
    $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
    $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
    $guardar = mysqli_query($db, $sql);

    if ($guardar) {
      $_SESSION['completado'] = "El registro se ha completado con éxito";
    } else {
      $_SESSION['err_registro']['general'] = "Fallo al guardar el usuario en la BD!!";
    }
  } else {
    $_SESSION['err_registro'] = $errores;
  }
}

header('Location: index.php');
