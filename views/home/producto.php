<!-- productos.php -->
<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "patitas_felices");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener productos
$sql = "SELECT * FROM Producto";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
    <h1>Productos Disponibles</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Comprar</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['Nombre'] ?></td>
            <td><?= $row['Descripcion'] ?></td>
            <td><?= $row['Precio'] ?></td>
            <td>
                <form action="comprar_producto.php" method="post">
                    <input type="hidden" name="codigo_producto" value="<?= $row['Codigo'] ?>">
                    <input type="number" name="cantidad" min="1" value="1">
                    <button type="submit">Comprar</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
