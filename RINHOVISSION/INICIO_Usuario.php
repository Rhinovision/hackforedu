<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RhinoVision - Página Principal</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            background-color: #000;
            height: 100vh;
            position: fixed;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }

        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Nuevo estilo metálico para los botones */
        .sidebar button {
            width: 100%;
            background: linear-gradient(145deg,
                    #FF8C00,
                    #FFA500,
                    #FFB732,
                    #FFA500,
                    #FF8C00);
            background-size: 200% 200%;
            color: white;
            border: none;
            padding: 15px;
            margin: 10px 0;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow:
                0 4px 6px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6),
                inset 0 -2px 15px rgba(255, 255, 255, 0.3),
                inset 0 2px 15px rgba(255, 255, 255, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            animation: gradient 5s ease infinite;
        }

        .sidebar button:hover {
            background: linear-gradient(145deg,
                    #FFB732,
                    #FFC966,
                    #FFD700,
                    #FFC966,
                    #FFB732);
            background-size: 200% 200%;
            transform: translateY(-2px);
            box-shadow:
                0 6px 12px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.8),
                inset 0 -2px 20px rgba(255, 255, 255, 0.4),
                inset 0 2px 20px rgba(255, 255, 255, 0.4);
        }

        .sidebar button:active {
            transform: translateY(1px);
            box-shadow:
                0 2px 4px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.4),
                inset 0 -2px 10px rgba(255, 255, 255, 0.2),
                inset 0 2px 10px rgba(255, 255, 255, 0.2);
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Efecto de brillo al pasar el mouse */
        .sidebar button::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(rgba(255, 255, 255, 0.2),
                    rgba(255, 255, 255, 0.1),
                    rgba(255, 255, 255, 0));
            transform: rotate(30deg);
            transition: transform 0.5s;
            pointer-events: none;
        }

        .sidebar button:hover::after {
            transform: rotate(30deg) translate(50%, 50%);
        }

        .main-content {
            margin-left: 270px;
            padding: 40px;
            background-color: #333;
            text-align: center;
            height: 100vh;
        }

        .main-content img {
            width: 300px;
        }

        .main-content h1 {
            color: white;
        }

        .main-content p {
            color: #ccc;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    if ($_SESSION['tipo_usuario'] == "alumno") {
        ?>
        
        <div class="sidebar">
            <h2>Menú</h2>
            <a href="PERFIL.php"><button onclick="brinco()">Mi perfil</button></a>
            <a href="CURSOS.php"><button onclick="brinco()">Mis cursos</button></a>
            <a href="AVANCES.php"><button onclick="brinco()">Mis Avances</button></a>
            <a href="ACTIVIDADES.php"><button onclick="brinco()">Mis actividades</button></a>
            <a href="OPORTUNIDADES.php"><button onclick="brinco()">Mis Oportunidades</button></a>
            <a href="HISTORIAL.php"><button onclick="brinco()">Mi Historial</button></a>
            <a href="logout.php"><button onclick="brinco()">LOG OUT</button></a>
        </div>
        <div class="main-content">
            <img src="LOGO.png" alt="Logo">
            <h1>Bienvenido a RhinoVision</h1>
            <p>Selecciona una opción del menú lateral para comenzar.</p>
        </div>
        
        <script>
            function brinco() {

            }
        </script>
        <?php
    } else {
        echo "<script language='JavaScript'>
            alert('No tienes el privilegio para entrar a esta página');
            location.assign(history.back());
            </script>";
    }
    ?>
</body>

</html>