<!DOCTYPE html>
<html>
<head>
    <title>Gestionar Productos</title>
    <link rel="stylesheet" href="static/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Gestionar Productos</h2>
        <form action="controller/procesar_producto.php" method="post">
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="input-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>
            </div>
            <div class="input-group">
                <label for="id_proveedor">Proveedor:</label>
                <select id="id_proveedor" name="id_proveedor" required>
                    <?php
                    // Conexión a la base de datos
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "patitas_felices";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar conexión
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT ID_Proveedor, Nombre FROM Proveedor";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['ID_Proveedor'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <button type="submit">Guardar Producto</button>
        </form>
    </div>
</body>
</html>
