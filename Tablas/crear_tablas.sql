-- Tabla Producto
CREATE TABLE Producto (
    Idpro INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    precio DOUBLE NOT NULL,
    categoria VARCHAR(50),
    marca VARCHAR(50),
    uniStock INT NOT NULL
);

-- Tabla Cliente
CREATE TABLE Cliente (
    Idc INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(50),
    email VARCHAR(100)
);

-- Tabla Pedido
CREATE TABLE Pedido (
    idpe INT AUTO_INCREMENT PRIMARY KEY,
    fechaPedido DATE NOT NULL,
    total DOUBLE NOT NULL
);

-- Tabla DetallePedido (relación entre Pedido y Producto)
CREATE TABLE DetallePedido (
    iddetalle INT AUTO_INCREMENT PRIMARY KEY,
    idpe INT,
    idpro INT,
    cantidad INT NOT NULL,
    precio DOUBLE NOT NULL,
    FOREIGN KEY (idpe) REFERENCES Pedido(idpe) ON DELETE CASCADE,
    FOREIGN KEY (idpro) REFERENCES Producto(Idpro) ON DELETE CASCADE
);

-- Tabla Empleado
CREATE TABLE Empleado (
    idem INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    puesto VARCHAR(50) NOT NULL,
    salario DECIMAL(10, 2)
);

-- Tabla Proveedor
CREATE TABLE Proveedor (
    idprov INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(50),
    direccion VARCHAR(255)
);

