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


function obtenerUnaCategoria($id)
{
  $sql = "SELECT * FROM categorias WHERE id = $id;";
  $categorias = mysqli_query($GLOBALS["db"], $sql);
  $resultado = [];
  if ($categorias && mysqli_num_rows($categorias) == 1) {
    $resultado = mysqli_fetch_assoc($categorias);
  }

  return $resultado;
}

function obtenerCategorias($lista = true, $categoria_id = 0)
// $lista = true devuelve un <li>; false un <option>
{
  $sql = "SELECT * FROM categorias ORDER BY id ASC;";
  $categorias = mysqli_query($GLOBALS["db"], $sql);
  $html = "";

  while ($categoria = mysqli_fetch_assoc($categorias)) {
    if ($lista) {
      // Devuelve una lista <li><a href=""></a></li> de las categorías
      $html .=
        '<li><a href="entradas-categoria.php?id=' . $categoria["id"] . '">' .
        $categoria["nombre"] . '</a></li>';
    } else {
      // Devuelve opciones del desplegable
      $seleccionada =  $categoria["id"] == $categoria_id ? " selected " : "";
      $html .=
        '<option value="' .  $categoria["id"] . '"' . $seleccionada . '>' . $categoria["nombre"] . ' </option>';
    }
  }
  return $html;
}


function obtenerEntradas($limit = null, $categoria = null, $busqueda = null, $id = null)
// Devuelve las entradas en html
{
  $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e " .
    "INNER JOIN categorias c ON e.categoria_id = c.id ";

  if (!empty($categoria)) {
    $sql .= "WHERE e.categoria_id = $categoria ";
  }

  if (!empty($busqueda)) {
    $sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
  }
  if (!empty($id)) {
    $sql .= "WHERE e.id = $id ";
  }

  $sql .= " ORDER BY e.id DESC ";

  if ($limit) {
    $sql .= "LIMIT 4";
  }
  // echo "<h3>$sql</h3>";
  $entradas = mysqli_query($GLOBALS["db"], $sql);
  $html = "";
  while ($entrada = mysqli_fetch_assoc($entradas)) {
    $html .= '
    <article>
      <a href="mnto-entrada.php?id=' . $entrada["id"] . ' ">
        <h2>' . $entrada["titulo"] . '</h2>
        <span class="fecha">' . $entrada["categoria"] . ' | ' .
      date_format(date_create($entrada["fecha"]), "d/m/Y")  .
      '</span>
        <p>' . substr($entrada["descripcion"], 0, 150)  . '</p>
      </a>
    </article>
    ';
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
  fwrite($log, "$texto\n");
}

function alerta($mensaje, $tipo = "error")
{
  echo '<br><div class="alerta alerta' . $tipo . 'No hay entradas en esta categoría</div>';
}
function myIsset($variable, $defecto = "")
{
  return isset($variable) ? $variable : $defecto;
}
