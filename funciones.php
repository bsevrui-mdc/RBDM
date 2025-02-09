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

function obtenerUltimosTres($tabla, $tipo = '0')
{
    $conex = conectarConBBDD();
    try {
        if ($tabla === 'contenido') {
            // Consulta para la tabla "contenido" con filtro por tipo
            if ($tipo != '0') {
                $aniadir = "WHERE tipo = :tipo ";
            } else {
                $aniadir = '';
            }
            $query = "SELECT * FROM contenido " . $aniadir . "order by fecha limit 3";
            $stmt = $conex->prepare($query);
            $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        } else {
            // Consulta para otras tablas sin filtro por tipo
            $query = "SELECT * FROM $tabla order by fecha limit 3";
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

function actualizarSesionUsuario($id)
{
    $usuario = obtenerUno($id, "usuario");

    if ($usuario) {
        $_SESSION['usuario'] = $usuario;
        return true;
    }

    return false;
}
function borrarPeliculaDeLista($id_usuario, $id_contenido)
{
    $conex = conectarConBBDD();
    try {
        $stmt = $conex->prepare("DELETE FROM lista WHERE id_contenido = :id_contenido AND id_usuario = :id_usuario");

        $stmt->bindParam(':id_contenido', $id_contenido, PDO::PARAM_INT);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        error_log("Error al borrar película de la lista: " . $ex->getMessage());
        return false;
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

function cambiarValoracion($conn, $idUsuario, $idPeli, $nuevaNota, $estado)
{
    try {
        $result = $conn->query("select * from lista where id_contenido = $idPeli and id_usuario=$idUsuario");
        if ($result->rowCount()) {
            $conn->exec("update lista set nota = $nuevaNota, estado = $estado where id_contenido = $idPeli and id_usuario=$idUsuario");
        } else {
            $conn->exec("insert into lista values($idPeli,$idUsuario,$nuevaNota,'$estado')");
        }

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

function borrar($id, $tabla)
{
    $conex = conectarConBBDD();
    try {
        $stmt = $conex->exec("DELETE FROM $tabla WHERE id = $id");
    } catch (PDOException $ex) {
        echo $ex->getCode() . "<br>" . $ex->getMessage();
    }
}

function insertarMultimedia($nombre, $tipo, $genero, $nota, $sinopsis, $imagen, $video, $reparto, $fecha)
{
    $conex = conectarConBBDD();
    try {


        // Consulta preparada
        $sql = "INSERT INTO contenido (nombre, tipo, genero, nota, sinopsis, imagen, video, reparto, fecha) 
                VALUES (:nombre, :tipo, :genero, :nota, :sinopsis, :imagen, :video, :reparto, :fecha)";
        $stmt = $conex->prepare($sql);

        // Asignar valores a los parámetros
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
        $stmt->bindParam(':nota', $nota, PDO::PARAM_STR);
        $stmt->bindParam(':sinopsis', $sinopsis, PDO::PARAM_STR);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $stmt->bindParam(':video', $video, PDO::PARAM_STR);
        $stmt->bindParam(':reparto', $reparto, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        error_log("Error en insertarMultimedia: " . $ex->getMessage());
        return false;
    }
}


function actualizarUsuario($id, $correo, $contrasena, $nombre, $apellidos, $tipo, $fecha, $pais, $cp, $telf, $img)
{
    $conex = conectarConBBDD();
    try {
        // Obtener la contraseña actual si no se proporciona una nueva
        if (empty($contrasena)) {
            $stmt = $conex->prepare("SELECT clave FROM usuario WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $contrasenaCifrada = $stmt->fetchColumn(); // Usar la contraseña actual
        } else {
            $contrasenaCifrada = password_hash($contrasena, PASSWORD_DEFAULT);
        }



        // Construir la consulta
        $sql = "UPDATE usuario SET 
                    correo = :correo, 
                    clave = :clave, 
                    nombre = :nombre, 
                    apellidos = :apellidos, 
                    fecha = :fecha, 
                    pais = :pais, 
                    codigo_postal = :cp, 
                    telefono = :telf";

        // Solo actualizar la imagen si se proporciona una nueva
        if (!empty($tipo)) {
            $sql .= ", tipo = :tipo";
        }
        if (!empty($img)) {
            $sql .= ", imagen = :img";
        }

        $sql .= " WHERE id = :id";

        $stmt = $conex->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':clave', $contrasenaCifrada);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':pais', $pais);
        $stmt->bindParam(':cp', $cp);
        $stmt->bindParam(':telf', $telf);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if (!empty($tipo)) {
            $stmt->bindParam(':tipo', $tipo);
        }

        // Solo enlazar la imagen si se proporciona una nueva
        if (!empty($img)) {
            $stmt->bindParam(':img', $img);
        }

        return $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getCode() . "<br>" . $ex->getMessage();
        return false;
    }
}

function actualizarMultimedia($id, $nombre, $tipo, $genero, $nota, $sinopsis, $imagen, $video, $reparto, $fecha)
{
    $conex = conectarConBBDD();
    try {
        // Validar parámetros obligatorios
        if (empty($id) || empty($nombre) || empty($tipo) || empty($genero) || empty($nota) || empty($sinopsis) || empty($reparto) || empty($fecha)) {
            throw new Exception("Todos los campos obligatorios deben tener un valor.");
        }

        // Construir la consulta SQL
        $sql = "UPDATE contenido SET 
                nombre = :nombre, 
                tipo = :tipo, 
                genero = :genero, 
                nota = :nota, 
                sinopsis = :sinopsis, 
                reparto = :reparto, 
                fecha = :fecha";

        // Agregar campos de imagen y video solo si se proporcionan
        if (!empty($imagen)) {
            $sql .= ", imagen = :imagen";
        }
        if (!empty($video)) {
            $sql .= ", video = :video";
        }

        $sql .= " WHERE id = :id";

        // Depuración: Mostrar la consulta SQL y los valores
        echo "Consulta SQL: $sql<br>";
        var_dump($nombre, $tipo, $genero, $nota, $sinopsis, $reparto, $fecha, $imagen, $video);

        // Preparar la consulta
        $stmt = $conex->prepare($sql);

        // Asignar valores a los parámetros
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindValue(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindValue(':genero', $genero, PDO::PARAM_STR);
        $stmt->bindValue(':nota', $nota, PDO::PARAM_STR);
        $stmt->bindValue(':sinopsis', $sinopsis, PDO::PARAM_STR);
        $stmt->bindValue(':reparto', $reparto, PDO::PARAM_STR);
        $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if (!empty($imagen)) {
            $stmt->bindValue(':imagen', $imagen, PDO::PARAM_STR);
        }
        if (!empty($video)) {
            $stmt->bindValue(':video', $video, PDO::PARAM_STR);
        }

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $ex) {
        // Registrar el error y retornar un mensaje
        error_log("Error en actualizarMultimedia: " . $ex->getMessage());
        return "Error en la base de datos: " . $ex->getMessage();
    }
}