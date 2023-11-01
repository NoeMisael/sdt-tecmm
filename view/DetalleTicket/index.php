<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["id_user"])) {
    ?>

    <!DOCTYPE html>
    <html>
    <?php require_once("../../view/MainHead/head.php"); ?>

    <title id="titulo"></title>

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
                                <h4 id="tituloTicket"></h4>
                                <span id="fechaTicket"></span>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../view/Home/index.php">Home</a></li>
                                    <li class="active">Detalle del Ticket</li>
                                    <li class="active" id="id_ticket"> </li>
                                </ol>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <span id="lblstatus"></span>
                                </ol>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <span id="lblagente"></span>
                                </ol>

                            </div>

                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">

                    <h5 class="m-t-lg with-border">Detalle del ticket</h5>

                    <div class="row">


                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="descripcion">Descripción del ticket</label>
                                <div class="summernote-theme-1">
                                    <textarea id="descripcion" class="summernote" name="descripcion"></textarea>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="prioridad">Prioridad</label>
                                <input type="text" class="form-control" id="prioridad" name="prioridad" readonly>
                            </fieldset>
                        </div>

                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="categoria">Categoría</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" readonly>
                            </fieldset>
                        </div>


                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="presupuesto">Presupuesto</label>
                                <input type="text" class="form-control" id="reqpresupuesto" readonly>
                            </fieldset>
                        </div>

                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="edificio">Edificio</label>
                                <input type="text" class="form-control" id="edificio" readonly>
                            </fieldset>
                        </div>

                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="area">Area</label>
                                <input type="text" class="form-control" id="area" readonly>
                            </fieldset>
                        </div>

                    </div>


                </div>

                <section class="activity-line" id="lbldetalle">

                </section>


                <div class="col-lg-12">
                    <fieldset class="form-group">
                        <label class="form-label semibold" for="notas">Inserta nueva nota</label>
                        <div class="summernote-theme-1">
                            <textarea id="notas" class="summernote" name="notas"
                                placeholder="Favor de ingresar valores"></textarea>
                        </div>
                    </fieldset>
                </div>

                <?php
                if ($_SESSION["level"] == 2) {
                    ?>
                    <div class="col-lg-3">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Requiere Presupuesto</label>
                            <input id="id_presupuesto" class="form-control" required>
                        </fieldset>
                    </div>



                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="id_status">Status</label>
                            <select id="id_status" class="form-control">
                            </select>
                        </fieldset>
                    </div>
                <?php }
                ?>


                <div class="col-lg-12">
                    <button type="button" id="enviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
                </div>


            </div>
        </div>

        <?php
        require_once("../../view/MainJs/mainJs.php");
        ?>

        <script type="text/javascript" src="./detalleticket.js"></script>
    </body>

    </html>

    <?php
} else {
    header("Location:" . Conectar::ruta() . "/index.php");
}
?>