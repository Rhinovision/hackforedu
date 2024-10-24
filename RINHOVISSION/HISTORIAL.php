<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RhinoVision - Mi Historial</title>
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

        .main-content {
            margin-left: 270px;
            padding: 40px;
            background-color: #333;
            min-height: 100vh;
            text-align: center;
            margin-bottom: 40px;
            color: #FFA500;
        }

        .view-selector {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .view-button {
            padding: 10px 20px;
            background: linear-gradient(145deg, #FF8C00, #FFA500);
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
            position: relative;
            overflow: hidden;
            box-shadow:
                0 4px 6px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6),
                inset 0 -2px 15px rgba(255, 255, 255, 0.3),
                inset 0 2px 15px rgba(255, 255, 255, 0.3);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .view-button:hover {
            background: linear-gradient(145deg,
                    #FFB732,
                    #FFC966,
                    #FFD700,
                    #FFC966,
                    #FFB732);
            transform: translateY(-2px);
            box-shadow:
                0 6px 12px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.8),
                inset 0 -2px 20px rgba(255, 255, 255, 0.4),
                inset 0 2px 20px rgba(255, 255, 255, 0.4);
        }

        .view-button::after {
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

        .view-button:hover::after {
            transform: rotate(30deg) translate(50%, 50%);
        }

        .grades-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .grade-card {
            background: #424242;
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .grade-card:hover {
            transform: translateY(-5px);
            background: #616161;
        }

        .grade-title {
            font-size: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
    if ($_SESSION['tipo_usuario'] == "alumno") {
        ?>
        <div class="sidebar">
            <h2>Menú</h2>
            <a href="INICIO_Usuario.php"><button onclick="navigateTo('profile')">Inicio</button></a>
            <a href="PERFIL.php"><button onclick="navigateTo('history')">Mi perfil</button></a>
            <a href="CURSOS.php"><button onclick="navigateTo('courses')">Mis cursos</button></a>
            <a href="AVANCES.php"><button onclick="navigateTo('progress')">Mis Avances</button></a>
            <a href="ACTIVIDADES.php"><button onclick="navigateTo('activities')">Mis actividades</button></a>
            <a href="OPORTUNIDADES.php"><button onclick="navigateTo('opportunities')">Mis Oportunidades</button></a>
            <a href="logout.php"><button onclick="brinco()">LOG OUT</button></a>

        </div>
        <div class="main-content">
            <h1 class="page-title">Mi Historial</h1>

            <div class="view-selector">
                <button class="view-button" onclick="showView('by-course')">Ver por Curso</button>
                <button class="view-button" onclick="showView('by-partial')">Ver por Parcial</button>
            </div>

            <!-- Vista por Curso -->
            <div id="by-course-view" class="grades-list">
                <div class="grade-card course-1">
                    <h3 class="grade-title">Matemáticas</h3>
                    <p>Calificación: 90%</p>
                </div>
                <div class="grade-card course-2">
                    <h3 class="grade-title">Programación</h3>
                    <p>Calificación: 85%</p>
                </div>
                <div class="grade-card course-3">
                    <h3 class="grade-title">Física</h3>
                    <p>Calificación: 80%</p>
                </div>
                <div class="grade-card course-4">
                    <h3 class="grade-title">Química</h3>
                    <p>Calificación: 95%</p>
                </div>
            </div>

            <!-- Vista por Parcial -->
            <div id="by-partial-view" class="grades-list" style="display: none;">
                <div class="grade-card">
                    <h3 class="grade-title">1er Parcial</h3>
                    <p>Matemáticas: 90%</p>
                    <p>Programación: 85%</p>
                </div>
                <div class="grade-card">
                    <h3 class="grade-title">2do Parcial</h3>
                    <p>Física: 80%</p>
                    <p>Química: 95%</p>
                </div>
            </div>
        </div>

        <script>
            function navigateTo(page) {
                // Lógica para navegar entre páginas
                console.log("Navegando a:", page);
            }

            function showView(view) {
                if (view === 'by-course') {
                    document.getElementById('by-course-view').style.display = 'grid';
                    document.getElementById('by-partial-view').style.display = 'none';
                } else {
                    document.getElementById('by-course-view').style.display = 'none';
                    document.getElementById('by-partial-view').style.display = 'grid';
                }
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