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
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta para verificar credenciales en ambas tablas
$sqlVeterinario = "SELECT * FROM Veterinario WHERE Correo_Electronico='$email'";
$sqlCliente = "SELECT * FROM Cliente WHERE Correo_Electronico='$email'";

$resultVeterinario = $conn->query($sqlVeterinario);
$resultCliente = $conn->query($sqlCliente);

session_start();

if ($resultVeterinario->num_rows == 1) {
    $row = $resultVeterinario->fetch_assoc();
    $idVeterinario = $row['ID_Veterinario'];
    $hashedPassword = $row['Contrasena'];

    // Verificar la contraseña
    if (password_verify($password, $hashedPassword)) {
        $_SESSION['email'] = $email;
        $_SESSION['tipo_usuario'] = 'veterinario';
        $_SESSION['id_usuario'] = $idVeterinario; 
        header("Location: ../views/vet/");
        exit;
    } else {
        echo "Correo electrónico o contraseña incorrectosscs.";
    }
} elseif ($resultCliente->num_rows == 1) {
    $row = $resultCliente->fetch_assoc();
    $idCliente = $row['ID_Cliente'];
    $hashedPassword = $row['Contrasena'];

    // Verificar la contraseña
    if (password_verify($password, $hashedPassword)) {
        $_SESSION['email'] = $email;
        $_SESSION['tipo_usuario'] = 'cliente';
        $_SESSION['id_usuario'] = $idCliente; 
        header("Location: ../views/home/");
        exit;
    } else {
        echo "Correo electrónico o contraseña incorrectos.";
    }
} else {
    echo "Correo electrónico o contraseña incorrectos.";
}

$conn->close();
?>
