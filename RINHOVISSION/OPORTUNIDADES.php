<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RhinoVision - Mis Oportunidades</title>
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
            color: #e8e0cf;
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

        .page-title {
            color: #FFA500;
            /* Color amarillo dorado */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            /* Sombra para mejor legibilidad */
        }

        .foda-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .foda-section {
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .foda-section.fortalezas {
            background: linear-gradient(145deg, #4CAF50, #45a049);
            box-shadow:
                0 4px 15px rgba(76, 175, 80, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .foda-section.oportunidades {
            background: linear-gradient(145deg, #2196F3, #1976D2);
            box-shadow:
                0 4px 15px rgba(33, 150, 243, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .foda-section.debilidades {
            background: linear-gradient(145deg, #FF9800, #F57C00);
            box-shadow:
                0 4px 15px rgba(255, 152, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .foda-section.amenazas {
            background: linear-gradient(145deg, #f44336, #d32f2f);
            box-shadow:
                0 4px 15px rgba(244, 67, 54, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .foda-section:hover {
            transform: translateY(-5px);
        }

        .foda-section::after {
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

        .foda-section:hover::after {
            transform: rotate(30deg) translate(50%, 50%);
        }

        .opportunities-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .opportunity-card {
            background: linear-gradient(145deg, #2196F3, #1976D2);
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            color: white;
            box-shadow:
                0 4px 6px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6),
                inset 0 -2px 15px rgba(255, 255, 255, 0.3),
                inset 0 2px 15px rgba(255, 255, 255, 0.3);
            min-height: 120px;
            cursor: pointer;
        }

        .opportunity-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 8px 25px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.8),
                inset 0 -2px 20px rgba(255, 255, 255, 0.4),
                inset 0 2px 20px rgba(255, 255, 255, 0.4);
        }

        .opportunity-card::after {
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

        .opportunity-card:hover::after {
            transform: rotate(30deg) translate(50%, 50%);
        }

        .opportunity-title {
            font-size: 18px;
            margin-bottom: 8px;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .opportunity-card p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Colores específicos para cada tipo de tarjeta con gradientes mejorados */
        .opportunity-card.course-1 {
            background: linear-gradient(145deg, #4CAF50, #45a049);
            box-shadow:
                0 4px 15px rgba(76, 175, 80, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .opportunity-card.course-1:hover {
            background: linear-gradient(145deg,
                    #45a049,
                    #4CAF50,
                    #66BB6A,
                    #4CAF50,
                    #45a049);
        }

        .opportunity-card.course-2 {
            background: linear-gradient(145deg, #2196F3, #1976D2);
            box-shadow:
                0 4px 15px rgba(33, 150, 243, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .opportunity-card.course-2:hover {
            background: linear-gradient(145deg,
                    #1976D2,
                    #2196F3,
                    #42A5F5,
                    #2196F3,
                    #1976D2);
        }

        .opportunity-card.partial-1 {
            background: linear-gradient(145deg, #9C27B0, #7B1FA2);
            box-shadow:
                0 4px 15px rgba(156, 39, 176, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .opportunity-card.partial-1:hover {
            background: linear-gradient(145deg,
                    #7B1FA2,
                    #9C27B0,
                    #AB47BC,
                    #9C27B0,
                    #7B1FA2);
        }

        .opportunity-card.partial-2 {
            background: linear-gradient(145deg, #FF9800, #F57C00);
            box-shadow:
                0 4px 15px rgba(255, 152, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }

        .opportunity-card.partial-2:hover {
            background: linear-gradient(145deg,
                    #F57C00,
                    #FF9800,
                    #FFA726,
                    #FF9800,
                    #F57C00);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .opportunities-list {
                grid-template-columns: 1fr;
            }
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
            <a href="PERFIL.php"><button onclick="navigateTo('courses')">Mi perfil</button></a>
            <a href="CURSOS.php"><button onclick="navigateTo('progress')">Mis cursos</button></a>
            <a href="AVANCES.php"><button onclick="navigateTo('activities')">Mis avances</button></a>
            <a href="ACTIVIDADES.php"><button onclick="navigateTo('opportunities')">Mis actividades</button></a>
            <a href="HISTORIAL.php"><button onclick="navigateTo('history')">Mi Historial</button></a>
            <a href="logout.php"><button onclick="brinco()">LOG OUT</button></a>
        </div>
        <div class="main-content">
            <h1 class="page-title">Mis Oportunidades</h1>

            <div class="view-selector">
                <button class="view-button" onclick="showView('foda')">Ver FODA</button>
                <button class="view-button" onclick="showView('by-course')">Ver por Curso</button>
                <button class="view-button" onclick="showView('by-partial')">Ver por Parcial</button>
            </div>

            <!-- Vista FODA -->
            <div id="foda-view" class="foda-container">
                <div class="foda-section fortalezas">
                    <h3>Fortalezas</h3>
                    <ul>
                        <li>Excelente comprensión de programación básica</li>
                        <li>Habilidades sólidas en trabajo en equipo</li>
                        <li>Alto rendimiento en proyectos prácticos</li>
                    </ul>
                </div>
                <div class="foda-section oportunidades">
                    <h3>Oportunidades</h3>
                    <ul>
                        <li>Cursos adicionales de desarrollo web</li>
                        <li>Proyectos en colaboración con otras empresas</li>
                        <li>Capacitación en nuevas tecnologías</li>
                    </ul>
                </div>
                <div class="foda-section debilidades">
                    <h3>Debilidades</h3>
                    <ul>
                        <li>Falta de experiencia en gestión de tiempo</li>
                        <li>Poca exposición a bases de datos complejas</li>
                    </ul>
                </div>
                <div class="foda-section amenazas">
                    <h3>Amenazas</h3>
                    <ul>
                        <li>Competencia creciente en el área tecnológica</li>
                        <li>Limitado acceso a recursos de formación avanzados</li>
                    </ul>
                </div>
            </div>

            <!-- Vista por Curso -->
            <div id="by-course-view" class="opportunities-list" style="display:none;">
                <div class="opportunity-card course-1">
                    <h3 class="opportunity-title">Curso de Java Avanzado</h3>
                    <p>Temas: Streams, Lambdas, Concurrencia</p>
                </div>
                <div class="opportunity-card course-2">
                    <h3 class="opportunity-title">Desarrollo Frontend con React</h3>
                    <p>Temas: Componentes, Hooks, Redux</p>
                </div>
            </div>

            <!-- Vista por Parcial -->
            <div id="by-partial-view" class="opportunities-list" style="display:none;">
                <div class="opportunity-card partial-1">
                    <h3 class="opportunity-title">Parcial 1: Introducción a Programación</h3>
                    <p>Desempeño: 85%</p>
                </div>
                <div class="opportunity-card partial-2">
                    <h3 class="opportunity-title">Parcial 2: Programación Orientada a Objetos</h3>
                    <p>Desempeño: 90%</p>
                </div>
            </div>
        </div>

        <script>
            // Ocultar y mostrar vistas según la selección del usuario
            function showView(view) {
                // Ocultamos todas las vistas
                document.getElementById('foda-view').style.display = 'none';
                document.getElementById('by-course-view').style.display = 'none';
                document.getElementById('by-partial-view').style.display = 'none';

                // Mostramos la vista seleccionada
                if (view === 'foda') {
                    document.getElementById('foda-view').style.display = 'grid';
                } else if (view === 'by-course') {
                    document.getElementById('by-course-view').style.display = 'grid';
                } else if (view === 'by-partial') {
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