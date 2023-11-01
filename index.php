<?php
require_once("config/conexion.php");
if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {
    require_once("models/usuario.php");
    $usuario = new usuario();
    $usuario->login();
}
?>



<!DOCTYPE html>
<html>

<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio de sesión</title>

    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="post" id="login-form">
                    <input type="hidden" id="level" name="level" value="1">

                    <header class="sign-title" id="lbltitulo">Inicio de sesión Usuario</header>

                    <?php
                    if (isset($_GET["m"])) {
                        switch ($_GET["m"]) {
                            case "1";
                                ?>
                                <div class="alert alert-purple alert-icon alert-close alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="font-icon font-icon-warning"></i>
                                    ¡ El usuario o contraseña son incorrectos!
                                </div>
                                <?php
                                break;

                            case "2";
                                ?>
                                <div class="alert alert-purple alert-icon alert-close alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="font-icon font-icon-warning"></i>
                                    ¡ Se necesitan ingresar datos!
                                </div>
                                <?php
                                break;
                        }

                    }
                    ?>
                    <div class="form-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Usuario" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Contraseña" />
                    </div>
                    <div class="form-group">
                        <div class="float-left reset">
                            <a href="#" id="btnsoporte">Acceso Soporte</a>
                        </div>
                        <div class="float-right reset">
                            <a href="#" id="btnadmin">Admin</a>
                        </div>
                        <!-- <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Mantener sesión </label>
                        </div>
                        <div class="float-right reset">
                            <a href="reset-password.html">Recuperar contraseña</a>
                        </div> -->
                    </div>
                    <input type="hidden" name="enviar" class="form-control" value="si">
                    <button type="submit" class="btn btn-rounded">Acceder</button>
                </form>
            </div>
        </div>
    </div>
    <!--.page-center-->


    <script src="public/js/lib/jquery/jquery.min.js"></script>
    <script src="public/js/lib/tether/tether.min.js"></script>
    <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function () {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function () {
                setTimeout(function () {
                    $('.page-center').matchHeight({
                        remove: true
                    });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                }, 100);
            });
        });
    </script>
    <script type="text/javascript" src="index.js"></script>

    <script src="public/js/app.js"></script>
</body>

</html>