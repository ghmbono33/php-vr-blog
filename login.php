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
  $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
  $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

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

  $validar_login = false;

  if (count($errores) == 0) {
    $validar_login = true;

    // Comprobar que existe el email en la BD
    $sql = "SELECT * FROM USUARIOS WHERE EMAIL='$email'";
    $usuario = mysqli_query($db, $sql);
    if (!$usuario) {
      $_SESSION['errores']['email'] = "Fallo al guardar el usuario en la BD!!";
    }
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
