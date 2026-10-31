-- Script de creación de Base de Datos y Tabla Personas
-- Base de Datos
CREATE DATABASE IF NOT EXISTS arq_2026;
USE arq_2026;

-- Tabla Personas
CREATE TABLE IF NOT EXISTS autos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca TEXT(100) NOT NULL,
    modelo TEXT(100) NOT NULL,
    rodado  TEXT(100)NOT NULL,
    cantidadCambios  TEXT(100)NOT NULL,
    color  TEXT(100)NOT NULL,
    precio  TEXT(100)NOT NULL
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos de ejemplo (opcional)
INSERT INTO autos (marca, modelo, rodado, cantidadCambios,color, precio) VALUES
('AUDI', 'UNO','ROD2', 'CINCO', 'AZUL', '100' ),
('BMW', 'DOS','ROD3', 'CINCO', 'AZUL', '500' ),
('OPEL', 'TRES','ROD4', 'CINCO', 'AZUL', '500' ),
('MERCEDES', 'CUATRO','ROD5', 'CINCO', 'AZUL', '900' ),
('PORSCHE', 'CINCO','ROD6', 'CINCO', 'AZUL', '800' )
;
