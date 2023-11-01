<?php

require_once("../config/conexion.php");
require_once("../models/Status.php");

$status = new Status();

switch ($_GET["op"]) {
    case "combo":
        $datos = $status->get_status();

        if (is_array($datos) == true and count($datos) > 0) {
            $html = "<option value=''> Status del ticket </option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['id_status'] . "'>" . $row['status'] . "</option>";

            }
            echo $html;
        }
        break;
}


?>