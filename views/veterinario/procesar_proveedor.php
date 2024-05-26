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
$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$codigo_postal = $_POST['codigo_postal'];
$telefono = $_POST['telefono'];

// Insertar datos en la base de datos
$sql = "INSERT INTO Proveedor (Nombre, Calle, Colonia, Codigo_Postal, Telefono) VALUES ('$nombre', '$calle', '$colonia', '$codigo_postal', '$telefono')";

if ($conn->query($sql) === TRUE) {
    echo "Proveedor registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
