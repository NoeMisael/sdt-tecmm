<?php

require_once("../config/conexion.php");
require_once("../models/Vulnerabilidad.php");

$vulnerabilidad = new Vulnerabilidad();

switch ($_GET["op"]) {
    case "combo":
        $datos = $vulnerabilidad->get_vulnerabilidad();

        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value=''> Seleccione una Vulnerabildad </option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_vulnerabilidad'] . "'>" . $row['vulnerabilidad'] . "</option>";

            }
            echo $html;
        }
        break;
}


?>