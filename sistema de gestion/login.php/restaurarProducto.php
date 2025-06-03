<?php
session_start();
include "conexion.php";

if ($_SESSION['rol'] == 1 && isset($_GET['id'])) {
    $id = intval(preg_replace('/\D/', '', $_GET['id']));
    
    // Restaurar el producto
    $conexion->query("UPDATE zapatillas SET eliminado = 0 WHERE id = $id");
    $men = 'se restauro el producto';
    header("Location: bienvenido.php#productos");
    exit();
}
?>
