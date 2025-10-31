<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Gestión</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .dashboard-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
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

        .welcome-text {
            color: #666;
            font-size: 16px;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease;
            text-decoration: none;
            color: inherit;
            display: block;
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

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .card-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .card-title {
            color: #333;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card-description {
            color: #666;
            font-size: 14px;
        }

        .logout-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .logout-card .card-title,
        .logout-card .card-description {
            color: white;
        }

        .card-1 {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .card-2 {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }

        @media (max-width: 768px) {
            .cards-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h2>Bienvenido, <?php echo $_SESSION["usuario"]; ?> 👋</h2>
            <p class="welcome-text">Has iniciado sesión correctamente. Selecciona una opción:</p>
        </div>

        <div class="cards-container">
            <a href="ejercicio2/ejercicio2.php" class="card card-1">
                <div class="card-icon">📐</div>
                <div class="card-title">Ejercicio 2</div>
                <div class="card-description">Cálculo de Área y Volumen</div>
            </a>

            <a href="ejercicio3/ejercicio3.php" class="card card-2">
                <div class="card-icon">📍</div>
                <div class="card-title">Ejercicio 3</div>
                <div class="card-description">Identificación de Cuadrantes</div>
            </a>

            <a href="logout.php" class="card logout-card">
                <div class="card-icon">🚪</div>
                <div class="card-title">Cerrar Sesión</div>
                <div class="card-description">Salir del sistema</div>
            </a>
        </div>
    </div>
</body>
</html>
