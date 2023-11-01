<?php

require_once("../config/conexion.php");
require_once("../models/Ticket.php");

$ticket = new Ticket();

switch ($_GET["op"]) {
    case "insert":
        $ticket->insert_ticket($_POST["tituloTicket"], $_POST["descripcion"], $_POST["id_categoria"], $_POST["id_usuario"], $_POST["id_edificio"], $_POST["id_afectacion"], $_POST["id_area"], $_POST["id_vulnerabilidad"], $_POST["id_respuesta"]);
        break;

    case "list_x_usu":
        $datos = $ticket->listar_ticket_x_usuario($_POST["id_usuario"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["id_ticket"];
            $sub_array[] = $row["tituloTicket"];
            $sub_array[] = $row["categoria"];
            $sub_array[] = $row["afectacion"];
            $sub_array[] = $row["area"];
            $sub_array[] = $row["edificio"];
            $sub_array[] = $row["prioridad"];
            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fecha"]));
            $sub_array[] = '<button type="button" onClick="ver(' . $row["id_ticket"] . ');"  id="' . $row["id_ticket"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye">    Ver</i></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case "listar":
        $datos = $ticket->listar_tickets();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["id_ticket"];
            $sub_array[] = $row["tituloTicket"];
            $sub_array[] = $row["categoria"];
            $sub_array[] = $row["afectacion"];
            $sub_array[] = $row["area"];
            $sub_array[] = $row["edificio"];
            $sub_array[] = $row["prioridad"];
            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fecha"]));

            $sub_array[] = '<button type="button" onClick="ver(' . $row["id_ticket"] . ');"  id="' . $row["id_ticket"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye">    Ver</i></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case "listardetalle":
        $datos = $ticket->listar_ticketDetalle_x_ticket($_POST["tick_id"]);
        ?>

        <?php
        foreach ($datos as $row) {

            ?>

            <article class="activity-line-item box-typical">
                <div class="activity-line-date">
                    <?php echo date("d/m/Y", strtotime($row["fechaNota"])) ?>
                </div>
                <header class="activity-line-item-header">
                    <div class="activity-line-item-user">
                        <div class="activity-line-item-user-photo">
                            <a href="#">
                                <img src="../../public/img/avatar-1-64.png" alt="">
                            </a>
                        </div>
                        <div class="activity-line-item-user-name">
                            <?php echo $row['nombre'] ?>
                        </div>
                        <div class="activity-line-item-user-status">


                            <?php
                            if ($row['id_usuario'] == 1) {
                                echo "Usuario";
                            } else if ($row['id_usuario'] == 2) {
                                echo "Agente de soporte";
                            } else if ($row['id_usuario'] == 3) {
                                echo "Adminstrador";
                            } else {
                                echo "Generado por el sistema";
                            }
                            ?>

                        </div>
                    </div>
                </header>
                <div class="activity-line-action-list">


                    <section class="activity-line-action">
                        <div class="time">
                            <?php echo date("H:i", strtotime($row["fechaNota"])) ?>
                        </div>
                        <div class="cont">
                            <div class="cont-in">
                                <p>
                                    <?php echo $row["notas"] ?>
                                </p>

                            </div>
                        </div>
                    </section><!--.activity-line-action-->
                </div><!--.activity-line-action-list-->
            </article><!--.activity-line-item-->

            <?php
        }

        ?>
        <?php

        break;

    case "mostrar";
        $datos = $ticket->listar_ticket_x_id($_POST["tick_id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["id_ticket"] = $row["id_ticket"];
                $output["tituloTicket"] = $row["tituloTicket"];
                $output["descripcionTicket"] = $row["descripcion"];
                $output["agente"] = $row["agente"];
                $output["usuario"] = $row["usuario"];
                $output["status"] = $row["status"];
                $output["prioridad"] = $row["prioridad"];
                $output["edificio"] = $row["edificio"];
                $output["categoria"] = $row["categoria"];
                $output["presupuesto"] = $row["id_presupuesto"];
                $output["area"] = $row["area"];

                if ($row["status"] == "abierto") {
                    $output["status"] = '<span id="status" class="label label-pill label-primary">Abierto</span>';
                } else if ($row["status"] == "pendiente") {
                    $output["status"] = '<span id="status" class="label label-pill label-success">Pendiente</span>';
                } else {
                    $output["status"] = '<span class="label label-pill label-danger">Cerrado</span>';
                }

                $output["fechaticket"] = date("d/m/Y H:i:s", strtotime($row["fecha"]));
            }
            echo json_encode($output);
        }
        break;

    case "insertdetalle":
        $ticket->insert_ticketdetalle($_POST["id_ticket"], $_POST["notas"], $_POST["id_usuario"], $_POST["presupuesto"], $_POST["id_status"]);
        break;

}

?>