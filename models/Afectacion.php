<?php
class Afectacion extends Conectar
{

    public function get_afectacion()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM afectaciones;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

}
?>