<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RhinoVision - Actividades</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: grid;
            grid-template-columns: 250px 1fr;
            /* Define dos columnas, una para la barra lateral y otra para el contenido principal */
            grid-template-rows: 100vh;
            /* Establece la altura de la página a 100vh */
        }

        .sidebar {
            background-color: #000;
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

        .main-content {
            padding: 40px;
            background-color: #333;
            color: white;
        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: #FFA500;
        }

        /* Estilos del cronograma */
        .schedule {
            background-color: #444;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .schedule-header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }

        .day-header {
            text-align: center;
            padding: 10px;
            background-color: #FFA500;
            border-radius: 5px;
            font-weight: bold;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            min-height: 400px;
        }

        .day-column {
            background-color: #555;
            border-radius: 5px;
            padding: 10px;
            min-height: 100%;
        }

        .activity-card {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .activity-card:hover {
            transform: scale(1.02);
        }

        .activity-time {
            font-size: 0.8em;
            color: #333;
        }

        .activity-title {
            font-weight: bold;
        }

        /* Estilos del formulario para agregar actividad */
        .add-activity-btn {
            background: linear-gradient(145deg, #FF8C00, #FFA500);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
        }

        .modal-content {
            background-color: #444;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #FFA500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #666;
            background-color: #555;
            color: white;
        }

        .form-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .form-buttons button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .submit-btn {
            background: linear-gradient(145deg, #FF8C00, #FFA500);
            color: white;
        }

        .cancel-btn {
            background-color: #666;
            color: white;
        }

        /* Media Queries para responsividad */
        @media (max-width: 768px) {
            body {
                grid-template-columns: 1fr;
                /* En pantallas pequeñas, la barra lateral se apila sobre el contenido */
            }

            .sidebar {
                width: 100%;
                height: auto;
                /* La altura será automática para adaptarse al contenido */
            }

            .main-content {
                margin: 0;
                /* Sin margen en la parte izquierda en dispositivos pequeños */
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
            <a href="OPORTUNIDADES.php"><button onclick="navigateTo('opportunities')">Mis Oportunidades</button></a>
            <a href="HISTORIAL.php"><button onclick="navigateTo('history')">Mi Historial</button></a>
            <a href="logout.php"><button onclick="brinco()">LOG OUT</button></a>
        </div>
        <div class="main-content">
            <h1 class="page-title">Mis Actividades</h1>
            <button class="add-activity-btn" onclick="openModal()">+ Agregar Actividad</button>
            <div class="schedule">
                <div class="schedule-header">
                    <div class="day-header">Lunes</div>
                    <div class="day-header">Martes</div>
                    <div class="day-header">Miércoles</div>
                    <div class="day-header">Jueves</div>
                    <div class="day-header">Viernes</div>
                    <div class="day-header">Sábado</div>
                    <div class="day-header">Domingo</div>
                </div>
                <div class="schedule-grid">
                    <div class="day-column" id="monday"></div>
                    <div class="day-column" id="tuesday"></div>
                    <div class="day-column" id="wednesday"></div>
                    <div class="day-column" id="thursday"></div>
                    <div class="day-column" id="friday"></div>
                    <div class="day-column" id="saturday"></div>
                    <div class="day-column" id="sunday"></div>
                </div>
            </div>
        </div>

        <div class="modal" id="activityModal">
            <div class="modal-content">
                <h2>Agregar Actividad</h2>
                <div class="form-group">
                    <label for="activity-title">Título:</label>
                    <input type="text" id="activity-title" required>
                </div>
                <div class="form-group">
                    <label for="activity-time">Hora:</label>
                    <input type="time" id="activity-time" required>
                </div>
                <div class="form-group">
                    <label for="activity-day">Día:</label>
                    <select id="activity-day">
                        <option value="monday">Lunes</option>
                        <option value="tuesday">Martes</option>
                        <option value="wednesday">Miércoles</option>
                        <option value="thursday">Jueves</option>
                        <option value="friday">Viernes</option>
                        <option value="saturday">Sábado</option>
                        <option value="sunday">Domingo</option>
                    </select>
                </div>
                <div class="form-buttons">
                    <button class="submit-btn" onclick="addActivity()">Agregar</button>
                    <button class="cancel-btn" onclick="closeModal()">Cancelar</button>
                </div>
            </div>
        </div>

        <script>
            // Función para agregar la actividad
            function addActivity() {
                const title = document.getElementById('activity-title').value;
                const time = document.getElementById('activity-time').value;
                const day = document.getElementById('activity-day').value;

                const colors = {
                    monday: '#FFB732',
                    tuesday: '#A1D6E0',
                    wednesday: '#F9AFAF',
                    thursday: '#E0A1D6',
                    friday: '#D6E0A1',
                    saturday: '#D1D1D1',
                    sunday: '#FFC0CB'
                };

                const activityCard = document.createElement('div');
                activityCard.classList.add('activity-card');
                activityCard.style.backgroundColor = colors[day];
                activityCard.innerHTML = `<span class="activity-title">${title}</span><br><span class="activity-time">${time}</span>`;

                document.getElementById(day).appendChild(activityCard);

                closeModal();
            }

            // Funciones para abrir y cerrar el modal
            function openModal() {
                document.getElementById('activityModal').style.display = 'block';
            }

            function closeModal() {
                document.getElementById('activityModal').style.display = 'none';
                document.getElementById('activity-title').value = '';
                document.getElementById('activity-time').value = '';
                document.getElementById('activity-day').value = 'monday';
            }

            // Función para navegar entre secciones
            function navigateTo(section) {
                console.log(`Navegando a ${section}`);
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