<?php
    function conectarConBBDD($db="rbdm", $user="dwes", $pass="abc123.") {
        try {
            $conex = new PDO('mysql:host=localhost;dbname='.$db.';charset=utf8mb4', $user, $pass);
        } catch (PDOException $ex) {
            echo $ex->getCode()."<br>".$ex->getMessage();
        }
        return $conex;
    }

    function iniciarSesion($correo, $password) {
        $conex = conectarConBBDD();
        try {
            $result = $conex->prepare("SELECT * FROM usuario WHERE correo=?");
            $result->bindParam(1, $correo);
            $result->execute();
            if ($result->rowCount()) {
                $user = $result->fetchObject();
                if (password_verify($password, $user->password)) {
                    $_SESSION['usuario'] = $user;
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $ex) {
            echo $ex->getCode()."<br>".$ex->getMessage();
        }
    }
?>