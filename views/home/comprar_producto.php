<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo_usuario'] != 'cliente') {
    header("Location: login.php");
    exit();
}

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "patitas_felices");

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener datos del formulario
$codigo_producto = $_POST['codigo_producto'];
$cantidad = $_POST['cantidad'];
$id_cliente = $_SESSION['id_usuario']; // Usar el ID del cliente desde la sesión

// Insertar en la tabla Compra
$sql_compra = $conn->prepare("INSERT INTO Compra (Fecha, ID_Cliente) VALUES (CURDATE(), ?)");
$sql_compra->bind_param("i", $id_cliente);
$sql_compra->execute();

// Obtener el ID de la compra recién insertada
$id_compra = $conn->insert_id;

// Insertar en la tabla Detalle_Compra
$sql_detalle = $conn->prepare("INSERT INTO Detalle_Compra (ID_Compra, Codigo_Producto, Cantidad) VALUES (?, ?, ?)");
$sql_detalle->bind_param("iii", $id_compra, $codigo_producto, $cantidad);
$sql_detalle->execute();

// Redirigir a la página de historial de compras
header("Location: historial_compras.php");

$conn->close();
?>
