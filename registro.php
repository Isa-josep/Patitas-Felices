<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registro - Patitas Felices</title>
  <link rel="stylesheet" href="static/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> 
</head>
<body>
  <div class="container">
    <div class="image-container">
      <img src="patitas.webp" alt="Imagen de Patitas Felices"> 
    </div>
    <div class="form-container">
      <h2>Registro</h2>
      <form id="registroForm" action="controller/procesar_registro.php" method="post">
        <div class="input-group">
          <label for="role">Rol:</label>
          <select id="role" name="role" onchange="mostrarCampos()" required>
            <option value="cliente">Cliente</option>
          </select>
        </div>
        <div class="input-row">
          <div class="input-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
          </div>
          <div class="input-group">
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" required>
          </div>
        </div>
        <div class="input-row">
          <div class="input-group">
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" required>
          </div>
          <div class="input-group">
            <label for="calle">Calle:</label>
            <input type="text" id="calle" name="calle" required>
          </div>
        </div>
        <div class="input-row">
          <div class="input-group">
            <label for="colonia">Colonia:</label>
            <input type="text" id="colonia" name="colonia" required>
          </div>
          <div class="input-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal" required>
          </div>
        </div>
        <div class="input-row">
          <div class="input-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
          </div>
          <div class="input-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
          </div>
        </div>
        <div class="input-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Registrarse</button>
      </form>
      <p>¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a></p>
    </div>
  </div>
</body>
</html>
