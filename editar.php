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
    if(empty($_POST['nombre']) || empty($_POST['tipo']) || empty($_POST['genero']) || empty($_POST['nota']) || empty($_POST['sinopsis']) || !$rutaImg || !$rutaVideo || empty($_POST['reparto']) || empty($_POST['fecha_lanzamiento'])){
        $errorEditar=true;
    }
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
            $errorEditar=true;
        }
        // Construir la ruta para el video 
        $rutaVideo = "./assets/video/" . time() . "-" . $_FILES['video']['name'];
        if (is_uploaded_file($_FILES['video']['tmp_name'])) {
            move_uploaded_file($_FILES['video']['tmp_name'], $rutaVideo);
        } else {
            $errorEditar=true;
        }
        if(insertarMultimedia($_POST['nombre'],$_POST['tipo'],$_POST['genero'],$_POST['nota'],$_POST['sinopsis'],$rutaImg,$rutaVideo,$_POST['reparto'],$_POST['fecha'])){
            header('Location: admin.php');
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
                <?php if(isset($_POST['insert']) && $errorEditar) 
                echo "<span class='text-danger'>Ha ocurrido un error al enviar el formulario</span>"?>
                <form action="" method="POST" class="px-3 px-lg-5" enctype="multipart/form-data">
                    <div class="mb-3 text-center">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <select name="tipo" id="tipo" class="form-select">
                            <?php if($tipoSeleccionado=='cliente'||$tipoSeleccionado=='admin'): ?>
                            <option value="cliente" <?php echo ($tipoSeleccionado == 'cliente') ? 'selected' : ''; ?>>
                                Usuario</option>
                            <option value="admin" <?php echo ($tipoSeleccionado == 'admin') ? 'selected' : ''; ?>>
                                Administrador</option>
                            <?php else: ?>
                            <option value="Pelicula" <?php echo ($tipoSeleccionado == 'Pelicula') ? 'selected' : ''; ?>>
                                Película</option>
                            <option value="Serie" <?php echo ($tipoSeleccionado == 'Serie') ? 'selected' : ''; ?>>Serie
                            </option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="mb-3 text-center">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control"
                            value="<?php echo isset($obj) && !$error ? htmlspecialchars($obj->nombre) : ''; ?>"
                            placeholder="Insertar nombre" required>
                            <span id="errorNombre" class="text-danger"></span>
                    </div>

                    <?php if ($tipoSeleccionado == 'cliente' || $tipoSeleccionado == 'admin'): ?>
                    <!-- FORMULARIO PARA USUARIOS -->
                    <div class="mb-3 text-center">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control"
                            value="<?php echo isset($obj) ? htmlspecialchars($obj->apellidos) : ''; ?>"
                            placeholder="Insertar apellidos" required>
                            <span id="errorApellidos" class="text-danger"></span>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="pass" class="form-label">Password:</label>
                        <input type="text" name="pass" id="pass" class="form-control"
                            value="<?php echo isset($obj) ? htmlspecialchars($obj->clave) : ''; ?>" required>
                            <span id="errorPass" class="text-danger"></span>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="fecha" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" id="fecha" name="fecha" class="form-control"
                            value="<?php echo isset($obj) ? $obj->fecha : ''; ?>" required>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="pais" class="form-label">País:</label>
                        <input type="text" name="pais" id="pais" class="form-control"
                            value="<?php echo isset($obj) ? htmlspecialchars($obj->pais) : ''; ?>"
                            placeholder="Insertar país" required>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="codigo_postal" class="form-label">Código Postal:</label>
                        <input type="number" name="codigo_postal" id="codigo_postal" class="form-control"
                            value="<?php echo isset($obj) ? htmlspecialchars($obj->codigo_postal) : ''; ?>"
                            placeholder="Insertar Código Postal" required>
                            <span id="errorCP" class="text-danger"></span>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control"
                            value="<?php echo isset($obj) ? htmlspecialchars($obj->telefono) : ''; ?>"
                            placeholder="Insertar teléfono" required>
                            <span id="errorTelf" class="text-danger"></span>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="<?php echo isset($obj) ? htmlspecialchars($obj->correo) : ''; ?>"
                            placeholder="example@example.com" required>
                            <span id="errorEmail" class="text-danger"></span>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="img" class="form-label">Imagen:</label>
                        <input type="file" name="img" id="img" class="form-control" required>
                    </div>

                    <?php else: ?>
                    <!-- FORMULARIO PARA PELÍCULAS Y SERIES -->
                    <div class="mb-3 text-center">
                        <label for="genero" class="form-label">Género:</label>
                        <select name="genero" id="genero" class="form-select">
                            <?php
                                $generos = ["Comedia", "Acción", "Fantasía", "Drama", "Infantil", "Terror"];
                                foreach ($generos as $genero) {
                                    echo "<option value='$genero' " . (isset($obj) && trim($obj->genero) == $genero ? 'selected' : '') . ">$genero</option>";
                                }
                                ?>
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="sinopsis" class="form-label">Sinopsis:</label>
                        <textarea name="sinopsis" id="sinopsis" class="form-control" required
                            rows="4"><?php echo isset($obj) ? htmlspecialchars($obj->sinopsis) : ''; ?></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="reparto" class="form-label">Reparto:</label>
                        <textarea name="reparto" id="reparto" class="form-control" required
                            rows="4"><?php echo isset($obj) ? htmlspecialchars($obj->reparto) : ''; ?></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="nota" class="form-label">Nota:</label>
                        <select name="nota" id="nota" class="form-select">
                            <?php
                                $notas = [1,2,3,4,5,6,7,8,9,10];
                                foreach ($notas as $nota) {
                                    echo "<option value='$nota' " . (isset($obj) && trim($obj->nota) == $nota ? 'selected' : '') . ">$nota</option>";
                                }
                                ?>
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="fecha" class="form-label">Fecha de lanzamiento:</label>
                        <input type="date" name="fecha" id="fecha" class="form-control"
                            value="<?php echo isset($obj) ? $obj->fecha : ''; ?>" required>
                    </div>
                    <div class="mb-3 text-center">
                        <label for="img" class="form-label">Imagen:</label>
                        <input type="file" name="img" id="img" class="form-control" required>
                        <input type="hidden" name="imagen_actual"
                            value="<?php echo isset($obj) ? $obj->imagen : ''; ?>">

                    </div>
                    <div class="mb-3 text-center">
                        <label for="video" class="form-label">Video:</label>
                        <input type="file" id="video" name="video" class="form-control" required>
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
    <script src="./js/editar.js" type="text/javascript"></script>
</body>

</html>