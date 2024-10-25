<?php
session_start();
?>
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
            <?php
            include("acceso_bd.php");

            // Suponemos que $_SESSION['numero_control'] contiene el número de control del alumno logueado
            $numero_control = $_SESSION['num_control'];

            // Consulta SQL para obtener los datos del alumno logueado
            $sql = "SELECT nombre, ap_pat, ap_mat, num_control, email FROM usuarios WHERE num_control = '$numero_control'";

            $resultado = mysqli_query($conexion, $sql);

            // Verificamos si se obtuvieron resultados
            if (mysqli_num_rows($resultado) > 0) {
                $fila = mysqli_fetch_assoc($resultado); // Obtenemos los datos del alumno
                ?>
                <div class="profile-section">
                    <div class="profile-pic">Foto</div>
                    <h1>Mi Perfil</h1>
                </div>

                <div class="profile-info">
                    <p><strong>Nombre:</strong> <?php echo $fila['nombre']; ?></p>
                    <p><strong>Apellido Paterno:</strong> <?php echo $fila['ap_pat']; ?></p>
                    <p><strong>Apellido Materno:</strong> <?php echo $fila['ap_mat']; ?></p>
                    <p><strong>Número de Control:</strong> <?php echo $fila['num_control']; ?></p>
                    <p><strong>Correo Institucional:</strong> <?php echo $fila['email']; ?></p>
                </div>
                <?php
            } else {
                echo "<p>No se encontraron datos del perfil.</p>";
            }

            mysqli_close($conexion); // Cerramos la conexión a la base de datos
            ?>

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
