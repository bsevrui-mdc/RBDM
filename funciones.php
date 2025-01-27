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
                if (password_verify($password, $user->clave)) {
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

    function registro($correo, $contrasena, $nombre, $apellidos, $fecha, $pais, $cp, $telf, $img) {
        $conex = conectarConBBDD();
        try {
            $result = $conex->query("SELECT correo FROM usuario");
            if ($result->rowCount()) {
                while ($data = $result->fetchObject()) {
                    if ($correo == $data->correo) {
                        return false;
                    }
                }
            }
            $contrasenaCifrada = password_hash($contrasena, PASSWORD_DEFAULT);
            $op = $conex->exec("INSERT INTO usuario (correo, clave, nombre, apellidos, fecha, pais, codigo_postal, telefono, imagen) VALUES ('$correo', '$contrasenaCifrada', '$nombre', '$apellidos', '$fecha', '$pais', '$cp', '$telf', '$img')");
            if ($op) {
                if (iniciarSesion($correo, $contrasena)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getCode()."<br>".$ex->getMessage();
        }
    }

    function obtenerTodo($tipo, $tabla) {
        $conex = conectarConBBDD();
        try {
            if ($tabla === 'contenido') {
                // Consulta para la tabla "contenido" con filtro por tipo
                $query = "SELECT * FROM contenido WHERE tipo = :tipo";
                $stmt = $conex->prepare($query);
                $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
            } else {
                // Consulta para otras tablas sin filtro por tipo
                $query = "SELECT * FROM $tabla";
                $stmt = $conex->prepare($query);
            }
    
            $stmt->execute();
    
            if ($stmt->rowCount()) {
                // Recuperar los datos como array de objetos
                while ($fila = $stmt->fetchObject()) {
                    $datos[] = $fila;
                }
                return $datos;
            } else {
                return false; // No hay resultados
            }
        } catch (PDOException $ex) {
            die("Error al obtener los datos: " . $ex->getMessage());
        }
    }
    
?>