<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo_usuario'] != 'cliente') {
    header("Location: login.php");
    exit();
}

$id_cliente = $_SESSION['id_usuario']; // Usar el ID del cliente desde la sesión

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "patitas_felices");

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener historial de compras del cliente
$sql = "SELECT c.ID_Compra, c.Fecha, dc.Codigo_Producto, p.Nombre AS Producto, dc.Cantidad, p.Precio
        FROM Compra c
        JOIN Detalle_Compra dc ON c.ID_Compra = dc.ID_Compra
        JOIN Producto p ON dc.Codigo_Producto = p.Codigo
        WHERE c.ID_Cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_cliente);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Historial de Compras</title>
    <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>
    <h1>Historial de Compras</h1>
    <?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID Compra</th>
            <th>Fecha</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ID_Compra'] ?></td>
            <td><?= $row['Fecha'] ?></td>
            <td><?= $row['Producto'] ?></td>
            <td><?= $row['Cantidad'] ?></td>
            <td><?= $row['Precio'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
    <p>Aún no tienes nada comprado.</p>
    <?php endif; ?>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
