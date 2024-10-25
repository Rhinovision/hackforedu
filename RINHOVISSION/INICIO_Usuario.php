<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inicio_usuario.css">
    <title>RhinoVision - Página Principal</title>
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