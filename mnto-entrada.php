<?php
require_once "includes/redireccion.php"; /* Comprueba si está logueado y sino vuelve a index.php */
require_once "includes/cabecera.php";
require_once "includes/lateral.php";
require_once "includes/conexion.php";
require_once "includes/helpers.php";

$crear = false;
$titulo = $descripcion = $categoria_id = "";

if (!isset($_GET["id"])) {
  $crear = true;
} else {
  // obtenemos la información de la entrada
  $sql = "SELECT * FROM entradas WHERE id=" . $_GET["id"];
  $query = mysqli_query($db, $sql);
  if ($query && mysqli_num_rows($query)== 1) {
    $registro = mysqli_fetch_assoc($query);
    $titulo = $registro["titulo"];
    $descripcion = $registro["descripcion"];
   $categoria_id = $registro["categoria_id"];
  } else {
    alerta("No existe ninguna entrada con ese código") ;
    die();
  }
}

?>

<div id="principal">
  <?php 
    if ($crear){
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

  <form action="guardar-entrada.php" method="post">
    <input type="hidden" name="crear" value=<?=$crear?1:0?>>
    <?= mostrarCompletado() ?>
    <label>Título:
    <input type="text" name="titulo"  value ="<?=$titulo?>"/>
    </label>    
    <?= mostrarError("err_entrada", "titulo") ?>

    <label>Descripción:
    <input type="text" name="descripcion" value="<?=$descripcion?>"/>
    </label>
    <?= mostrarError("err_entrada", "descripcion") ?>

    <label>Categoría:
    <select name="categoria" value="<?=$categoria_id?>">  
      <?=obtenerCategorias(false)?>
    </select>
    </label>
    <div id="botones">
      <input type="submit" value="Guardar" id="guardar" />
      <input type="button" value="Salir" id="salir" onclick="window.location.replace('index.php')">
    </div>
    <?= mostrarError("err_entrada", "general") ?>
  </form>
  <?php borrarErrores(); ?>

</div>
<?php require_once "includes/pie.php" ?>