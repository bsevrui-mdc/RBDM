<?php
require('funciones.php');
include("includes/a_config.php");

date_default_timezone_set("Europe/Madrid");

// Verificar si el usuario es admin
if ($_SESSION['usuario']->tipo != "admin") {
    header("Location: index.php");
    exit();
}

// Inicializar variables
$obj = null;
$tipoSeleccionado = isset($_POST['tipo']) ? $_POST['tipo'] : null;

// Verificar si se está editando un usuario/contenido
if (isset($_POST['editar']) || isset($_POST['media']) || isset($_POST['user'])) {
    if (isset($_POST['id']) && isset($_POST['tipo'])) {
        $obj = obtenerUno($_POST['id'], $_POST['tipo']);
        $tipoSeleccionado = $obj->tipo; // Usamos el tipo real del objeto
    }
}

if(isset($_POST['insert'])){
    if($tipoSeleccionado=='cliente'|| $tipoSeleccionado=='admin'){
        if(is_uploaded_file($_FILES['img']['tmp_name'])){
            $ruta = "./assets/img/profilePictures/".time()."-".$_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
    
            insertarUsuario($_POST['email'],$_POST['pass'],$_POST['nombre'],$_POST['apellidos'],$_POST['tipo'],$_POST['fecha'],$_POST['pais'],$_POST['codigo_postal'],$_POST['telefono'],$ruta);
            header('Location: admin.php');
        }
    }
    else 
    if ($tipoSeleccionado == 'Pelicula' || $tipoSeleccionado == 'Serie') {
        // Definir la ruta base según el tipo de contenido
        $rutaBaseImg = ($tipoSeleccionado == 'Pelicula') 
            ? "./assets/img/peliculas/" 
            : "./assets/img/Series/";

        // Construir la ruta completa para la imagen
        $rutaImg = $rutaBaseImg . time() . "-" . $_FILES['img']['name'];

        // Mover la imagen al directorio correspondiente
        if (is_uploaded_file($_FILES['img']['tmp_name'])) {
            move_uploaded_file($_FILES['img']['tmp_name'], $rutaImg);
        } else {
            die("Error al subir la imagen.");
        }
        // Construir la ruta para el video 
        $rutaVideo = "./assets/video/" . time() . "-" . $_FILES['video']['name'];
        if (is_uploaded_file($_FILES['video']['tmp_name'])) {
            move_uploaded_file($_FILES['video']['tmp_name'], $rutaVideo);
        } else {
            die("Error al subir el video.");
        }
        if(insertarMultimedia($_POST['nombre'],$_POST['tipo'],$_POST['genero'],$_POST['nota'],$_POST['sinopsis'],$rutaImg,$rutaVideo,$_POST['reparto'],$_POST['fecha_lanzamiento'])){
            header('Location: admin.php');
        }else{
            echo 'Error al insertar la Serie/Peliculaelicula';
        }
    }
    
}
//var_dump($_POST['id']);
if(isset($_POST['update'])){
    if($tipoSeleccionado=='cliente'||$tipoSeleccionado=='admin'){
        $ruta = "./assets/img/profilePictures/".time()."-".$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
        actualizarUsuario($_POST['id'],$_POST['email'],$_POST['pass'],$_POST['nombre'],$_POST['apellidos'],$_POST['tipo'],$_POST['fecha'],$_POST['pais'],$_POST['codigo_postal'],$_POST['telefono'],$ruta);
        header('Location: admin.php');
    }
    if ($tipoSeleccionado == 'Pelicula' || $tipoSeleccionado == 'Serie') {
        // Verificar si se subió una nueva imagen
        if (!is_uploaded_file($_FILES['img']['tmp_name'])) {
            $rutaImg = $_POST['imagen_actual'];
            
        } else {
            $rutaImg = "./assets/img/peliculas/" . time() . "-" . $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $rutaImg);
            
        }

        // Verificar si se subió un nuevo video
        if (!is_uploaded_file($_FILES['video']['tmp_name'])) {
            $rutaVideo = $_POST['video_actual'];
            
        } else {
            $rutaVideo = "./assets/video/" . time() . "-" . $_FILES['video']['name'];
            move_uploaded_file($_FILES['video']['tmp_name'], $rutaVideo);
            
        }

        // Llamar a la función para actualizar el contenido multimedia
        if (actualizarMultimedia(
            $_POST['id'],
            $_POST['nombre'],
            $_POST['tipo'],
            $_POST['genero'],
            $_POST['nota'],
            $_POST['sinopsis'],
            $rutaImg,
            $rutaVideo,
            $_POST['reparto'],
            $_POST['fecha']
        )) {
            // Redirigir después de la actualización
            header('Location: admin.php');
        } else {

            echo 'Error al actualizar';
            var_dump($_POST);
        }
    }
   
} 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tags.php"); ?>
</head>
<body class="login">
    <?php include("includes/navbar.php"); ?>
    <main class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 my-lg-4 p-4 content rounded shadow">
                <h1 class="text-center mb-4">Zona de edición</h1>

                <form action="" method="POST" class="px-3 px-lg-5" enctype="multipart/form-data">
                    <div class="mb-3 text-center">
                        <label class="form-label">Tipo:</label>
                        <select name="tipo" class="form-select" >
                            <?php if($tipoSeleccionado=='cliente'||$tipoSeleccionado=='admin'): ?>
                            <option value="cliente" <?php echo ($tipoSeleccionado == 'cliente') ? 'selected' : ''; ?>>Usuario</option>
                            <option value="admin" <?php echo ($tipoSeleccionado == 'admin') ? 'selected' : ''; ?>>Administrador</option>
                            <?php else: ?>
                            <option value="Pelicula" <?php echo ($tipoSeleccionado == 'Pelicula') ? 'selected' : ''; ?>>Película</option>
                            <option value="Serie" <?php echo ($tipoSeleccionado == 'Serie') ? 'selected' : ''; ?>>Serie</option>
                            <?php endif; ?>
                        </select>
                    </div>
                
                    <div class="mb-3 text-center">
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control"
                               value="<?php echo isset($obj) ? htmlspecialchars($obj->nombre) : ''; ?>"
                               placeholder="Insertar nombre" required>
                    </div>

                    <?php if ($tipoSeleccionado == 'cliente' || $tipoSeleccionado == 'admin'): ?>
                        <!-- FORMULARIO PARA USUARIOS -->
                        <div class="mb-3 text-center">
                            <label class="form-label">Apellidos:</label>
                            <input type="text" name="apellidos" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->apellidos) : ''; ?>"
                                   placeholder="Insertar apellidos" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Password:</label>
                            <input type="text" name="pass" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->clave) : ''; ?>"
                                    required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Fecha de nacimiento:</label>
                            <input type="date" name="fecha" class="form-control"
                                   value="<?php echo isset($obj) ? $obj->fecha : ''; ?>" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">País:</label>
                            <input type="text" name="pais" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->pais) : ''; ?>"
                                   placeholder="Insertar país" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Código Postal:</label>
                            <input type="number" name="codigo_postal" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->codigo_postal) : ''; ?>"
                                   placeholder="Insertar Código Postal" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Teléfono:</label>
                            <input type="text" name="telefono" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->telefono) : ''; ?>"
                                   placeholder="Insertar teléfono" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->correo) : ''; ?>"
                                   placeholder="example@example.com" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Imagen:</label>
                            <input type="file" name="img" class="form-control">
                        </div>

                    <?php else: ?>
                        <!-- FORMULARIO PARA PELÍCULAS Y SERIES -->
                        <div class="mb-3 text-center">
                            <label class="form-label">Género:</label>
                            <select name="genero" class="form-select">
                                <?php
                                $generos = ["Comedia", "Acción", "Fantasía", "Drama", "Infantil", "Terror"];
                                foreach ($generos as $genero) {
                                    echo "<option value='$genero' " . (isset($obj) && trim($obj->genero) == $genero ? 'selected' : '') . ">$genero</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Sinopsis:</label>
                            <textarea name="sinopsis" class="form-control" rows="4"><?php echo isset($obj) ? htmlspecialchars($obj->sinopsis) : ''; ?></textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Reparto:</label>
                            <textarea name="reparto" class="form-control" rows="4"><?php echo isset($obj) ? htmlspecialchars($obj->reparto) : ''; ?></textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Nota:</label>
                            <select name="nota" class="form-select">
                                <?php
                                $notas = [1,2,3,4,5,6,7,8,9,10];
                                foreach ($notas as $nota) {
                                    echo "<option value='$nota' " . (isset($obj) && trim($obj->nota) == $nota ? 'selected' : '') . ">$nota</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Fecha de lanzamiento:</label>
                            <input type="date" name="fecha" class="form-control"
                                   value="<?php echo isset($obj) ? $obj->fecha : ''; ?>" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Imagen:</label>
                            <input type="file" name="img" class="form-control">
                            <input type="hidden" name="imagen_actual" value="<?php echo isset($obj) ? $obj->imagen : ''; ?>">

                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Video:</label>
                            <input type="file" name="video" class="form-control">
                            <input type="hidden" name="video_actual" value="<?php echo isset($obj) ? $obj->video : ''; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="mb-3 text-center">
                    <input type="hidden" name="id" value="<?php echo isset($obj->id) ? $obj->id : ''; ?>">
                    <button type="submit" class="btn btn-primary " 
                        name="<?php echo isset($obj) ? 'update' : 'insert'; ?>">
                        <?php echo isset($obj) ? 'Actualizar' : 'Añadir'; ?>
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="./js/signup.js" type="text/javascript"></script>
</body>
</html>
