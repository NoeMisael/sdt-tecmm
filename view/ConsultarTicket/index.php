<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["id_user"])) {
    ?>

    <!DOCTYPE html>
    <html>
    <?php require_once("../../view/MainHead/head.php"); ?>

    <title>Consulta de Ticket</title>

    <link rel="stylesheet" href="../../public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../../public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/main.css">

    <body class="with-side-menu">
        <?php require_once("../../view/MainHeader/header.php"); ?>
        <div class="mobile-menu-left-overlay"></div>

        <?php require_once("../../view/MainNav/nav.php"); ?>


        <div class="page-content">
            <div class="container-fluid">

                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Consulta de Tickets</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../view/Home/index.php">Home</a></li>
                                    <li class="active">Consultar Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Nro.Ticket</th>
                                <th style="width: 35%;">Titulo</th>
                                <th class="d-none d-sm-table-cell" style="width: 10%;">Categoría</th>
                                <th class="d-none d-sm-table-cell" style="width: 5%;">Afectación</th>
                                <th class="d-none d-sm-table-cell" style="width: 8%;">Área</th>
                                <th class="d-none d-sm-table-cell" style="width: 9%;">Edificio</th>
                                <th class="d-none d-sm-table-cell" style="width: 4%;">Prioridad</th>
                                <th class="d-none d-sm-table-cell" style="width: 13%;">Fecha</th>
                                <th class="text-center" style="width: 5%;"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>

        <?php
        require_once("../../view/MainJs/mainJs.php");
        ?>

        <script type="text/javascript" src="./consultaticket.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location:" . Conectar::ruta() . "/index.php");
}
?>