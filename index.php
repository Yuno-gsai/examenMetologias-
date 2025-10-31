<?php
include("conexion.php");
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION["usuario"] = $usuario;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Sistema de Login</h2>
    <form method="post" action="">
        <label>Usuario:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>

        <input type="submit" value="Iniciar sesión">
    </form>

    <p style="color:red;"><?php echo $error; ?></p>
</body>
</html>