<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cursosStyle.css">
    <title>RhinoVision - Mis Cursos</title>
</head>

<body>
    <?php
    if ($_SESSION['tipo_usuario'] == "alumno") {
        ?>
        <div class="sidebar">
            <h2>Menú</h2>
            <a href="INICIO_Usuario.php"><button onclick="navigateTo('profile')">Inicio</button></a>
            <a href="PERFIL.php"><button onclick="navigateTo('courses')">Mi perfil</button></a>
            <a href="AVANCES.php"><button onclick="navigateTo('progress')">Mis Avances</button></a>
            <a href="ACTIVIDADES.php"><button onclick="navigateTo('activities')">Mis actividades</button></a>
            <a href="OPORTUNIDADES.php"><button onclick="navigateTo('opportunities')">Mis Oportunidades</button></a>
            <a href="HISTORIAL.php"><button onclick="navigateTo('history')">Mi Historial</button></a>
            <a href="logout.php"><button onclick="brinco()">LOG OUT</button></a>
        </div>
        <div class="main-content">
            <h1 class="page-title">Mis Cursos</h1>
            <div class="courses-grid">
                <div class="course-card" onclick="shakeCard(this, 1)">
                    <div class="course-image">Imagen del curso</div>
                    <h3 class="course-title">Introducción a la Programación</h3>
                    <p class="course-instructor">Prof. Juan Pérez</p>
                    <div class="course-progress">
                        <div class="progress-bar" style="width: 75%"></div>
                    </div>
                </div>
                <div class="course-card" onclick="shakeCard(this, 2)">
                    <div class="course-image">Imagen del curso</div>
                    <h3 class="course-title">Estructuras de Datos</h3>
                    <p class="course-instructor">Prof. María García</p>
                    <div class="course-progress">
                        <div class="progress-bar" style="width: 45%"></div>
                    </div>
                </div>
                <div class="course-card" onclick="shakeCard(this, 3)">
                    <div class="course-image">Imagen del curso</div>
                    <h3 class="course-title">Desarrollo Web Avanzado</h3>
                    <p class="course-instructor">Prof. Carlos Rodríguez</p>
                    <div class="course-progress">
                        <div class="progress-bar" style="width: 90%"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function navigateTo(page) {
                // Función para navegación (a implementar)
            }

            function shakeCard(card, courseId) {
                card.classList.add('shake');
                setTimeout(() => {
                    card.classList.remove('shake');
                }, 500);
                console.log(`Abriendo curso ${courseId}`);
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