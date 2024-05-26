<!DOCTYPE html>
<html>
<head>
    <title>Gestionar Proveedores</title>
    <link rel="stylesheet" href="static/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Gestionar Proveedores</h2>
        <form action="controller/procesar_proveedor.php" method="post">
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label for="calle">Calle:</label>
                <input type="text" id="calle" name="calle">
            </div>
            <div class="input-group">
                <label for="colonia">Colonia:</label>
                <input type="text" id="colonia" name="colonia">
            </div>
            <div class="input-group">
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" name="codigo_postal">
            </div>
            <div class="input-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono">
            </div>
            <button type="submit">Guardar Proveedor</button>
        </form>
    </div>
</body>
</html>
