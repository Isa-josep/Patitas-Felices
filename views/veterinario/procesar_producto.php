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
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$id_proveedor = $_POST['id_proveedor'];

// Insertar datos en la base de datos
$sql = "INSERT INTO Producto (Nombre, Descripcion, Precio, ID_Proveedor) VALUES ('$nombre', '$descripcion', '$precio', '$id_proveedor')";

if ($conn->query($sql) === TRUE) {
    echo "Producto registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
