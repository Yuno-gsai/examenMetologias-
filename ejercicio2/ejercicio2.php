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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Cálculo de Área y Volumen</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            text-align: center;
            animation: slideDown 0.5s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .forms-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .form-icon {
            text-align: center;
            font-size: 50px;
            margin-bottom: 15px;
        }

        h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            color: #555;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #a8edea;
            background: white;
            box-shadow: 0 0 0 3px rgba(168, 237, 234, 0.2);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #a8edea 0%, #79c5c3 100%);
            color: #333;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(168, 237, 234, 0.4);
        }

        .resultado-box {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            margin-bottom: 20px;
            text-align: center;
        }

        .resultado-box p {
            color: #333;
            font-size: 18px;
            line-height: 1.6;
        }

        .resultado-box b {
            color: #79c5c3;
            font-size: 20px;
        }

        .back-button {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .button-container {
            text-align: center;
        }

        @media (max-width: 768px) {
            .forms-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📐 Cálculo de Área y Volumen</h2>
        </div>

        <div class="forms-container">
            <div class="form-card">
                <div class="form-icon">▭</div>
                <h3>Rectángulo</h3>
                <form method="post" action="">
                    <div class="form-group">
                        <label>Base (b):</label>
                        <input type="number" step="any" name="base" required placeholder="Ingresa la base">
                    </div>
                    <div class="form-group">
                        <label>Altura (h):</label>
                        <input type="number" step="any" name="altura" required placeholder="Ingresa la altura">
                    </div>
                    <input type="submit" name="calcular_rectangulo" value="Calcular Rectángulo">
                </form>
            </div>

            <div class="form-card">
                <div class="form-icon">🥫</div>
                <h3>Cilindro</h3>
                <form method="post" action="">
                    <div class="form-group">
                        <label>Radio (r):</label>
                        <input type="number" step="any" name="radio" required placeholder="Ingresa el radio">
                    </div>
                    <div class="form-group">
                        <label>Altura (h):</label>
                        <input type="number" step="any" name="altura_cilindro" required placeholder="Ingresa la altura">
                    </div>
                    <input type="submit" name="calcular_cilindro" value="Calcular Cilindro">
                </form>
            </div>
        </div>

        <?php if($resultado): ?>
        <div class="resultado-box">
            <p><b>Resultado:</b> <?php echo $resultado; ?></p>
        </div>
        <?php endif; ?>

        <div class="button-container">
            <a href="../dashboard.php" class="back-button">← Volver al Dashboard</a>
        </div>
    </div>
</body>
</html>
