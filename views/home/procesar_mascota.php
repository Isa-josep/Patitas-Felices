<?php
session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['tipo_usuario'] != 'cliente') {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patitas_felices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$idCliente = $_SESSION['id_usuario'];
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];

$sql = "INSERT INTO Mascota (Nombre, Especie, Raza, Edad, Genero, ID_Cliente) VALUES ('$nombre', '$especie', '$raza', $edad, '$genero', $idCliente)";

if ($conn->query($sql) === TRUE) {
    echo "Mascota agregada con éxito";
    header("Location: agendar_cita.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
