<?php
require_once 'conexion.php';
function mostrarError($tipoError, $campoError)
{
  $alerta = '';
  if (isset($_SESSION[$tipoError][$campoError])) {
    $alerta = "<div class='alerta alerta-error'>" . $_SESSION[$tipoError][$campoError] . '</div>';
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
  $_SESSION['err_misdatos'] = null;
  $_SESSION['err_registro'] = null;
  $_SESSION['err_login'] = null;
  $_SESSION['err_categoria'] = null;
  $_SESSION['err_entrada'] = null;
  $_SESSION['completado'] = null;
}

function obtenerCategorias($lista = true)
// $lista = true devuelve un <li>; false un <option>
{
  $sql = "SELECT * FROM categorias ORDER BY id ASC;";
  $categorias = mysqli_query($GLOBALS["db"], $sql);
  $html = "";
  while ($categoria = mysqli_fetch_assoc($categorias)) {
    if ($lista) {
      // Devuelve una lista <li><a href=""></a></li> de las categorías
      $html .=
        '<li><a href="categoria.php?id=' . $categoria["id"] . '">' .
        $categoria["nombre"] . '</a></li>';
    } else {
      // Devuelve opciones del desplegable
      $html .=
        '<option value="' .  $categoria["id"] . '">' . $categoria["nombre"] . ' </option>';
    }
  }
  return $html;
}


function obtenerEntradas($limit = null, $categoria = null, $busqueda = null)
// Devuelve las entradas eh html
{
  $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
    "INNER JOIN categorias c ON e.categoria_id = c.id ";

  if (!empty($categoria)) {
    $sql .= "WHERE e.categoria_id = $categoria ";
  }

  if (!empty($busqueda)) {
    $sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
  }

  $sql .= "ORDER BY e.id DESC ";

  if ($limit) {
    $sql .= "LIMIT 4";
  }
  $entradas = mysqli_query($GLOBALS["db"], $sql);
  $html = "";
  while ($entrada = mysqli_fetch_assoc($entradas)) {
    $html .= '
    <a href="">
      <h2>' . $entrada["titulo"] . '</h2>
      <span class="fecha">' . $entrada["categoria"] . ' | ' .
      date_format(date_create($entrada["fecha"]), "d/m/Y")  .
      '</span>
      <p>' . substr($entrada["descripcion"], 0, 150)  . '</p>
    </a> ';
  }
  return $html;
}

function postBDatos($varPost)
{
  // Devuelve el post preparado para guardar en BD
  //  Con mysqli_real_escape_string podemos escapar las comillas, etc
  return  isset($_POST[$varPost]) ?  mysqli_real_escape_string($GLOBALS["db"], $_POST[$varPost]) : "";
};

function entrada_log($texto)
{
  $log = fopen("log.txt", "a");
  // fwrite($log, date("d/m/Y H:i:s"));
  fwrite($log, "$texto\n");
}
