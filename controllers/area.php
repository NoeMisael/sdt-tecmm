<?php

require_once("../config/conexion.php");
require_once("../models/Area.php");

$area = new Area();

switch ($_GET["op"]) {
    case "combo":
        $datos = $area->get_area();

        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value=''> Seleccione un area </option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_area'] . "'>" . $row['area'] . "</option>";

            }
            echo $html;
        }
        break;
}


?>