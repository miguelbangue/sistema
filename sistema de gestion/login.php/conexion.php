<?php

//conexion

$conexion = new mysqli('localhost','root','','bd');

//verificar

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}