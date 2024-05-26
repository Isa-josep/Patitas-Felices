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

// Obtener datos del formulario
$codigo_producto = $_POST['codigo_producto'];
$cantidad_stock = $_POST['cantidad_stock'];

// Insertar datos en la base de datos
$sql = "INSERT INTO Inventario (Codigo_Producto, Cantidad_Stock) VALUES ('$codigo_producto', '$cantidad_stock')";

if ($conn->query($sql) === TRUE) {
    echo "Inventario actualizado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
