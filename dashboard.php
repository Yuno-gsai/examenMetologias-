<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION["usuario"]; ?> 👋</h2>
    <p>Has iniciado sesión correctamente.</p>
    <ul>
        <li><a href="ejercicio2/ejercicio2.php">Ir al Ejercicio 2</a></li>
        <li><a href="ejercicio3/ejercicio3.php">Ir al Ejercicio 3</a></li>
        <li><a href="logout.php">Cerrar sesión</a></li>
    </ul>
</body>
</html>
