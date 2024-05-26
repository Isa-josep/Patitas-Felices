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

$sql = "SELECT * FROM Mascota WHERE ID_Cliente = $idCliente";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: agregar_mascota.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agendar Cita - Patitas Felices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select,
        input[type="date"],
        input[type="time"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Agendar Cita</h2>
    <form action="procesar_cita.php" method="post">
        <label for="mascota">Mascota:</label>
        <select id="mascota" name="mascota" required>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['ID_Mascota'] . "'>" . $row['Nombre'] . "</option>";
            }
            ?>
        </select>
        
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>
        
        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" required>
        
        <label for="motivo">Motivo:</label>
        <input type="text" id="motivo" name="motivo" required>
        
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required>
        
        <label for="veterinario">Veterinario:</label>
        <select id="veterinario" name="veterinario" required>
            <?php
            $sqlVet = "SELECT * FROM Veterinario";
            $resultVet = $conn->query($sqlVet);
            while ($rowVet = $resultVet->fetch_assoc()) {
                echo "<option value='" . $rowVet['ID_Veterinario'] . "'>" . $rowVet['Nombre'] . " " . $rowVet['Apellido_Paterno'] . "</option>";
            }
            ?>
        </select>
        
        <button type="submit">Agendar</button>
    </form>
</body>
</html>
