<?php

// Iniciar la sesión
if (!isset($_SESSION)) {
  session_start();
}
// Conexión BD
$db = mysqli_connect("localhost", "root", "", "blog_master");
mysqli_query($db, "SET NAMES 'utf8'");
