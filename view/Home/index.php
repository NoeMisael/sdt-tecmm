<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["id_user"])) {
    ?>

    <!DOCTYPE html>
    <html>
    <?php require_once("../../view/MainHead/head.php"); ?>

    <title>Pagina Pricipal</title>

    <link rel="stylesheet" href="../../public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">

    <body class="with-side-menu">
        <?php require_once("../../view/MainHeader/header.php"); ?>
        <div class="mobile-menu-left-overlay"></div>

        <?php require_once("../../view/MainNav/nav.php"); ?>


        <div class="page-content">
            <div class="container-fluid">
                Blank page.
            </div>
        </div>

        <?php
        require_once("../../view/MainJs/mainJs.php");
        ?>

        <script type="text/javascript" src="./home.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location:" . Conectar::ruta() . "/index.php");
}
?>