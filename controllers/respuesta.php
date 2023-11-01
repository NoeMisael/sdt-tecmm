<?php

require_once("../config/conexion.php");
require_once("../models/Respuesta.php");

$respuesta = new Respuesta();

switch ($_GET["op"]) {
    case "combo":
        $datos = $respuesta->get_respuesta();

        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value=''> ¿Requiere respuesta? </option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_respuesta'] . "'>" . $row['respuesta'] . "</option>";

            }
            echo $html;
        }
        break;
}


?>