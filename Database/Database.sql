CREATE DATABASE IF NOT EXISTS login_db;
USE login_db;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL,
  contrasena VARCHAR(100) NOT NULL
);

INSERT INTO usuarios (usuario, contrasena)
VALUES ('admin', '1234');
