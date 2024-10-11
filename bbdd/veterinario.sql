CREATE DATABASE veterinario;

USE veterinario;
CREATE TABLE animales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    peso DECIMAL(10, 2) NOT NULL,
    raza text,
    tipo text
);

INSERT INTO animales (nombre, descripcion, peso, raza, tipo) VALUES
('Chispita', 'Un perro bodeguero muy grande.', 8, 'bodeguero', 'Perro'),
('Lucero', 'Gato negro muy arisco.', 10, 'callejero', 'Gato'),
('Piolín', 'Canario amarillo', 0.4, 'canario', 'Ave'),
('Elena', 'La gallina favorita del granjero James', 2, 'gallina_blanca', 'Ave'),
('Paula', 'Una linda tortuga laúd', 20, 'tortuga', 'Reptil');
