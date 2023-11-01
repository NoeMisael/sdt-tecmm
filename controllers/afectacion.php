<?php

require_once("../config/conexion.php");
require_once("../models/Afectacion.php");

$afectacion = new Afectacion();

switch ($_GET["op"]) {
    case "combo":
        $datos = $afectacion->get_afectacion();

        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value=''> ¿Afecta a la escuela? </option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_afectacion'] . "'>" . $row['afectacion'] . "</option>";

            }
            echo $html;
        }
        break;
}


?>