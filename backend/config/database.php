<?php
$conexion = new mysqli("localhost", "root", "", "equipos");
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}
?>