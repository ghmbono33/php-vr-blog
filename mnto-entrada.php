<?php
require_once "includes/redireccion.php"; /* Comprueba si está logueado y sino vuelve a index.php */
require_once "includes/cabecera.php";
require_once "includes/lateral.php";
require_once "includes/conexion.php";
require_once "includes/helpers.php";

$id = 0;
$titulo = $descripcion = $categoria_id = "";

if (isset($_GET["id"]) && $_GET["id"]) {
  // obtenemos la información de la entrada, si la entrada es 0 (para crear) no pasará por aquí 
  $id = $_GET["id"];
  $sql = "SELECT * FROM entradas WHERE id=" . $id;
  $query = mysqli_query($db, $sql);
  if ($query && mysqli_num_rows($query) == 1) {
    $registro = mysqli_fetch_assoc($query);
    $titulo = $registro["titulo"];
    $descripcion = $registro["descripcion"];
    $categoria_id = $registro["categoria_id"];
  } else {
    echo '<br><div class="alerta alerta-error" "No existe ninguna entrada con ese código </div>';
    die();
  }
}

?>

<div id="principal">
  <?php
  if (!$id) {
    echo  "
        <h1>Crear Entradas</h1>
        <p>
          Añade nuevas entradas al blog para que los usuarios puedan
          leerlas y disfrutar de nuestro contenido.
        </p> 
        <br> ";
  } else {
    echo "<h1>Modificar Entrada</h1>";
  }
  ?>

  <form action="guardar-entrada.php" method="post" name="myForm">
    <input type="hidden" name="id" id="id" value="<?= $id ?>">
    <input type="hidden" name="eliminar" id="eliminar" value="0">
    <?= mostrarCompletado() ?>
    <label>Título:
      <input type="text" name="titulo" value="<?= $titulo ?>" />
    </label>
    <?= mostrarError("err_entrada", "titulo") ?>

    <label>Descripción:
      <input type="text" name="descripcion" value="<?= $descripcion ?>" />
    </label>
    <?= mostrarError("err_entrada", "descripcion") ?>

    <label>Categoría:
      <select name="categoria_id">
        <?= obtenerCategorias(false, $categoria_id) ?>
      </select>
    </label>
    <div id="botones">
      <input type="submit" value="Guardar" id="btnGuardar" />
      <input type="button" value="Salir" id="salir" onclick="window.location.replace('index.php')">
      <?php
      if ($id) {
        echo '<input type="button"  id="btnEliminar" 
              value="Eliminar" onclick="borrar()">';
      }
      ?>

    </div>
    <?= mostrarError("err_entrada", "general") ?>
  </form>
  <?php borrarErrores(); ?>

</div>
<script>
  function borrar() {
    const d = document;
    d.getElementById("eliminar").value = d.getElementById("id").value
    myForm.submit();
  }
</script>
<?php require_once "includes/pie.php" ?>