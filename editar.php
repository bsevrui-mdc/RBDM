<?php
require('funciones.php');
include("includes/a_config.php");

date_default_timezone_set("Europe/Madrid");

if ($_SESSION['usuario']->tipo != "admin") {
    header("Location: index.php");
    exit();
}

if (isset($_POST['editar'])) {
    $obj = obtenerUno($_POST['id'], $_POST['tipo']);
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
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo isset($obj) ? htmlspecialchars($obj->nombre) : ''; ?>" placeholder="Nombre de la película" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo:</label>
                        <select name="tipo" class="form-select">
                            <option value="Pelicula" <?php echo isset($obj) && $obj->tipo == 'Pelicula' ? 'selected':''; ?>>Pelicula</option>
                            <option value="Serie" <?php echo isset($obj) && $obj->tipo == 'Serie' ? 'selected':''; ?>>Serie</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Género:</label>
                        <select name="genero" class="form-select">
                            <?php
                            $generos = ["Comedia", "Accion", "Fantasia", "Drama", "Infantil", "Terror"];
                            foreach ($generos as $genero) {
                                echo "<option value='$genero' ". (isset($obj) && trim($obj->genero) == $genero ? 'selected' : '') .">$genero</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sinopsis:</label>
                        <textarea name="sinopsis" class="form-control" rows="4"><?php echo isset($obj) ? htmlspecialchars($obj->sinopsis) : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen (URL):</label>
                        <input type="text" name="imagen" class="form-control" value="<?php echo isset($obj) ? htmlspecialchars($obj->imagen) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Video (URL):</label>
                        <input type="text" name="video" class="form-control" value="<?php echo isset($obj) ? htmlspecialchars($obj->video) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reparto:</label>
                        <textarea name="reparto" class="form-control" rows="4"><?php echo isset($obj) ? htmlspecialchars($obj->reparto) : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de lanzamiento:</label>
                        <input type="date" name="fecha" class="form-control" value="<?php echo isset($obj) ? $obj->fecha : ''; ?>" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="update"><?php echo isset($obj) ? 'Actualizar' : 'Añadir'; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>
</html>
