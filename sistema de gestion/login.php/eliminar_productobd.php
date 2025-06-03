<?php
session_start(); // INICIA la sesión para usar $_SESSION

include "conexion.php";
if ($_SESSION['rol'] == 1 && isset($_GET['id'])) {
  /* toma el valor numerico que seria el id y los otros valores solo son 
  puestos al azar para ocultar el id */
  $id = intval(preg_replace('/\D/', '', $_GET['id']));
  
  $conexion->query("DELETE FROM zapatillas WHERE id = $id");
  // Marcar como eliminado en vez de borrar
  /* $conexion->query("UPDATE zapatillas SET eliminado = 1 WHERE id = $id"); */

  header("Location: bienvenido.php#productos");
  exit();
}
?>