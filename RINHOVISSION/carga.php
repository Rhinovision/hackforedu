<?php
$destino = isset($_GET['destino']) ? $_GET['destino'] : 'index.php';  // Página de destino
$nombre = isset($_GET['nom']) ? $_GET['nom'] : '';  // Nombre del usuario
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargando...</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #454344;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
        }

        .logo {
            width: 300px;
            margin-bottom: 20px;
        }

        .loading-text {
            font-size: 24px;
            color: #fff;
            /* Cambié el color para que resalte más */
            margin-bottom: 20px;
        }

        .loading-bar {
            width: 200px;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            margin: 0 auto;
            /* Para centrar la barra de progreso */
        }

        .progress {
            width: 0%;
            height: 100%;
            background: linear-gradient(to right, #ff69b4, #87CEFA, #00008B);
            transition: width 0.5s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="LOGO.png" alt="Logo" class="logo">
        <div class="loading-text">Cargando...</div>
        <div class="loading-bar">
            <div class="progress"></div>
        </div>
    </div>

    <script>
        function simulateLoading() {
            const progress = document.querySelector('.progress');
            let width = 0;
            const interval = setInterval(() => {
                if (width >= 100) {
                    clearInterval(interval);
                    // Redirige a la página de destino después de la carga
                    window.location.href = '<?php echo $destino; ?>';
                } else {
                    width++;
                    progress.style.width = width + '%';
                }
            }, 50); // Simulación de carga de 50 ms por incremento
        }

        window.onload = simulateLoading;
    </script>


</body>

</html>