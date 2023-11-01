<?php

require_once("../config/conexion.php");
require_once("../models/Edificio.php");

$edificio = new Edificio();

switch ($_GET["op"]) {
    case "combo":
        $datos = $edificio->get_edificio();

        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value=''> Seleccione un Edificio </option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_edificio'] . "'>" . $row['edificio'] . "</option>";

            }
            echo $html;
        }
        break;
}


?>