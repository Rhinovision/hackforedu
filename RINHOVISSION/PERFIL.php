<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfilstyle.css">
    <title>RhinoVision - Mi Perfil</title>
</head>

<body>
    <?php
    if ($_SESSION['tipo_usuario'] == "alumno") {
        ?>
        <div class="sidebar">
            <h2>Menú</h2>
            <a href="INICIO_Usuario.php"><button onclick="navigateTo('profile')">Inicio</button></a>
            <a href="CURSOS.php"><button onclick="navigateTo('courses')">Mis cursos</button></a>
            <a href="AVANCES.php"><button onclick="navigateTo('progress')">Mis Avances</button></a>
            <a href="ACTIVIDADES.php"><button onclick="navigateTo('activities')">Mis actividades</button></a>
            <a href="OPORTUNIDADES.php"><button onclick="navigateTo('opportunities')">Mis Oportunidades</button></a>
            <a href="HISTORIAL.php"><button onclick="navigateTo('history')">Mi Historial</button></a>
            <a href="logout.php"><button onclick="brinco()">LOG OUT</button></a>
        </div>
        <div class="main-content">
            <div class="profile-section">
                <div class="profile-pic">Foto</div>
                <h1>Mi Perfil</h1>
            </div>
            <div class="profile-info">
                <p><strong>Nombre:</strong> <span id="studentName"></span></p>
                <p><strong>Número de Control:</strong> <span id="controlNumber"></span></p>
                <p><strong>Matrícula:</strong> <span id="matricula"></span></p>
                <p><strong>Correo Institucional:</strong> <span id="email"></span></p>
            </div>
            <button class="edit-button" onclick="editProfile()">Editar Perfil</button>
        </div>
        <script>
            function navigateTo(page) {
                // Implementación de la navegación
            }

            function editProfile() {
                // Implementación de la edición del perfil
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