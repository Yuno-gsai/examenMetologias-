<?php
$conexion = new mysqli("localhost", "root", "Coc864020", "login_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
