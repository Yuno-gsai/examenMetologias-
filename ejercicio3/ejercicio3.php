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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Identificación de Cuadrantes</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container { max-width: 1000px; margin: 0 auto; }
        .header {
            background: white; border-radius: 20px; padding: 30px;
            margin-bottom: 30px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            text-align: center; animation: slideDown 0.5s ease;
        }
        @keyframes slideDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
        h2 { color: #333; font-size: 32px; margin-bottom: 10px; }
        .content-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .form-card, .plano-card {
            background: white; border-radius: 20px; padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); animation: fadeIn 0.5s ease;
        }
        @keyframes fadeIn { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
        .form-group { margin-bottom: 15px; }
        label { display: block; color: #555; font-weight: 500; margin-bottom: 8px; font-size: 14px; }
        input[type="number"] {
            width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0;
            border-radius: 10px; font-size: 15px; transition: all 0.3s ease; background: #f8f9fa;
        }
        input[type="number"]:focus {
            outline: none; border-color: #fcb69f; background: white;
            box-shadow: 0 0 0 3px rgba(252, 182, 159, 0.2);
        }
        input[type="submit"] {
            width: 100%; padding: 12px; background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            color: #333; border: none; border-radius: 10px; font-size: 16px;
            font-weight: 600; cursor: pointer; transition: all 0.3s ease; margin-top: 10px;
        }
        input[type="submit"]:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(252, 182, 159, 0.4); }
        .plano {
            width: 300px; height: 300px; border: 3px solid #333; border-radius: 10px;
            margin: 20px auto; position: relative;
            background: linear-gradient(to right, rgba(255,236,210,0.1) 50%, rgba(252,182,159,0.1) 50%),
                        linear-gradient(to bottom, rgba(255,236,210,0.1) 50%, rgba(252,182,159,0.1) 50%);
        }
        .eje-x, .eje-y { position: absolute; background: #333; }
        .eje-x { width: 100%; height: 3px; top: 50%; left: 0; }
        .eje-y { height: 100%; width: 3px; top: 0; left: 50%; }
        .cuadrante { position: absolute; font-size: 16px; font-weight: bold; color: #333;
                     background: white; width: 30px; height: 30px; display: flex;
                     align-items: center; justify-content: center; border-radius: 50%; border: 2px solid #333; }
        .resultado-box {
            background: white; border-radius: 20px; padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); text-align: center; margin-bottom: 20px;
        }
        .resultado-box p { color: #333; font-size: 18px; }
        .back-button {
            display: inline-block; padding: 15px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; text-decoration: none; border-radius: 10px;
            font-weight: 600; transition: all 0.3s ease;
        }
        .back-button:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4); }
        .button-container { text-align: center; }
        @media (max-width: 768px) { .content-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📍 Identificación de Cuadrantes</h2>
        </div>

        <div class="content-grid">
            <div class="form-card">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Coordenada X:</label>
                        <input type="number" step="any" name="x" required placeholder="Ej: 5">
                    </div>
                    <div class="form-group">
                        <label>Coordenada Y:</label>
                        <input type="number" step="any" name="y" required placeholder="Ej: -3">
                    </div>
                    <input type="submit" value="Identificar cuadrante">
                </form>
            </div>

            <div class="plano-card">
                <div class="plano">
                    <div class="eje-x"></div>
                    <div class="eje-y"></div>
                    <div class="cuadrante" style="top:15%; left:70%;">I</div>
                    <div class="cuadrante" style="top:15%; left:15%;">II</div>
                    <div class="cuadrante" style="bottom:15%; left:15%;">III</div>
                    <div class="cuadrante" style="bottom:15%; left:70%;">IV</div>
                </div>
            </div>
        </div>

        <?php if($resultado): ?>
        <div class="resultado-box">
            <p><b><?php echo $resultado; ?></b></p>
        </div>
        <?php endif; ?>

        <div class="button-container">
            <a href="../dashboard.php" class="back-button">← Volver al Dashboard</a>
        </div>
    </div>
</body>
</html>
