<?php
    require("funciones.php");
    include("includes/a_config.php");

    date_default_timezone_set("Europe/Madrid");
    session_start();

    if (isset($_SESSION['usuario'])) {
        header("Location: usuario.php");
    }

    
    $pattern1 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,6}$/';
    $pattern2 = '/^[a-zA-Z\s]+$/';
    $pattern3 = '/^[a-zA-Z0-9]*$/';
    $pattern4 = '/^(?:\+34|34)?[67]\d{8}$|^(?:\+34|34)?9[1-9]\d{7}$/';
    $errorEmail = false;
    $errorContrasena = false;
    $errorNombre = false;
    $errorApellidos = false;
    $errorFecha = false;
    $errorPais = false;
    $errorCP = false;
    $errorTelf = false;
    $errorIMG = false;
    $errorRegistro = false;

    if (isset($_POST['signup'])) {
        if (empty($_POST['email']) || !preg_match($pattern1, $_POST['email'])) {
            $errorEmail = true;
        }
        if ($_POST['password'] != $_POST['password2'] || empty($_POST['password']) || empty($_POST['password2'])) {
            $errorContrasena = true;
        }
        if (empty($_POST['nombre']) || !preg_match($pattern2, $_POST['nombre'])) {
            $errorNombre = true;
        }
        if (empty($_POST['apellidos']) || !preg_match($pattern2, $_POST['apellidos'])) {
            $errorApellidos = true;
        }
        if (empty($_POST['fecha'])) {
            $errorFecha = true;
        }
        if (empty($_POST['pais']) || !preg_match($pattern2, $_POST['pais'])) {
            $errorPais = true;
        }
        if (empty($_POST['cp']) || !preg_match($pattern3, $_POST['cp'])) {
            $errorCP = true;
        }
        if (empty($_POST['telf']) || !preg_match($pattern4, $_POST['telf'])) {
            $errorTelf = true;
        }
        if (is_uploaded_file($_FILES['img']['tmp_name'])) {
            $ruta = "./assets/img/profilePictures".time()."-".$_FILES['img']['name'];
        } else {
            $errorIMG = true;
        }
        if (!$errorEmail && !$errorContrasena && !$errorNombre && !$errorApellidos && !$errorFecha && !$errorPais && !$errorCP && !$errorTelf && !$errorIMG) {
            if (registro($_POST['email'], $_POST['password'], $_POST['nombre'], $_POST['apellidos'], $_POST['fecha'], $_POST['pais'], $_POST['cp'], $_POST['telf'], $ruta)) {
                header("Location: index.php");
            } else {
                $errorRegistro = true;
            }
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
                        if ($errorRegistro) {
                            ?>
                            <p class="error">Registro no completado debido a un error</p>
                            <?php
                        }
                    ?>
                    <form action="signup.php" method="POST" enctype="multipart/form-data" class="px-3 px-lg-5">
                        <div class="mb-3 text-center">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control" placeholder="ejemplo@ejemplo.com" value="<?php if (isset($_POST['email']) && !$errorEmail) { echo $_POST['email']; } ?>" required>
                            <?php
                                if ($errorEmail) {
                                    ?>
                                    <p class="mt-3 error">El correo electrónico no es correcto o está vacío</p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Repetir Contraseña:</label>
                            <input type="password" name="password2" class="form-control" required>
                            <?php
                                if ($errorContrasena) {
                                    ?>
                                    <p class="mt-3 error">Las contraseñas no coinciden o están vacías</p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Pep" value="<?php if (isset($_POST['nombre']) && !$errorNombre) { echo $_POST['nombre']; } ?>" required>
                            <?php
                                if ($errorNombre) {
                                    ?>
                                    <p class="mt-3 error">El nombre no es correcto o está vacío</p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Apellidos:</label>
                            <input type="text" name="apellidos" class="form-control" placeholder="Sandiego" value="<?php if (isset($_POST['apellidos']) && !$errorApellidos) { echo $_POST['apellidos']; } ?>" required>
                            <?php
                                if ($errorApellidos) {
                                    ?>
                                    <p class="mt-3 error">Los apellidos no son correctos o el campo está vacío</p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" name="fecha" class="form-control" value="<?php if (isset($_POST['fecha']) && !$errorFecha) { echo $_POST['fecha']; } ?>" required>
                            <?php
                                if ($errorFecha) {
                                    ?>
                                    <p class="mt-3 error">La fecha de nacimiento está vacía</p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">País:</label>
                            <input type="text" name="pais" class="form-control" placeholder="Spain" value="<?php if (isset($_POST['pais']) && !$errorPais) { echo $_POST['pais']; } ?>" required>
                            <?php
                                if ($errorPais) {
                                    ?>
                                    <p class="mt-3 error">El País no es correcto o el campo está vacío</p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Código Postal:</label>
                            <input type="text" name="cp" class="form-control" placeholder="14900" value="<?php if (isset($_POST['cp']) && !$errorCP) { echo $_POST['cp']; } ?>" required>
                            <?php
                                if ($errorCP) {
                                    ?>
                                    <p class="mt-3 error">El Código Postal no es correcto o el campo está vacío</p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Teléfono:</label>
                            <input type="text" name="telf" class="form-control" placeholder="+34623451789 ó 623451789" value="<?php if (isset($_POST['telf']) && !$errorTelf) { echo $_POST['telf']; } ?>" required>
                            <?php
                                if ($errorTelf) {
                                    ?>
                                    <p class="mt-3 error">El Teléfono no es correcto o el campo está vacío</p>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Foto de Perfil:</label>
                            <input type="file" name="img" class="form-control" required>
                            <?php
                                if ($errorIMG) {
                                    ?>
                                    <p class="mt-3 error">Error al subir el fichero</p>
                                    <?php
                                }
                            ?>
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