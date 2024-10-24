<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background: url('img1.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: space-between;
            /* Espacio entre los dos cuadros */
            align-items: flex-start;
            /* Alinea los cuadros desde la parte superior */
        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 90%;
        }

        .login-container {
            background-color: rgba(0, 0, 50, 0.7);
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            margin: 100px 0 0 50px;
            text-align: center;
            color: white;
        }

        .small-container {
            background-color: rgba(128, 128, 128, 0.8);
            width: 200px;
            /* Cuadro más pequeño */
            padding: 15px;
            border-radius: 10px;
            margin: 200px 50px 0 0;
            /* Espaciado desde la derecha */
            color: white;
            text-align: center;
        }


        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: orange;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: darkorange;
        }

        .links a {
            display: block;
            margin-top: 15px;
            color: lightblue;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #34495e;
            color: #fff;
            margin: 0 5px;
            border-radius: 5px;
        }

        .tab.active {
            background-color: #e67e22;
        }

        #registerForm,
        #loginForm {
            display: none;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .bubbles {
            position: relative;
            display: flex;
        }

        .bubbles span {
            position: relative;
            width: 30px;
            height: 30px;
            background: #4fc3dc;
            margin: 0 4px;
            border-radius: 50%;
            box-shadow: 0 0 0 10px #4fc3dc44, 0 0 50px #4fc3dc, 0 0 100px #4fc3dc;
            animation: animate 15s linear infinite;
            animation-duration: calc(125s / var(--i));
        }

        .bubbles span:nth-child(even) {
            background-color: beige;
            box-shadow: 0 0 0 10px rgb(178, 179, 177), 0 0 50px beige, 0 0 100px beige;
        }

        @keyframes animate {
            0% {
                transform: translateY(100vh) scale(0);
            }

            100% {
                transform: translateY(-10vh) scale(1);
            }
        }
    </style>
</head>

<body>

    <?php
    if (isset($_POST['enviar'])) {

        if (empty($_POST['num_control']) || empty($_POST['password'])) {
            echo "<script language='JavaScript'>
                alert('Ingresa un dato valido')
                location.assign('index.php');
                </script>";
        } else {
            $num_control = $_POST['num_control'];
            $password = $_POST['password'];
            $privilegio = "";
            include("acceso_bd.php");
            $sql = "select * from usuarios where num_control='" . $num_control . "' and password ='" . $password . "' ";
            $resultado = mysqli_query($conexion, $sql);

            if ($fila = mysqli_fetch_assoc($resultado)) {

                $privilegio = $fila['tipo_usuario'];
                $_SESSION['num_control'] = $num_control;
                $_SESSION['tipo_usuario'] = $privilegio;


                if ($privilegio == "administrador") {
                    echo "<script language='JavaScript'>
                alert('Bienvenido " . $nom . "  !!!');
                location.assign('Administrador.php');
                </script>";
                } else if ($privilegio == "alumno") {
                    echo "<script language='JavaScript'>
                    location.assign('carga.php?destino=INICIO_Usuario.php&nom=" . $nom . "');
                    </script>";
                }
            } else {
                echo "<script language='JavaScript'>
                alert('No existe el numero de control o password en la BD')
                location.assign('index.php');
                </script>";
            }
        }
    } else {
        ?>

        <div class="principal">
            <div class="bubbles">
                <span style="--i:11"></span>
                <span style="--i:12"></span>
                <span style="--i:24"></span>
                <span style="--i:10"></span>
                <span style="--i:14"></span>
                <span style="--i:23"></span>
                <span style="--i:18"></span>
                <span style="--i:16"></span>
                <span style="--i:19"></span>
                <span style="--i:20"></span>
                <span style="--i:22"></span>
                <span style="--i:25"></span>
                <span style="--i:18"></span>
                <span style="--i:21"></span>
                <span style="--i:15"></span>
                <span style="--i:13"></span>
                <span style="--i:26"></span>
                <span style="--i:17"></span>
                <span style="--i:13"></span>
                <span style="--i:18"></span>

                <div class="login-container">
                    <div class="logo">
                        <img src="LOGO.png">
                    </div>

                    <div class="tabs">
                        <div class="tab active" onclick="showForm('login')">INICIAR SESIÓN</div>
                        <div class="tab" onclick="showForm('register')">REGISTRARSE</div>
                    </div>

                    <div class="form-container">
                        <!-- Formulario de Iniciar Sesión -->
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <div id="loginForm" class="form" style="display: block;">
                                <input type="text" name="num_control" placeholder="Numero de control" requeried>
                                <input type="password" name="password" placeholder="Password" required>
                                <button type="submit" name="enviar" class="btn">Acceder</button>
                            </div>

                        </form>

                        <?php
                        if (isset($_POST['Registrar'])) {

                            if (
                                empty($_POST['nombre']) || empty($_POST['ap_pat'])
                                || empty($_POST['ap_mat']) || empty($_POST['num_control'])
                                || empty($_POST['email']) || empty($_POST['password'])
                            ) {
                                echo "<script language='JavaScript'>
                                alert('Ingresa un dato valido')
                                location.assign(history.back());
                                </script>";

                            } else {

                                $Nombre = $_POST['nombre'];
                                $Ap_Paterno = $_POST['ap_pat'];
                                $Ap_Materno = $_POST['ap_mat'];
                                $Numero = $_POST['num_control'];
                                $Correo = $_POST['email'];
                                $pass = $_POST['password'];
                                include("acceso_bd.php");

                                // $sql="insert into alumnos (Id_CURP,Ap_Paterno,Ap_Materno,Nombre,Genero,Grupo) values ('".$Id."','".$Ap."','".$Am."','".$N."','".$Genero."','".$Grupo."')";
                                $sql = "insert into usuarios (nombre, ap_pat, ap_mat, num_control, email, password, tipo_usuario) VALUES ('$Nombre', '$Ap_Paterno', '$Ap_Materno', '$Numero', '$Correo','$pass','alumno')";
                                $resultado = mysqli_query($conexion, $sql);
                                if ($resultado == true) {
                                    echo "<script language='JavaScript'>
                                alert('Se ha agregado usuario correctamente')
                                location.assign('INICIO_Usuario.php');
                                </script>";
                                } else {
                                    echo "<script language='JavaScript'>
                                alert('No existe el nombre o password en la BD')
                                location.assign(history.back());
                                </script>";
                                }
                            }

                        } else {
                            ?>
                            <!-- Formulario de Registro -->
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                <div id="registerForm" class="form">
                                    <input type="text" name="nombre" placeholder="NOMBRE DE USUARIO" required>
                                    <input type="text" name="ap_pat" placeholder="APELLIDO MATERNO" required>
                                    <input type="text" name="ap_mat" placeholder="APELLIDO PATERNO" required>
                                    <input type="text" name="num_control" maxlength="9" placeholder="NUMERO DE CONTROL"
                                        required>
                                    <input type="email" name="email" placeholder="CORREO" required>
                                    <input type="password" name="password" placeholder="CONTRASEÑA" required>
                                    <button type="submit" name="Registrar" class="btn">Registrarse</button>
                                </div>

                            </form>

                            <?php
                        }
                        ?>



                    </div>
                    
                </div>
                <div class="bubbles">
                <span style="--i:11"></span>
                <span style="--i:12"></span>
                <span style="--i:24"></span>
                <span style="--i:10"></span>
                <span style="--i:14"></span>
                <span style="--i:23"></span>
                <span style="--i:18"></span>
                <span style="--i:16"></span>
                <span style="--i:19"></span>
                <span style="--i:20"></span>
                <span style="--i:22"></span>
                <span style="--i:25"></span>
                <span style="--i:18"></span>
                <span style="--i:21"></span>
                <span style="--i:15"></span>
                <span style="--i:13"></span>
                <span style="--i:26"></span>
                <span style="--i:17"></span>
                <span style="--i:13"></span>
                <span style="--i:18"></span>
            </div>

        </div>



        <?php
    }
    ?>

    <script>
        function showForm(formType) {
            const registerForm = document.getElementById('registerForm');
            const loginForm = document.getElementById('loginForm');
            const tabs = document.querySelectorAll('.tab');

            if (formType === 'register') {
                registerForm.style.display = 'block';
                loginForm.style.display = 'none';
                tabs[1].classList.add('active');
                tabs[0].classList.remove('active');
            } else {
                registerForm.style.display = 'none';
                loginForm.style.display = 'block';
                tabs[0].classList.add('active');
                tabs[1].classList.remove('active');
            }
        }
    </script>
</body>

</html>