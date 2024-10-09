-- Create database if it doesn't exist
-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS store_tilinois_db;
USE store_tilinois_db;

-- Products Table
-- Tabla de productos
CREATE TABLE IF NOT EXISTS products (
    idpro INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255),
    price DOUBLE NOT NULL,
    category VARCHAR(50),
    brand VARCHAR(50),
    stockunits INT NOT NULL
);  

-- Customers Table
-- Tabla de clientes
CREATE TABLE IF NOT EXISTS customers (
    idc INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255) NULL,
    phone VARCHAR(50) NULL,
    email VARCHAR(100) NULL
);

-- Orders Table (with relation to Customers)
-- Tabla de pedidos (con relación a clientes)
CREATE TABLE IF NOT EXISTS orders (
    idpe INT AUTO_INCREMENT PRIMARY KEY,
    idc INT,
    orderdate DATE NOT NULL,
    total DOUBLE NOT NULL,
    FOREIGN KEY (idc) REFERENCES customers(idc) ON DELETE SET NULL
);

-- OrderDetails Table (relationship between Orders and Products)
-- Tabla de detalles del pedido (relación entre pedidos y productos)
CREATE TABLE IF NOT EXISTS orderdetails (
    iddetail INT AUTO_INCREMENT PRIMARY KEY,
    idpe INT,
    idpro INT,
    quantity INT NOT NULL,
    price DOUBLE NOT NULL,
    FOREIGN KEY (idpe) REFERENCES orders(idpe) ON DELETE CASCADE,
    FOREIGN KEY (idpro) REFERENCES products(idpro) ON DELETE CASCADE
);

-- Employees Table
-- Tabla de empleados
CREATE TABLE IF NOT EXISTS employees (
    idem INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(50) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL
);

-- Suppliers Table
-- Tabla de proveedores
CREATE TABLE IF NOT EXISTS suppliers (
    idprov INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(50) NULL,
    address VARCHAR(255) NULL
);
