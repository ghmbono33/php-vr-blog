<?php
session_start();
if (isset($_SESSION["usuario"])) {
  // Destroys all data registered to a session
  session_destroy();
}
header("Location:index.php");
