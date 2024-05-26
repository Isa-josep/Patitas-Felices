<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['tipo_usuario'])) {
    header("Location: login.php");
    exit;
}

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

// Obtener el tipo de citas a mostrar (pendientes o pasadas)
$tipo = $_GET['tipo'];
$today = date("Y-m-d");

// Obtener el ID y tipo de usuario de la sesión
$idUsuario = $_SESSION['id_usuario'];
$tipoUsuario = $_SESSION['tipo_usuario'];

if ($tipoUsuario == 'cliente') {
    if ($tipo == 'pendientes') {
        $sql = "SELECT c.Fecha, c.Hora, c.Motivo, m.Nombre AS Mascota, v.Nombre AS Veterinario
                FROM Cita c
                JOIN Mascota m ON c.ID_Mascota = m.ID_Mascota
                JOIN Veterinario v ON c.ID_Veterinario = v.ID_Veterinario
                WHERE m.ID_Cliente = '$idUsuario' AND c.Fecha >= '$today'
                ORDER BY c.Fecha, c.Hora";
    } else {
        $sql = "SELECT c.Fecha, c.Hora, c.Motivo, m.Nombre AS Mascota, v.Nombre AS Veterinario
                FROM Cita c
                JOIN Mascota m ON c.ID_Mascota = m.ID_Mascota
                JOIN Veterinario v ON c.ID_Veterinario = v.ID_Veterinario
                WHERE m.ID_Cliente = '$idUsuario' AND c.Fecha < '$today'
                ORDER BY c.Fecha DESC, c.Hora DESC";
    }
} else {
    // Para veterinarios, filtrar las citas por ID del veterinario
    if ($tipo == 'pendientes') {
        $sql = "SELECT c.Fecha, c.Hora, c.Motivo, m.Nombre AS Mascota, v.Nombre AS Veterinario
                FROM Cita c
                JOIN Mascota m ON c.ID_Mascota = m.ID_Mascota
                JOIN Veterinario v ON c.ID_Veterinario = v.ID_Veterinario
                WHERE c.ID_Veterinario = '$idUsuario' AND c.Fecha >= '$today'
                ORDER BY c.Fecha, c.Hora";
    } else {
        $sql = "SELECT c.Fecha, c.Hora, c.Motivo, m.Nombre AS Mascota, v.Nombre AS Veterinario
                FROM Cita c
                JOIN Mascota m ON c.ID_Mascota = m.ID_Mascota
                JOIN Veterinario v ON c.ID_Veterinario = v.ID_Veterinario
                WHERE c.ID_Veterinario = '$idUsuario' AND c.Fecha < '$today'
                ORDER BY c.Fecha DESC, c.Hora DESC";
    }
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ver Citas - Patitas Felices</title>
    <link rel="stylesheet" href="../../static/css/style.css">
</head>
<body>

<header>
    <div class="container">
        <h1>Patitas Felices</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="agregar_mascota.php">Agregar Mascota</a></li>
                <li><a href="agendar_cita.php">Agendar Cita</a></li>
                <li><a href="ver_citas.php?tipo=pendientes">Citas Pendientes</a></li>
                <li><a href="ver_citas.php?tipo=pasadas">Citas Pasadas</a></li>
            </ul>
        </nav>
    </div>
</header>

<section id="citas">
    <div class="container">
        <h2><?php echo ucfirst($tipo); ?> Citas</h2>
        <table>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Mascota</th>
                <th>Motivo</th>
                <th>Veterinario</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['Fecha'] . "</td>
                            <td>" . $row['Hora'] . "</td>
                            <td>" . $row['Mascota'] . "</td>
                            <td>" . $row['Motivo'] . "</td>
                            <td>" . $row['Veterinario'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay citas " . $tipo . ".</td></tr>";
            }
            ?>
        </table>
    </div>
</section>

</body>
</html>

<?php
$conn->close();
?>
