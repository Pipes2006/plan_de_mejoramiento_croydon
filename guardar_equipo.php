<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "croydon_equipos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$placa = $_POST['placa'];
$tipo_de_maquina = $_POST['tipo_de_maquina'];
$quien_recoge_equipo = $_POST['quien_recoge_equipo'];
$fecha_llegada = $_POST['fecha_llegada'];
$fecha_salida = $_POST['fecha_salida'];

// Preparar la consulta SQL
$sql = "INSERT INTO equipos (placa, tipo_de_maquina, quien_recoge_equipo, fecha_llegada, fecha_salida) 
        VALUES (?, ?, ?, ?, ?)";

// Preparar statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $placa, $tipo_de_maquina, $quien_recoge_equipo, $fecha_llegada, $fecha_salida);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "<script>
            alert('Equipo guardado exitosamente');
            window.location.href = 'index.html';
          </script>";
} else {
    echo "Error al guardar: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
    