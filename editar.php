<?php
require('funciones.php');
include("includes/a_config.php");

date_default_timezone_set("Europe/Madrid");

// Verificar si el usuario es admin
if ($_SESSION['usuario']->tipo != "admin") {
    header("Location: index.php");
    exit();
}
if(isset($_POST['borrar'])) {
    var_dump($_POST['idD'],$_POST['tipoD']);
    
    header('Location:admin.php');
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
    //var_dump($_POST);
    //var_dump($_FILES);
    //exit();
    if(is_uploaded_file($_FILES['img']['tmp_name'])){
        $ruta = "./assets/img/profilePictures/".time()."-".$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $ruta);

        insertarUsuario($_POST['email'],$_POST['pass'],$_POST['nombre'],$_POST['apellidos'],$_POST['tipo'],$_POST['fecha'],$_POST['pais'],$_POST['codigo_postal'],$_POST['telefono'],$ruta);
        header('Location: admin.php');
    }else{
        echo 'error';
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
                    <div class="mb-3">
                        <label class="form-label">Tipo:</label>
                        <select name="tipo" class="form-select" onchange="this.form.submit()">
                            <?php if($tipoSeleccionado=='cliente'||$tipoSeleccionado=='admin'): ?>
                            <option value="cliente" <?php echo ($tipoSeleccionado == 'cliente') ? 'selected' : ''; ?>>Usuario</option>
                            <option value="admin" <?php echo ($tipoSeleccionado == 'admin') ? 'selected' : ''; ?>>Administrador</option>
                            <?php else: ?>
                            <option value="Pelicula" <?php echo ($tipoSeleccionado == 'Pelicula') ? 'selected' : ''; ?>>Película</option>
                            <option value="Serie" <?php echo ($tipoSeleccionado == 'Serie') ? 'selected' : ''; ?>>Serie</option>
                            <?php endif; ?>
                        </select>
                    </div>
                
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control"
                               value="<?php echo isset($obj) ? htmlspecialchars($obj->nombre) : ''; ?>"
                               placeholder="Insertar nombre" required>
                    </div>

                    <?php if ($tipoSeleccionado == 'cliente' || $tipoSeleccionado == 'admin'): ?>
                        <!-- FORMULARIO PARA USUARIOS -->
                        <div class="mb-3">
                            <label class="form-label">Apellidos:</label>
                            <input type="text" name="apellidos" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->apellidos) : ''; ?>"
                                   placeholder="Insertar apellidos" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="text" name="pass" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->clave) : ''; ?>"
                                    required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha de nacimiento:</label>
                            <input type="date" name="fecha" class="form-control"
                                   value="<?php echo isset($obj) ? $obj->fecha : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">País:</label>
                            <input type="text" name="pais" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->pais) : ''; ?>"
                                   placeholder="Insertar país" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Código Postal:</label>
                            <input type="number" name="codigo_postal" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->codigo_postal) : ''; ?>"
                                   placeholder="Insertar Código Postal" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono:</label>
                            <input type="text" name="telefono" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->telefono) : ''; ?>"
                                   placeholder="Insertar teléfono" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?php echo isset($obj) ? htmlspecialchars($obj->correo) : ''; ?>"
                                   placeholder="example@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen:</label>
                            <input type="file" name="img" class="form-control">
                        </div>

                    <?php else: ?>
                        <!-- FORMULARIO PARA PELÍCULAS Y SERIES -->
                        <div class="mb-3">
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
                        <div class="mb-3">
                            <label class="form-label">Sinopsis:</label>
                            <textarea name="sinopsis" class="form-control" rows="4"><?php echo isset($obj) ? htmlspecialchars($obj->sinopsis) : ''; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Reparto:</label>
                            <textarea name="reparto" class="form-control" rows="4"><?php echo isset($obj) ? htmlspecialchars($obj->reparto) : ''; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha de lanzamiento:</label>
                            <input type="date" name="fecha_lanzamiento" class="form-control"
                                   value="<?php echo isset($obj) ? $obj->fecha : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen:</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Video:</label>
                            <input type="file" name="video" class="form-control">
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary" 
                        name="<?php echo isset($obj) ? 'update' : 'insert'; ?>">
                        <?php echo isset($obj) ? 'Actualizar' : 'Añadir'; ?>
                    </button>
                </form>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="./js/signup.js" type="text/javascript"></script>
</body>
</html>
