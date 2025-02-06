<?php
function conectarConBBDD($db = "rbdm", $user = "dwes", $pass = "abc123.")
{
    try {
        $conex = new PDO('mysql:host=localhost;dbname=' . $db . ';charset=utf8mb4', $user, $pass);
    } catch (PDOException $ex) {
        echo $ex->getCode() . "<br>" . $ex->getMessage();
    }
    return $conex;
}

function iniciarSesion($correo, $password)
{
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
        echo $ex->getCode() . "<br>" . $ex->getMessage();
    }
}

function registro($correo, $contrasena, $nombre, $apellidos, $fecha, $pais, $cp, $telf, $img)
{
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
        echo $ex->getCode() . "<br>" . $ex->getMessage();
    }
}

function obtenerTodo($tipo, $tabla)
{
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

function obtenerListaUsuario(int $id_usuario)
{
    $conn = conectarConBBDD();

    try {
        $result = $conn->prepare("SELECT id,nombre,genero,imagen,nota,estado FROM lista JOIN (SELECT id, nombre, genero, imagen FROM contenido) AS sub_contenido ON lista.id_contenido = sub_contenido.id where lista.id_usuario =? order by estado;");
        $result->bindParam(1, $id_usuario);
        $result->execute();
        if ($result->rowCount()) {
            while ($fila = $result->fetchObject()) {
                $listaUsuario[] = $fila;
            }
            return $listaUsuario;
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        echo $ex->getCode() . "<br>" . $ex->getMessage();
    }
}

function obtenerUno($id, $tabla)
{
    $conex = conectarConBBDD();
    try {
        $query = "SELECT * FROM  $tabla where id = :id";
        $stmt = $conex->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchObject();
        }
        return false;
    } catch (PDOException $ex) {
        error_log("Error en obtenerUno: " . $ex->getMessage());
        return false;
    }
}

function obtenerDatosPelicula($conn, $idPeli)
{
    try {
        $result = $conn->query("select * from contenido where id=$idPeli");
        if ($result->rowCount()) {
            $pelicula = $result->fetchObject();
        } else {
            header("Location:index.php");
        }
        return $pelicula;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function obtenerComentarios($conn, $idPeli)
{
    try {
        $comentarios = $conn->query("select u.imagen as imagen, c.texto as texto , c.id as idComentario, u.id as idUsuario from comentario c, usuario u where c.id_contenido = $idPeli and c.id_usuario = u.id");
        return $comentarios;
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function eliminarComentario($conn, $idComentario, $idPelicula)
{
    try {
        $conn->exec("delete from comentario where id = $idComentario");
        header("Location:detalles.php?peli=$idPelicula");
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function actualizarComentario($conn, $comentario, $idComentario, $idPeli)
{
    try {
        $conn->exec("update comentario set texto = '$comentario' where id = $idComentario");
        header("Location:detalles.php?peli=$idPeli");
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function comentar($conn, $idUsuario, $idPeli, $textoComentario)
{
    try {
        $stmt = $conn->prepare("INSERT INTO comentario(id_usuario,id_contenido,texto) VALUES (?, ?, ?)");
        $stmt->execute([$idUsuario, $idPeli, $textoComentario]);
        header("Location:detalles.php?peli=$idPeli");
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function cambiarValoracion($conn, $idUsuario, $idPeli, $nuevaNota)
{
    try {
        $conn->exec("update lista set nota = $nuevaNota where id_contenido = $idPeli and id_usuario=$idUsuario");
        header("Location:detalles.php?peli=$idPeli");
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function obtenerNotaUsuario($conn, $idUsuario, $idPeli)
{
    try {
        $resultado = $conn->query("select nota from lista where id_contenido=$idPeli and id_usuario=$idUsuario");
        if ($resultado->rowCount()) {
            $fila = $resultado->fetchObject();
            $notaUsuario = $fila->nota;
        } else {
            $notaUsuario = 'Sin valorar';
        }
    } catch (PDOException $ex) {
        $notaUsuario = 'Sin valorar';
        echo $ex->getMessage();
    }
    return $notaUsuario;
}

function insertarUsuario($correo, $contrasena, $nombre, $apellidos, $tipo, $fecha, $pais, $cp, $telf, $img)
{
    $conex = conectarConBBDD();
    try {
        $contrasenaCifrada = password_hash($contrasena, PASSWORD_DEFAULT);
        $op = $conex->exec("INSERT INTO usuario (correo, clave, nombre, apellidos, fecha, pais, codigo_postal, telefono, tipo, imagen) VALUES ('$correo', '$contrasenaCifrada', '$nombre', '$apellidos', '$fecha', '$pais', '$cp', '$telf','$tipo', '$img')");
        if ($op) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        echo $ex->getCode() . "<br>" . $ex->getMessage();
    }
}




