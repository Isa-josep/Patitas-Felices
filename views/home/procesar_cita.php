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
$idMascota = $_POST['mascota'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$motivo = $_POST['motivo'];
$estado = $_POST['estado'];
$idVeterinario = $_POST['veterinario'];

$sql = "INSERT INTO Cita (Fecha, Hora, Motivo, Estado, ID_Cliente, ID_Veterinario, ID_Mascota) VALUES ('$fecha', '$hora', '$motivo', '$estado', $idCliente, $idVeterinario, $idMascota)";

if ($conn->query($sql) === TRUE) {
    echo "Cita agendada con éxito";
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
