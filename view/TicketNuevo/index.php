<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["id_user"])) {
    ?>

    <!DOCTYPE html>
    <html>
    <?php require_once("../../view/MainHead/head.php"); ?>

    <title>Crear nuevo Ticket</title>

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
                                <h3>Nuevo Ticket</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../view/Home/index.php">Home</a></li>
                                    <li class="active">Nuevo Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <p>
                        Creación de Ticket con sus respectivos datos
                    </p>

                    <h5 class="m-t-lg with-border">Datos para la generación del ticket</h5>

                    <h5 class="m-t-lg with-border">Ingresar Información</h5>

                    <div class="row">


                        <form method="post" id="ticket_form">

                            <input type="hidden" name="id_usuario" id="id_usuario" value =" <?php echo $_SESSION["id_user"] ?>">

                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="tituloTicket">Titulo</label>
                                    <input type="text" class="form-control" id="tituloTicket" name="tituloTicket"
                                        placeholder="Ingrese Titulo" required>
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="descripcion">Descripción</label>
                                    <div class="summernote-theme-1">
                                        <textarea id="descripcion" class="summernote" name="descripcion"
                                            placeholder="Ingresa una descipción a tu problema"></textarea>
                                    </div>
                                </fieldset>
                            </div>

                            
                            <div class="col-lg-3">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="id_area">Área</label>
                                    <select id="id_area" name="id_area" class="form-control" required>
                                    </select>
                                </fieldset>
                            </div>
                            
                            <div class="col-lg-3">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="id_edificio">Edificio</label>
                                    <select id="id_edificio" name="id_edificio" class="form-control" required>
                                    </select>
                                </fieldset>
                            </div>


                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="id_categoria">Categoria</label>
                                    <select id="id_categoria" name="id_categoria" class="form-control" required>
                                    </select>
                                </fieldset>
                            </div>

                            
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="id_vulnerabilidad">Vulnerabilidad</label>
                                    <select id="id_vulnerabilidad" name="id_vulnerabilidad" class="form-control" required>
                                    </select>
                                </fieldset>
                            </div>


                            <div class="col-lg-3">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="id_afectacion">Afectación</label>
                                    <select id="id_afectacion" name="id_afectacion" class="form-control" required>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-lg-3">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="id_respuesta">Requiere respuesta</label>
                                    <select id="id_respuesta" name="id_respuesta" class="form-control" required>
                                    </select>
                                </fieldset>
                            </div>


                            <div class="col-lg-12">
                                <button type="submit" name="action" value="add"
                                    class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                            </div>

                        </form>
                    </div>


                </div>


            </div>
        </div>

        <?php
        require_once("../../view/MainJs/mainJs.php");
        ?>

        <script type="text/javascript" src="./newTicket.js"></script>
    </body>

    </html>

    <?php
} else {
    header("Location:" . Conectar::ruta() . "/index.php");
}
?>