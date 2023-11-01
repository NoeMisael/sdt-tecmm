<?php
class Respuesta extends Conectar
{

    public function get_respuesta()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM requiere_respuesta;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

}
?>