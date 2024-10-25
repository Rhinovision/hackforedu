
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="historialstyle.css">
    <title>RhinoVision - Mi Historial</title>
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