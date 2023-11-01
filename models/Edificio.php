<?php
class Edificio extends Conectar
{

    public function get_edificio()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM edificios;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

}
?>