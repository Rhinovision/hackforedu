<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RhinoVision - Avances</title>
    <style>
        /* Estilos base sin cambios */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            background-color: #000;
            height: 100vh;
            position: fixed;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
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

        /* El resto de los estilos permanecen igual */
        .main-content {
            margin-left: 270px;
            padding: 40px;
            background-color: #333;
            min-height: 100vh;
            color: white;
        }

        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: #FFA500;
        }

        /* Nuevo estilo para las medallas */
        .medals-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 50px 0;
            padding: 20px;
        }

        .medal {
            width: 180px;
            height: 220px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .medal-outer {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #333;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
        }

        /* Efecto neón para cada medalla */
        .medal:nth-child(1) .medal-outer {
            box-shadow: 0 0 20px #ff4500, 0 0 40px #ff4500, 0 0 60px #ff4500;
        }

        .medal:nth-child(2) .medal-outer {
            box-shadow: 0 0 20px #00ffff, 0 0 40px #00ffff, 0 0 60px #00ffff;
        }

        .medal:nth-child(3) .medal-outer {
            box-shadow: 0 0 20px #4444ff, 0 0 40px #4444ff, 0 0 60px #4444ff;
        }

        .medal:nth-child(4) .medal-outer {
            box-shadow: 0 0 20px #44ff44, 0 0 40px #44ff44, 0 0 60px #44ff44;
        }

        /* Efecto hover para el neón */
        .medal:hover .medal-outer {
            transform: scale(1.1);
        }

        .medal:nth-child(1):hover .medal-outer {
            box-shadow: 0 0 30px #ff4500, 0 0 60px #ff4500, 0 0 90px #ff4500;
        }

        .medal:nth-child(2):hover .medal-outer {
            box-shadow: 0 0 30px #00ffff, 0 0 60px #00ffff, 0 0 90px #00ffff;
        }

        .medal:nth-child(3):hover .medal-outer {
            box-shadow: 0 0 30px #4444ff, 0 0 60px #4444ff, 0 0 90px #4444ff;
        }

        .medal:nth-child(4):hover .medal-outer {
            box-shadow: 0 0 30px #44ff44, 0 0 60px #44ff44, 0 0 90px #44ff44;
        }

        .medal-inner {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .medal-fill {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            transition: height 1.5s ease;
        }

        /* Colores específicos para los rellenos */
        .medal:nth-child(1) .medal-fill {
            background-color: rgba(255, 69, 0, 0.6);
        }

        .medal:nth-child(2) .medal-fill {
            background-color: rgba(0, 255, 255, 0.6);
        }

        .medal:nth-child(3) .medal-fill {
            background-color: rgba(68, 68, 255, 0.6);
        }

        .medal:nth-child(4) .medal-fill {
            background-color: rgba(68, 255, 68, 0.6);
        }

        .medal-text {
            z-index: 10;
            color: white;
            font-weight: bold;
            font-size: 24px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.8);
        }

        .medal-label {
            color: white;
            margin-top: 10px;
            font-weight: bold;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        .medal-label {
            text-align: center;
            font-weight: bold;
            color: #FFA500;
            font-size: 1.2em;
            margin-top: 10px;
        }

        @keyframes shine {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .chart-container {
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            height: 400px;
        }

        .medal-stars {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .medal-star {
            position: absolute;
            width: 15px;
            height: 15px;
            background: #FFD700;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }
    </style>
</head>

<body>
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
</body>

</html>