<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login2style.css">
    <title>Login</title>
  
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