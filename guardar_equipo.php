<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Incluir archivo de conexión
require_once 'conection.php';

// Obtener datos del formulario
$placa = $_POST['placa'];
$tipo_de_maquina = $_POST['tipo_de_maquina'];
$quien_recoge_equipo = $_POST['quien_recoge_equipo'];
$fecha_llegada = $_POST['fecha_llegada'];
$fecha_salida = $_POST['fecha_salida'];

// Preparar la consulta SQL para la tabla nuevos
$sql = "INSERT INTO nuevos (placa, tipo_de_maquina, quien_recoge_equipo, fecha_llegada, fecha_salida) 
        VALUES (?, ?, ?, ?, ?)";

// Preparar statement
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssss", $placa, $tipo_de_maquina, $quien_recoge_equipo, $fecha_llegada, $fecha_salida);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "<script>
            alert('Equipo guardado exitosamente');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "Error al guardar: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conexion->close();
?>
    