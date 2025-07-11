<?php
$servername = "localhost";
$username = "root";
$password = ""; // Sin contraseña

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE IF NOT EXISTS equipos";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada correctamente.<br>";
} else {
    echo "Error al crear la base de datos: " . $conn->error . "<br>";
}

// Seleccionar la base de datos
$conn->select_db("equipos");

// Crear tabla equipos
$sql = "CREATE TABLE IF NOT EXISTS nuevos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(50) NOT NULL,
    tipo_de_maquina VARCHAR(50) NOT NULL,
    quien_recoge_equipo VARCHAR(100) NOT NULL,
    fecha_llegada DATE NOT NULL,
    fecha_salida DATE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'nuevos' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla 'nuevos': " . $conn->error . "<br>";
}

// Crear tabla usuarios
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'usuarios' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla 'usuarios': " . $conn->error . "<br>";
}

// Insertar usuario admin por defecto (contraseña: admin123)
$hash = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
$sql = "INSERT IGNORE INTO usuarios (username, password) VALUES ('admin', '$hash')";
if ($conn->query($sql) === TRUE) {
    echo "Usuario admin creado correctamente.<br>";
} else {
    echo "Error al crear el usuario admin: " . $conn->error . "<br>";
}

$conn->close();
?> 