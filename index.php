<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario de Clasificación</title>
  <!-- Bootstrap para estilo (opcional) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Clasificación de Computadores - Croydon</h2>
      <div>
        <span class="me-3">Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
      </div>
    </div>

    <form action="guardar_equipo.php" method="POST">
      <div class="mb-3">
        <label for="placa" class="form-label">Placa del equipo</label>
        <input type="text" class="form-control" id="placa" name="placa" required />
      </div>

      <div class="mb-3">
        <label for="tipo_de_maquina" class="form-label">Tipo de máquina</label>
        <select class="form-select" id="tipo_de_maquina" name="tipo_de_maquina" required>
          <option value="">Seleccione...</option>
          <option value="Portátil">Portátil</option>
          <option value="Escritorio">Escritorio</option>
          <option value="All-in-One">All-in-One</option>
          <option value="Impresora">Impresora</option>
          <option value="Lectora_Inalambrica">Lectora_Inalambrica</option>
          <option value="Lectora_alambrica">Lectora_alambrica</option>
          <option value="Huellero">Huellero</option>
          <option value="Monitor">Monitor</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="quien_recoge_equipo" class="form-label">¿Quién recoge el equipo?</label>
        <input type="text" class="form-control" id="quien_recoge_equipo" name="quien_recoge_equipo" required />
      </div>

      <div class="mb-3">
        <label for="fecha_llegada" class="form-label">Fecha de llegada</label>
        <input type="date" class="form-control" id="fecha_llegada" name="fecha_llegada" required />
      </div>

      <div class="mb-3">
        <label for="fecha_salida" class="form-label">Fecha de salida</label>
        <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" />
      </div>

      <button type="submit" class="btn btn-primary">Guardar clasificación</button>
    </form>
  </div>

  <!-- Scripts opcionales de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
