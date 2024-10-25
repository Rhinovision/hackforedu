<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="oportunidadesStyle.css">
    <title>RhinoVision - Mis Oportunidades</title>
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