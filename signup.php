<?php
    include("includes/a_config.php");

    date_default_timezone_set("Europe/Madrid");
    session_start();

    if (isset($_SESSION['usuario'])) {
        header("Location: usuario.php");
    }

    $errorEmail = false;
    $patternEmail = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,6}$/';
    $errorContrasena = false;
    $errorNombre = false;
    $patternNombre = '/^[a-zA-Z\s]+$/';
    $errorRegistro = false;

    if (isset($_POST['signup'])) {
        if (empty($_POST['email']) || !preg_match($patternEmail, $_POST['email'])) {
            $errorEmail = true;
        }
        if ($_POST['password'] != $_POST['password2'] || empty($_POST['password']) || empty($_POST['password2'])) {
            $errorContrasena = true;
        }
        if (empty($_POST['nombre']) || !preg_match($patternNombre, $_POST['nombre'])) {
            $errorNombre = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("includes/head-tags.php"); ?>
    </head>
    <body>
        <?php include("includes/navbar.php"); ?>
        <main class="container-fluid signup">
            <div class="row justify-content-center">
                <div class="col-lg-6 my-lg-4 content">
                    <h1 class="text-center mt-3">Registro</h1>
                    <?php
                        if ($errorEmail) {
                            ?>
                            <p class="error">El correo electrónico no es correcto o está vacío</p>
                            <?php
                        }
                        if ($errorContrasena) {
                            ?>
                            <p class="error">Las contraseñas no coinciden o están vacías</p>
                            <?php
                        }
                        if ($errorNombre) {
                            ?>
                            <p class="error">El nombre no es correcto o está vacío</p>
                            <?php
                        }
                        if ($errorRegistro) {
                            ?>
                            <p class="error">Registro no completado debido a un error</p>
                            <?php
                        }
                    ?>
                    <form action="signup.php" method="POST" enctype="multipart/form-data" class="px-3 px-lg-5">
                        <div class="mb-3 text-center">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control" placeholder="ejemplo@ejemplo.com" value="<?php if (isset($_POST['email']) && !$errorEmail) { echo $_POST['email']; } ?>">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Repetir Contraseña:</label>
                            <input type="password" name="password2" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Pep" value="<?php if (isset($_POST['nombre']) && !$errorNombre) { echo $_POST['nombre']; } ?>">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" placeholder="Sandiego">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">País:</label>
                            <input type="text" class="form-control" placeholder="España">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Código Postal:</label>
                            <input type="text" class="form-control" placeholder="14900">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Teléfono:</label>
                            <input type="text" class="form-control" placeholder="+34 666 666 666">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Foto de Perfil:</label>
                            <input type="file" class="form-control">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" name="signup" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>