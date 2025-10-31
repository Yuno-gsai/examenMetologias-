<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["x"];
    $y = $_POST["y"];

    // Validar que ambos sean numéricos
    if (!is_numeric($x) || !is_numeric($y)) {
        $resultado = "Por favor, ingresa valores numéricos válidos.";
    } else {
        $x = floatval($x);
        $y = floatval($y);

        // Casos especiales cuando X o Y son cero
        if ($x == 0 && $y == 0) {
            $resultado = "El punto está en el origen (0,0).";
        } elseif ($x == 0 && $y != 0) {
            $resultado = "El punto está sobre el eje Y.";
        } elseif ($y == 0 && $x != 0) {
            $resultado = "El punto está sobre el eje X.";
        } 
        // Identificación de cuadrantes
        elseif ($x > 0 && $y > 0) {
            $resultado = "El punto ($x, $y) está en el I Cuadrante.";
        } elseif ($x < 0 && $y > 0) {
            $resultado = "El punto ($x, $y) está en el II Cuadrante.";
        } elseif ($x < 0 && $y < 0) {
            $resultado = "El punto ($x, $y) está en el III Cuadrante.";
        } elseif ($x > 0 && $y < 0) {
            $resultado = "El punto ($x, $y) está en el IV Cuadrante.";
        } else {
            $resultado = "No se pudo determinar la ubicación.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 3 - Identificación de Cuadrantes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; text-align: center; }
        .plano {
            width: 300px; height: 300px;
            border: 2px solid black;
            margin: 20px auto;
            position: relative;
        }
        .eje-x, .eje-y {
            position: absolute;
            background: black;
        }
        .eje-x { width: 100%; height: 2px; top: 50%; left: 0; }
        .eje-y { height: 100%; width: 2px; top: 0; left: 50%; }
    </style>
</head>
<body>

    <h2>Ejercicio 3: Identificación de Cuadrantes</h2>

    <form method="post" action="">
        <label>Coordenada X:</label><br>
        <input type="number" step="any" name="x" required><br><br>

        <label>Coordenada Y:</label><br>
        <input type="number" step="any" name="y" required><br><br>

        <input type="submit" value="Identificar cuadrante">
    </form>

    <h3>Resultado:</h3>
    <p><b><?php echo $resultado; ?></b></p>

    <div class="plano">
        <div class="eje-x"></div>
        <div class="eje-y"></div>
        <p style="position:absolute; top:5px; left:65%; font-size:14px;">I</p>
        <p style="position:absolute; top:5px; left:25%; font-size:14px;">II</p>
        <p style="position:absolute; bottom:5px; left:25%; font-size:14px;">III</p>
        <p style="position:absolute; bottom:5px; left:65%; font-size:14px;">IV</p>
    </div>

    <a href="dashboard.php">Volver al Dashboard</a>

</body>
</html>
