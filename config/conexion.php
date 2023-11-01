<?php
session_start();

class Conectar
{
    protected $dbh;
    protected function conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=tecmm", "root", "1234");
            return $conectar;
        } catch (Exception $e) {
            print("Error conexion" . $e->getMessage() . "<br/>");
            die();
        }
    }
    public function set_names()
    {
        return $this->dbh->query("SET CHARSET utf8");
    }
    public static function ruta()
    {
        return "http://localhost:80/sys-tecmm/";
    }

}

?>