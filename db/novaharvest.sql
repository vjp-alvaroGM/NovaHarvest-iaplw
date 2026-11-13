USE novaharvest;

-- excedentes publicados por los productores
CREATE TABLE excedentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    productor VARCHAR(100) NOT NULL,
    pueblo VARCHAR(100) NOT NULL,
    kilos INT NOT NULL DEFAULT 0,
    precio_kg DECIMAL(6,2) NOT NULL
);

-- solicitudes de avisos de los compradores
CREATE TABLE avisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    producto VARCHAR(100) NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- datos iniciales indicados en el enunciado
INSERT INTO excedentes
    (producto, productor, pueblo, kilos, precio_kg)
VALUES
    ('Cereza Picota', 'Huerta Los Castaños', 'Cabezuela del Valle', 223, 2.24),
    ('Castaña', 'Finca El Rebollar', 'Rebollar', 150, 2.10),
    ('Higo', 'Huerto La Garganta', 'Navaconcejo', 35, 2.80),
    ('Tomate de colgar', 'Hermanos Sánchez', 'Jerte', 80, 1.10),
    ('Calabacín', 'Huerta Los Castaños', 'Cabezuela del Valle', 0, 0.90);

-- ajustar los permisos del usuario de la aplicación
REVOKE ALL PRIVILEGES ON novaharvest.* FROM 'novaharvest_app'@'%';
GRANT SELECT, INSERT ON novaharvest.* TO 'novaharvest_app'@'%';