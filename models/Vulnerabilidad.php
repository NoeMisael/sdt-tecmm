<?php
class Vulnerabilidad extends Conectar
{

    public function get_vulnerabilidad()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM vulnerabilidades;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

}
?>