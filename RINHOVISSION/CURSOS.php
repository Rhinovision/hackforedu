<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RhinoVision - Mis Cursos</title>
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            min-height: 100vh;
            /* Asegura que el cuerpo ocupe al menos el alto completo de la ventana */
        }

        .sidebar {
            width: 250px;
            background-color: #000;
            height: 100vh;
            position: fixed;
            /* Mantiene la barra lateral fija */
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            overflow-y: auto;
            /* Permite desplazamiento si el contenido excede el alto de la pantalla */
        }

        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Nuevos estilos metálicos para los botones */
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
            /* Espacio para la barra lateral */
            padding: 40px;
            background-color: #333;
            min-height: 100vh;
            /* Asegura que el contenido ocupe al menos el alto completo de la ventana */
            color: white;
            flex: 1;
            /* Permite que el contenido principal ocupe el espacio restante */
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }

        .course-card {
            background-color: #444;
            border-radius: 10px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .course-image {
            width: 100%;
            height: 160px;
            background-color: #555;
            border-radius: 8px;
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #999;
        }

        .course-title {
            font-size: 1.2em;
            margin: 10px 0;
            color: #FFA500;
        }

        .course-instructor {
            color: #999;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .course-progress {
            background-color: #555;
            border-radius: 10px;
            height: 10px;
            margin-top: 15px;
        }

        .progress-bar {
            height: 100%;
            border-radius: 10px;
            background: linear-gradient(90deg, #FF8C00, #FFA500);
        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: #FFA500;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        .shake {
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
        }

        .shake:hover {
            transform: none;
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