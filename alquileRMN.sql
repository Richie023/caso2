-- Crear la base de datos
CREATE DATABASE CasoEstudioMN;

-- Usar la base de datos recién creada
USE CasoEstudioMN;

-- Crear la tabla CasasSistema
CREATE TABLE CasasSistema (
    IdCasa BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    DescripcionCasa VARCHAR(30) NOT NULL,
    PrecioCasa DECIMAL(10,2) NOT NULL,
    UsuarioAlquiler VARCHAR(30),
    FechaAlquiler DATETIME
);
INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler) VALUES ('Casa en San José', 190000, null, null);
INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler) VALUES ('Casa en Alajuela', 145000, null, null);
INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler) VALUES ('Casa en Cartago', 115000, null, null);
INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler) VALUES ('Casa en Heredia', 122000, null, null);
INSERT INTO CasasSistema (DescripcionCasa, PrecioCasa, UsuarioAlquiler, FechaAlquiler) VALUES ('Casa en Guanacaste', 105000, null, null);


-- Crear el procedimiento para consultar casas disponibles
DELIMITER $$

CREATE PROCEDURE ConsultarCasasDisponibles()
BEGIN
    SELECT 
        IdCasa,
        DescripcionCasa,
        PrecioCasa
    FROM 
        CasasSistema
    WHERE 
        UsuarioAlquiler IS NULL;
END$$

DELIMITER ;

-- Crear el procedimiento para consultar todas las casas dentro de un rango de precios y ordenadas por estado
DROP PROCEDURE IF EXISTS ConsultarCasas;

DELIMITER $$

CREATE PROCEDURE ConsultarCasas()
BEGIN
    SELECT 
        DescripcionCasa, 
        PrecioCasa, 
        CASE
            WHEN UsuarioAlquiler IS NULL THEN 'Disponible'
            ELSE 'Reservado'
        END AS Estado,
        UsuarioAlquiler,
        DATE_FORMAT(FechaAlquiler, '%d/%m/%Y') AS FechaAlquiler
    FROM 
        CasasSistema
    WHERE 
        PrecioCasa BETWEEN 115000 AND 180000
    ORDER BY 
        Estado ASC;
END$$

DELIMITER ;

-- Crear el procedimiento para registrar el alquiler de una casa
DELIMITER $$

CREATE PROCEDURE RegistrarAlquiler(
    IN p_IdCasa BIGINT,
    IN p_UsuarioAlquiler VARCHAR(30),
    IN p_FechaAlquiler DATETIME
)
BEGIN
    UPDATE 
        CasasSistema
    SET 
        UsuarioAlquiler = p_UsuarioAlquiler,
        FechaAlquiler = p_FechaAlquiler
    WHERE 
        IdCasa = p_IdCasa;
END$$

DELIMITER ;
