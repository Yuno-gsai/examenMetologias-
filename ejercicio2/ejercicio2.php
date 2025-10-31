<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["calcular_rectangulo"])) {
        $base = $_POST["base"];
        $altura = $_POST["altura"];
        $area = $base * $altura;
        $perimetro = 2 * ($base + $altura);
        $resultado = "Rectángulo → Área: $area | Perímetro: $perimetro";
    }

    if (isset($_POST["calcular_cilindro"])) {
        $radio = $_POST["radio"];
        $altura = $_POST["altura_cilindro"];
        $area = 2 * M_PI * $radio * ($altura + $radio);
        $volumen = M_PI * pow($radio, 2) * $altura;
        $resultado = "Cilindro → Área: " . round($area, 2) . " | Volumen: " . round($volumen, 2);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 2</title>
</head>
<body>
    <h2>Cálculo de Área y Volumen</h2>

    <h3>Rectángulo</h3>
    <form method="post" action="">
        <label>Base (b):</label><br>
        <input type="number" step="any" name="base" required><br>
        <label>Altura (h):</label><br>
        <input type="number" step="any" name="altura" required><br><br>
        <input type="submit" name="calcular_rectangulo" value="Calcular Rectángulo">
    </form>

    <hr>

    <h3>Cilindro</h3>
    <form method="post" action="">
        <label>Radio (r):</label><br>
        <input type="number" step="any" name="radio" required><br>
        <label>Altura (h):</label><br>
        <input type="number" step="any" name="altura_cilindro" required><br><br>
        <input type="submit" name="calcular_cilindro" value="Calcular Cilindro">
    </form>

    <hr>

    <p><b>Resultado:</b> <?php echo $resultado; ?></p>
    <a href="../dashboard.php">Volver al Dashboard</a>
</body>
</html>
