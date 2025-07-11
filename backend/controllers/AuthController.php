<?php
session_start();

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "equipos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta SQL
    $sql = "SELECT username, password FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Comparar directamente la contraseña en texto plano
        if ($password === $row['password']) {
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        } else {
            echo "<script>
                    alert('Contraseña incorrecta');
                    window.location.href = 'login.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Usuario no encontrado');
                window.location.href = 'login.html';
              </script>";
    }

    $stmt->close();
}
$conn->close();
?> 