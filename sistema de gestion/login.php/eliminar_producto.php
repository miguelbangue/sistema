<?php
session_start(); // INICIA la sesión para usar $_SESSION

include "conexion.php";
if ($_SESSION['rol'] == 1 && isset($_GET['id'])) {
  $id = $_GET['id'];
  $conexion->query("DELETE FROM zapatillas WHERE id = $id");
  header("Location: bienvenido.php#productos");
  exit();
}
?>