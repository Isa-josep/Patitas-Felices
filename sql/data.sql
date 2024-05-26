CREATE DATABASE patitas_felices;
USE patitas_felices;

CREATE TABLE Cliente (
    ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Apellido_Paterno VARCHAR(50) NOT NULL,
    Apellido_Materno VARCHAR(50),
    Calle VARCHAR(100),
    Colonia VARCHAR(100),
    Codigo_Postal VARCHAR(10),
    Telefono VARCHAR(15),
    Correo_Electronico VARCHAR(100),
    Contrasena VARCHAR(255) NOT NULL
);

CREATE TABLE Veterinario (
    ID_Veterinario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Apellido_Paterno VARCHAR(50) NOT NULL,
    Apellido_Materno VARCHAR(50),
    Correo_Electronico VARCHAR(100),
    Contrasena VARCHAR(255) NOT NULL
);

CREATE TABLE Mascota (
    ID_Mascota INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Especie VARCHAR(50),
    Raza VARCHAR(50),
    Edad INT,
    Genero VARCHAR(10),
    ID_Cliente INT,
    FOREIGN KEY (ID_Cliente) REFERENCES Cliente(ID_Cliente)
);

CREATE TABLE Cita (
    ID_Cita INT AUTO_INCREMENT PRIMARY KEY,
    Fecha DATE NOT NULL,
    Hora TIME NOT NULL,
    Motivo VARCHAR(200),
    Estado VARCHAR(50),
    ID_Cliente INT,
    ID_Veterinario INT,
    FOREIGN KEY (ID_Cliente) REFERENCES Cliente(ID_Cliente),
    FOREIGN KEY (ID_Veterinario) REFERENCES Veterinario(ID_Veterinario)
);

CREATE TABLE Historial_Medico (
    ID_Registro INT AUTO_INCREMENT PRIMARY KEY,
    Fecha DATE NOT NULL,
    Resultados_Examenes TEXT,
    Prescripciones_Medicas TEXT,
    Tratamientos_Recetados TEXT,
    Notas_Veterinario TEXT,
    ID_Mascota INT,
    ID_Veterinario INT,
    FOREIGN KEY (ID_Mascota) REFERENCES Mascota(ID_Mascota),
    FOREIGN KEY (ID_Veterinario) REFERENCES Veterinario(ID_Veterinario)
);

CREATE TABLE Proveedor (
    ID_Proveedor INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Calle VARCHAR(100),
    Colonia VARCHAR(100),
    Codigo_Postal VARCHAR(10),
    Telefono VARCHAR(15)
);

CREATE TABLE Producto (
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Descripcion TEXT,
    Precio DECIMAL(10, 2),
    ID_Proveedor INT,
    FOREIGN KEY (ID_Proveedor) REFERENCES Proveedor(ID_Proveedor)
);

CREATE TABLE Inventario (
    ID_Inventario INT AUTO_INCREMENT PRIMARY KEY,
    Codigo_Producto INT,
    Cantidad_Stock INT,
    FOREIGN KEY (Codigo_Producto) REFERENCES Producto(Codigo)
);

CREATE TABLE Compra (
    ID_Compra INT AUTO_INCREMENT PRIMARY KEY,
    Fecha DATE NOT NULL,
    ID_Cliente INT,
    FOREIGN KEY (ID_Cliente) REFERENCES Cliente(ID_Cliente)
);

CREATE TABLE Detalle_Compra (
    ID_Detalle_Compra INT AUTO_INCREMENT PRIMARY KEY,
    ID_Compra INT,
    Codigo_Producto INT,
    Cantidad INT,
    FOREIGN KEY (ID_Compra) REFERENCES Compra(ID_Compra),
    FOREIGN KEY (Codigo_Producto) REFERENCES Producto(Codigo)
);

-- Agregar un cliente
INSERT INTO Cliente (Nombre, Apellido_Paterno, Apellido_Materno, Calle, Colonia, Codigo_Postal, Telefono, Correo_Electronico, Contrasena)
VALUES ('Juan', 'Perez', 'Gomez', 'Calle Falsa 123', 'Centro', '12345', '5551234567', 'juan.perez@example.com', 'password123');

-- Agregar un veterinario
INSERT INTO Veterinario (Nombre, Apellido_Paterno, Apellido_Materno, Correo_Electronico, Contrasena)
VALUES ('Ana', 'Garcia', 'Lopez', 'ana.garcia@example.com', 'vetpassword456');
