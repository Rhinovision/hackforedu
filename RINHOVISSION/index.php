<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RhinoVision</title>
    <style>
        body {
            
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(145deg, 
                #f4f4f4,
                #e4e4e4,
                #f4f4f4,
                #e4e4e4,
                #f4f4f4
            );
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
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

        .header {
            background: linear-gradient(145deg, 
                #2a2a2a,
                #333333,
                #3a3a3a,
                #333333,
                #2a2a2a
            );
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 
                0 4px 6px rgba(0,0,0,0.1),
                inset 0 1px 0 rgba(255,255,255,0.2);
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

        .header .logo {
            width: 150px;
            position: absolute;
            left: 20px;
        }

        .header .page-title {
            font-size: 48px;
            text-align: center;
            flex-grow: 1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .menu {
            background: linear-gradient(145deg,
                #3a3a3a,
                #444444,
                #4a4a4a,
                #444444,
                #3a3a3a
            );
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
            color: white;
            padding: 10px;
            text-align: center;
            box-shadow: 
                0 2px 4px rgba(0,0,0,0.1),
                inset 0 1px 0 rgba(255,255,255,0.1);
        }

        .menu a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .menu a:hover {
            color: #FFA500;
            transform: translateY(-2px);
        }

        .content {
            display: flex;
            justify-content: space-between;
            padding: 40px;
            background: linear-gradient(145deg,
                #2962ff,
                #448aff,
                #82b1ff,
                #448aff,
                #2962ff
            );
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
            margin: 20px 40px;
            border-radius: 15px;
            box-shadow: 
                0 8px 32px rgba(41, 98, 255, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }

        .left, .right, .center {
            width: 30%;
            text-align: center;
            padding: 20px;
            background: linear-gradient(145deg,
                #448aff,
                #82b1ff,
                #bbdefb,
                #82b1ff,
                #448aff
            );
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
            border-radius: 10px;
            box-shadow: 
                0 4px 15px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            position: relative;
            overflow: hidden;
        }

        .left::before, .right::before, .center::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                rgba(255, 255, 255, 0.3),
                rgba(255, 255, 255, 0.2),
                rgba(255, 255, 255, 0.1)
            );
            transform: rotate(30deg);
            animation: shine 3s infinite linear;
            pointer-events: none;
        }

        @keyframes shine {
            from {
                transform: rotate(30deg) translateY(-100%);
            }
            to {
                transform: rotate(30deg) translateY(100%);
            }
        }

        .left h2, .right h2 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .left p, .right p {
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        
        }

        .center img {
            width: 300px;
            margin: 20px auto;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }

        .buttons {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .buttons .btn {
            background: linear-gradient(145deg, 
                #FF8C00,
                #FFA500,
                #FFB732,
                #FFA500,
                #FF8C00
            );
            background-size: 200% 200%;
            color: white;
            padding: 15px 30px;
            border: none;
            margin: 0 20px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 10px;
            transition: all 0.3s ease;
            animation: gradient 5s ease infinite;
            box-shadow: 
                0 4px 6px rgba(0,0,0,0.1),
                inset 0 1px 0 rgba(255,255,255,0.6);
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
        }

        .buttons .btn::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                rgba(255,255,255,0.2),
                rgba(255,255,255,0.1),
                rgba(255,255,255,0)
            );
            transform: rotate(30deg);
            transition: transform 0.5s;
            pointer-events: none;
        }

        .buttons .btn:hover {
            background: linear-gradient(145deg,
                #FFB732,
                #FFC966,
                #FFD700,
                #FFC966,
                #FFB732
            );
            background-size: 200% 200%;
            transform: translateY(-2px);
            box-shadow: 
                0 6px 12px rgba(0,0,0,0.2),
                inset 0 1px 0 rgba(255,255,255,0.8);
        }

        .buttons .btn:hover::after {
            transform: rotate(30deg) translate(50%, 50%);
        }

        .footer {
            background: linear-gradient(145deg,
                #2a2a2a,
                #333333,
                #3a3a3a,
                #333333,
                #2a2a2a
            );
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
            box-shadow: 
                0 -4px 6px rgba(0,0,0,0.1),
                inset 0 1px 0 rgba(255,255,255,0.1);
        }

        .footer a {
            color: #FFA500;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #FFD700;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="LOGO.png" alt="Logo" class="logo">
        <h1 class="page-title">RhinoVision</h1>
    </div>



    <div class="content">
        <div class="left">
            <h2>¿Qué es?</h2>
            <p>RhinoVision es el dashboard estudiantil diseñado para ser tu compañero académico de confianza. Inspirado en la fuerza y la determinación del rinoceronte, RhinoVision te ofrece una visión clara y poderosa de tu progreso, ayudándote a mantener el control de tus estudios de manera organizada y eficiente.

                En un mundo donde el equilibrio entre la vida personal, el trabajo y los estudios puede volverse abrumador, RhinoVision te brinda todas las herramientas necesarias para gestionar tu tiempo, mantener el enfoque en tus metas y optimizar tu rendimiento académico.</p>
        </div>

        <div class="center">
            <img src="LOGO.png" alt="Logo">
        </div>

        <div class="right">
            <h2>¿Quiénes Somos?</h2>
            <p>Somos un equipo de profesionales comprometidos con el éxito académico de los estudiantes. Nuestro objetivo es crear un espacio donde cada estudiante tenga la fortaleza y claridad necesarias para enfrentar los desafíos de la vida universitaria. Creemos en el poder del conocimiento y la organización para alcanzar cualquier meta, y nos inspiramos en el rinoceronte como símbolo de resistencia y perseverancia.

                Nuestro enfoque va más allá de lo académico: estamos aquí para apoyarte en el camino hacia el equilibrio, la motivación y el bienestar, brindándote una herramienta que te acompaña en cada paso de tu formación. Al igual que el rinoceronte avanza con firmeza, RhinoVision te ayudará a avanzar con confianza hacia el éxito.</p>
        </div>
    </div>

    <div class="buttons">
        <a href="LOGIN2.php"> <button class="btn">Log in</button></a>
    </div>

    <div class="footer">
        <p>Contacto: <a href="mailto:contacto@rhinovision.com">contacto@rhinovision.com</a></p>
    </div>
</body>
</html>