document.getElementById('formEquipo').addEventListener('submit', function(e) {
  e.preventDefault();

  const marca = document.getElementById('marca').value;
  const pantalla = document.getElementById('pantalla').checked;
  const disco = document.getElementById('disco').checked;
  const software = document.getElementById('software').checked;

  let clasificacion = '';

  if (marca) {
    clasificacion += marca;
  }

  if (pantalla) {
    clasificacion += (clasificacion ? ' con ' : '') + 'pantalla rota';
  }
  if (disco) {
    clasificacion += (clasificacion ? ' y ' : '') + 'disco duro dañado';
  }
  if (software) {
    clasificacion += (clasificacion ? ' y ' : '') + 'problemas de software';
  }

  if (!clasificacion) {
    clasificacion = 'No se seleccionó ninguna característica.';
  }

  document.getElementById('resultado').textContent =
    'Clasificación: ' + clasificacion;
});
