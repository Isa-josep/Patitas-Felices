<!DOCTYPE html>
<html>
<head>
    <title>Gestionar Inventario</title>
    <link rel="stylesheet" href="static/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Gestionar Inventario</h2>
        <form action="controller/procesar_inventario.php" method="post">
            <div class="input-group">
                <label for="codigo_producto">Producto:</label>
                <select id="codigo_producto" name="codigo_producto" required>
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

                    $sql = "SELECT Codigo, Nombre FROM Producto";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Codigo'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="input-group">
                <label for="cantidad_stock">Cantidad en Stock:</label>
                <input type="number" id="cantidad_stock" name="cantidad_stock" required>
            </div>
            <button type="submit">Guardar Inventario</button>
        </form>
    </div>
</body>
</html>
