<?php
class usuario extends Conectar
{
        public function login()
        {
                $conectar = parent::conexion();
                parent::set_names();
                if (isset($_POST["enviar"])) {
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $level = $_POST["level"];
                        if (empty($username) and empty($password)) {
                                header("Location:" . Conectar::ruta() . "index.php?m=2");
                        } else {
                                $sql = "select * from usuarios where username=? and password=? and level=?";
                                $stmt = $conectar->prepare($sql);
                                $stmt->bindValue(1, $username);
                                $stmt->bindValue(2, $password);
                                $stmt->bindValue(3, $level); 
                                $stmt->execute();
                                $resultado = $stmt->fetch();
                                if (is_array($resultado) and count($resultado) > 0) {
                                        $_SESSION["id_user"] = $resultado["id_user"];
                                        $_SESSION["username"] = $resultado["username"];
                                        $_SESSION["nombre"] = $resultado["nombre"];
                                        $_SESSION["email"] = $resultado["email"];
                                        $_SESSION["level"] = $resultado["level"];
                                        header("Location:" . Conectar::ruta() . "view/Home/");
                                        exit();
                                } else {
                                        header("Location:" . Conectar::ruta() . "index.php?m=1");
                                }
                        }
                }
        }
}

?>