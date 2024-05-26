<!DOCTYPE html>
<html>
<head>
  <title>Login - Patitas Felices</title>
  <link rel="stylesheet" href="static/css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> 
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2>Iniciar Sesión</h2>
      <form action="controller/procesar_login.php" method="post">
        <div class="input-group">
          <label for="email">Correo Electrónico:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Iniciar Sesión</button>
      </form>
    </div>
    <div class="image-container">
      <!-- <img src="imagen_patitas.jpg" alt="Imagen de Patitas Felices">  -->
    </div>
  </div>
</body>
</html>
