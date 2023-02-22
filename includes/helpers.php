<?php

// function mostrarError($errores, $campo)
// {
//   $alerta = '';
//   if (isset($errores[$campo])) {
//     $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . '</div>';
//   }

//   return $alerta;
// }

function mostrarError($campoError)
{
  $alerta = '';
  if (isset($_SESSION["errores"][$campoError])) {
    $alerta = "<div class='alerta alerta-error'>" . $_SESSION["errores"][$campoError] . '</div>';
  }
  return $alerta;
}

function mostrarCompletado()
// Cuando se ha guardado la entrada en la BD
{
  $alerta = '';
  if (isset($_SESSION["completado"])) {
    $alerta = "<div class='alerta '>" . $_SESSION["completado"] . '</div>';
  }
  return $alerta;
}



function borrarErrores()
{
  $borrado = false;

  if (isset($_SESSION['errores'])) {
    $_SESSION['errores'] = null;
    $borrado = true;
  }

  if (isset($_SESSION['errores_entrada'])) {
    $_SESSION['errores_entrada'] = null;
    $borrado = true;
  }

  if (isset($_SESSION['completado'])) {
    $_SESSION['completado'] = null;
    $borrado = true;
  }

  return $borrado;
}
