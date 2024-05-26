<!DOCTYPE html>
<html>
<head>
  <title>Registro - Patitas Felices</title>
  <link rel="stylesheet" href="static/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> 
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>Registro</h2>
      <form id="registroForm" action="controller/procesar_registro.php" method="post">
        <div class="input-group">
          <label for="role">Rol:</label>
          <select id="role" name="role" onchange="mostrarCampos()" required>
            <option value="">Seleccione un rol</option>
            <option value="cliente">Cliente</option>
            <option value="veterinario">Veterinario</option>
          </select>
        </div>
        <div class="input-group">
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" required>
        </div>
        <div id="camposCliente" style="display: none;">
          <div class="input-group">
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno">
          </div>
          <div class="input-group">
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno">
          </div>
          <div class="input-group">
            <label for="calle">Calle:</label>
            <input type="text" id="calle" name="calle">
          </div>
          <div class="input-group">
            <label for="colonia">Colonia:</label>
            <input type="text" id="colonia" name="colonia">
          </div>
          <div class="input-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal">
          </div>
          <div class="input-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono">
          </div>
        </div>

        <div id="camposVeterinario" style="display: none;">
          <div class="input-group">
            <label for="apellido_paterno_vet">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno_vet" name="apellido_paterno_vet">
          </div>
          <div class="input-group">
            <label for="apellido_materno_vet">Apellido Materno:</label>
            <input type="text" id="apellido_materno_vet" name="apellido_materno_vet">
          </div>
        </div>
        
        <div class="input-group">
          <label for="email">Correo Electrónico:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Registrarse</button>
      </form>
      <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
    <div class="image-container">
      <img src="imagen_patitas.jpg" alt="Imagen de Patitas Felices"> 
    </div>
  </div>
  
  <script>
    function mostrarCampos() {
      var role = document.getElementById('role').value;
      var camposCliente = document.getElementById('camposCliente');
      var camposVeterinario = document.getElementById('camposVeterinario');

      // Obtener todos los campos de cliente y veterinario
      var inputsCliente = camposCliente.querySelectorAll('input');
      var inputsVeterinario = camposVeterinario.querySelectorAll('input');

      if (role === 'cliente') {
        camposCliente.style.display = 'block';
        camposVeterinario.style.display = 'none';

        // Agregar required a los campos de cliente
        inputsCliente.forEach(function(input) {
          input.setAttribute('required', '');
        });

        // Quitar required a los campos de veterinario
        inputsVeterinario.forEach(function(input) {
          input.removeAttribute('required');
        });
      } else if (role === 'veterinario') {
        camposCliente.style.display = 'none';
        camposVeterinario.style.display = 'block';

        // Agregar required a los campos de veterinario
        inputsVeterinario.forEach(function(input) {
          input.setAttribute('required', '');
        });

        // Quitar required a los campos de cliente
        inputsCliente.forEach(function(input) {
          input.removeAttribute('required');
        });
      } else {
        camposCliente.style.display = 'none';
        camposVeterinario.style.display = 'none';

        // Quitar required de todos los campos si no hay rol seleccionado
        inputsCliente.forEach(function(input) {
          input.removeAttribute('required');
        });
        inputsVeterinario.forEach(function(input) {
          input.removeAttribute('required');
        });
      }
    }
  </script>
</body>
</html>
