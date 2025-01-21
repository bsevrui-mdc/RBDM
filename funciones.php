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
            $result->bindParam(1, $_POST['email']);
            $result->execute();
            if ($result->rowCount()) {
                $user = $result->fetchObject();
                if (password_verify($_POST['password'], $user->password)) {
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

    function cerrarSesion() {
        session_destroy();
        session_unset();
        setcookie("PHPSESSID", "", time()-3600, "/");
        header("Location: login.php");
    }
?>