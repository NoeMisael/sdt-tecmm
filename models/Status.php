<?php
class Status extends Conectar
{

    public function get_status()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM statuses;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

}
?>