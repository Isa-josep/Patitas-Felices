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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    if ($role == 'cliente') {
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $codigo_postal = $_POST['codigo_postal'];
        $telefono = $_POST['telefono'];

        $sql = "INSERT INTO Cliente (Nombre, Apellido_Paterno, Apellido_Materno, Calle, Colonia, Codigo_Postal, Telefono, Correo_Electronico, Contrasena) 
                VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$calle', '$colonia', '$codigo_postal', '$telefono', '$email', '$password')";

    } elseif ($role == 'veterinario') {
        $apellido_paterno_vet = $_POST['apellido_paterno_vet'];
        $apellido_materno_vet = $_POST['apellido_materno_vet'];

        $sql = "INSERT INTO Veterinario (Nombre, Apellido_Paterno, Apellido_Materno, Correo_Electronico, Contrasena) 
                VALUES ('$nombre', '$apellido_paterno_vet', '$apellido_materno_vet', '$email', '$password')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. <a href='../index.php'>Inicia sesión aquí</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
