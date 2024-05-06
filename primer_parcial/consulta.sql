-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS DBAlejandro;

-- Seleccionar la base de datos
USE DBAlejandro;

-- Crear la tabla personas
CREATE TABLE IF NOT EXISTS personas (
    id_persona INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    paterno VARCHAR(50),
    materno VARCHAR(50),
    rol ENUM('director_bancario', 'operador', 'cliente'),
    carnet VARCHAR(20),
    celular VARCHAR(15),
    departamento ENUM('La Paz', 'Cochabamba', 'Santa Cruz', 'Potosí', 'Pando', 'Beni', 'Tarija', 'Oruro', 'Chuquisaca'),
    email VARCHAR(50),
    contraseña VARCHAR(255) -- Almacena el hash de la contraseña
);


-- Crear la tabla cuentas_bancarias
CREATE TABLE IF NOT EXISTS cuentas_bancarias (
    id_cuenta INT AUTO_INCREMENT PRIMARY KEY,
    id_persona INT,
    tipo_cuenta ENUM('cuenta corriente', 'caja de ahorro', 'nómina', 'cuenta a plazo fijo'),
    pin VARCHAR(255), -- Considerando que el pin puede ser largo
    saldo DECIMAL(10, 2) DEFAULT 0,
    FOREIGN KEY (id_persona) REFERENCES personas(id_persona) ON DELETE CASCADE -- Agregar relación
);

-- Crear la tabla transacciones
CREATE TABLE IF NOT EXISTS transacciones (
    id_transaccion INT AUTO_INCREMENT PRIMARY KEY,
    id_cuenta INT,
    tipo_transaccion ENUM('depósito', 'retiro', 'transferencia'),
    cantidad DECIMAL(10, 2),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cuenta) REFERENCES cuentas_bancarias(id_cuenta) ON DELETE CASCADE -- Agregar relación
);
