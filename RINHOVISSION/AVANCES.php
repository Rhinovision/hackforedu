<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="avancesStyle.css">
    <title>RhinoVision - Avances</title>
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
            <a href="ACTIVIDADES.php"><button onclick="navigateTo('activities')">Mis actividades</button></a>
            <a href="OPORTUNIDADES.php"><button onclick="navigateTo('opportunities')">Mis Oportunidades</button></a>
            <a href="HISTORIAL.php"><button onclick="navigateTo('history')">Mi Historial</button></a>
            <a href="logout.php"><button onclick="brinco()">LOG OUT</button></a>
        </div>
        <div class="main-content">
            <h1 class="page-title">Mis Avances</h1>
            <div class="medals-container">
                <!-- Medalla Roja -->
                <div class="medal">
                    <div class="medal-ribbon"></div>
                    <div class="medal-outer">
                        <div class="medal-inner">
                            <div class="medal-shine"></div>
                            <div class="medal-fill" style="background-color: #d11414; height: 75%;"></div>
                            <span class="medal-text">75%</span>
                        </div>
                    </div>
                    <div class="medal-label">Nivel Básico</div>
                </div>
                <!-- Medalla Amarilla -->
                <div class="medal">
                    <div class="medal-ribbon"></div>
                    <div class="medal-outer">
                        <div class="medal-inner">
                            <div class="medal-shine"></div>
                            <div class="medal-fill" style="background-color: #0bd6cf; height: 60%;"></div>
                            <span class="medal-text">60%</span>
                        </div>
                    </div>
                    <div class="medal-label">Nivel Intermedio</div>
                </div>
                <!-- Medalla Azul -->
                <div class="medal">
                    <div class="medal-ribbon"></div>
                    <div class="medal-outer">
                        <div class="medal-inner">
                            <div class="medal-shine"></div>
                            <div class="medal-fill" style="background-color: #4444ff; height: 45%;"></div>
                            <span class="medal-text">45%</span>
                        </div>
                    </div>
                    <div class="medal-label">Nivel Avanzado</div>
                </div>
                <!-- Medalla Verde -->
                <div class="medal">
                    <div class="medal-ribbon"></div>
                    <div class="medal-outer">
                        <div class="medal-inner">
                            <div class="medal-shine"></div>
                            <div class="medal-fill" style="background-color: #44dd44; height: 30%;"></div>
                            <span class="medal-text">30%</span>
                        </div>
                    </div>
                    <div class="medal-label">Nivel Experto</div>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="progressChart"></canvas>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
        <script>
            // Configuración de la gráfica (igual que antes)
            const progressData = {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                datasets: [{
                    label: 'Progreso General',
                    data: [30, 45, 55, 65, 75, 85],
                    borderColor: '#FFA500',
                    backgroundColor: 'rgba(255, 165, 0, 0.2)',
                    tension: 0.4,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointBackgroundColor: '#FFA500'
                }]
            };

            const ctx = document.getElementById('progressChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: progressData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#fff'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#fff'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#fff'
                            }
                        }
                    }
                }
            });

            // Animación inicial de las medallas
            document.addEventListener('DOMContentLoaded', () => {
                const medals = document.querySelectorAll('.medal-fill');
                medals.forEach(medal => {
                    const height = medal.style.height;
                    medal.style.height = '0';
                    setTimeout(() => {
                        medal.style.height = height;
                    }, 300);
                });
            });

            function navigateTo(page) {
                // Implementar navegación
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