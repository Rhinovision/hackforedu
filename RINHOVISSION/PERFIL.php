<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RhinoVision - Mi Perfil</title>
    <style>
        body {
    display: flex;
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
    box-shadow: 2px 0 5px rgba(0,0,0,0.5);
    transition: width 0.3s; /* Transición suave en el ancho */
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
        #FF8C00
    );
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
        0 4px 6px rgba(0,0,0,0.1),
        inset 0 1px 0 rgba(255,255,255,0.6),
        inset 0 -2px 15px rgba(255,255,255,0.3),
        inset 0 2px 15px rgba(255,255,255,0.3);
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    animation: gradient 5s ease infinite;
}

.sidebar button:hover {
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
        inset 0 1px 0 rgba(255,255,255,0.8),
        inset 0 -2px 20px rgba(255,255,255,0.4),
        inset 0 2px 20px rgba(255,255,255,0.4);
}

.sidebar button:active {
    transform: translateY(1px);
    box-shadow: 
        0 2px 4px rgba(0,0,0,0.1),
        inset 0 1px 0 rgba(255,255,255,0.4),
        inset 0 -2px 10px rgba(255,255,255,0.2),
        inset 0 2px 10px rgba(255,255,255,0.2);
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
    background: linear-gradient(
        rgba(255,255,255,0.2),
        rgba(255,255,255,0.1),
        rgba(255,255,255,0)
    );
    transform: rotate(30deg);
    transition: transform 0.5s;
    pointer-events: none;
}

.sidebar button:hover::after {
    transform: rotate(30deg) translate(50%, 50%);
}

/* Aplicamos los mismos estilos al botón de editar */
.edit-button {
    background: linear-gradient(145deg, 
        #FF8C00,
        #FFA500,
        #FFB732,
        #FFA500,
        #FF8C00
    );
    background-size: 200% 200%;
    color: white;
    border: none;
    padding: 15px 30px;
    margin: 20px auto;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    display: block;
    box-shadow: 
        0 4px 6px rgba(0,0,0,0.1),
        inset 0 1px 0 rgba(255,255,255,0.6),
        inset 0 -2px 15px rgba(255,255,255,0.3),
        inset 0 2px 15px rgba(255,255,255,0.3);
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    animation: gradient 5s ease infinite;
}

.edit-button:hover {
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
        inset 0 1px 0 rgba(255,255,255,0.8),
        inset 0 -2px 20px rgba(255,255,255,0.4),
        inset 0 2px 20px rgba(255,255,255,0.4);
}

.edit-button:active {
    transform: translateY(1px);
    box-shadow: 
        0 2px 4px rgba(0,0,0,0.1),
        inset 0 1px 0 rgba(255,255,255,0.4),
        inset 0 -2px 10px rgba(255,255,255,0.2),
        inset 0 2px 10px rgba(255,255,255,0.2);
}

.edit-button::after {
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

.edit-button:hover::after {
    transform: rotate(30deg) translate(50%, 50%);
}

.main-content {
    margin-left: 270px; /* Ajusta este margen si cambias el ancho de la barra lateral */
    padding: 40px;
    background-color: #333;
    min-height: 100vh; /* Asegúrate de que el contenido mínimo sea 100vh */
    color: white;
    flex: 1; /* Permite que el contenido principal ocupe el espacio restante */
    transition: margin-left 0.3s; /* Transición suave en el margen */
}

.profile-section {
    text-align: center;
    margin-bottom: 40px;
}

.profile-pic {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background-color: #555;
    margin: 0 auto 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 24px;
    color: #999;
    position: relative;
    overflow: hidden;
    box-shadow: 
        0 4px 15px rgba(0,0,0,0.3),
        inset 0 2px 5px rgba(255,255,255,0.3);
}

.profile-info {
    max-width: 400px;
    margin: 0 auto;
    text-align: left;
    background: rgba(0,0,0,0.2);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.profile-info p {
    margin: 10px 0;
    padding: 10px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.profile-info p:last-child {
    border-bottom: none;
}

.profile-info strong {
    color: #FFA500;
}

/* Media Queries para hacer el diseño responsivo */
@media (max-width: 768px) {
    .sidebar {
        width: 200px; /* Reduce el ancho en pantallas más pequeñas */
    }

    .main-content {
        margin-left: 220px; /* Ajusta el margen para que se vea bien */
        padding: 20px; /* Reduce el padding en el contenido principal */
    }

    .sidebar h2, .sidebar button {
        font-size: 16px; /* Ajusta el tamaño de la fuente */
    }

    .profile-section {
        margin-bottom: 20px; /* Reduce el margen */
    }

    .profile-pic {
        width: 150px; /* Reduce el tamaño de la imagen de perfil */
        height: 150px; /* Ajusta también la altura */
    }

    .profile-info {
        max-width: 300px; /* Ajusta el ancho máximo de la info del perfil */
    }
}

@media (max-width: 576px) {
    .sidebar {
        width: 150px; /* Ancho aún más reducido para pantallas pequeñas */
    }

    .main-content {
        margin-left: 170px; /* Ajusta el margen para que se vea bien */
        padding: 10px; /* Reduce aún más el padding */
    }

    .sidebar h2, .sidebar button {
        font-size: 14px; /* Ajusta el tamaño de la fuente */
    }

    .profile-pic {
        width: 120px; /* Tamaño de imagen de perfil reducido */
        height: 120px; /* Ajusta la altura también */
    }

    .profile-info {
        max-width: 100%; /* Asegúrate de que la info del perfil use el 100% */
    }
}

    </style>
</head>
<body>
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
</body>
</html>