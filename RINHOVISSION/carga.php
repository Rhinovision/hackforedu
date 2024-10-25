<?php
$destino = isset($_GET['destino']) ? $_GET['destino'] : 'index.php';  // Página de destino
$nombre = isset($_GET['nom']) ? $_GET['nom'] : '';  // Nombre del usuario
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cargastyle.css">
    <title>Cargando...</title>
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