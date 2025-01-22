<?php
    require("funciones.php");
    include("includes/a_config.php");

    date_default_timezone_set("Europe/Madrid");
    session_start();

    if (isset($_SESSION['usuario'])) {
        header("Location: usuario.php");
    }

    $pattern1 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,6}$/'; // Email
    $pattern2 = '/^[a-zA-Z\s]+$/'; // Nombre, Apellidos, Pais
    $pattern3 = '/^[a-zA-Z0-9]*$/'; // CP
    $pattern4 = '/^(?:\+34|34)?[67]\d{8}$|^(?:\+34|34)?9[1-9]\d{7}$/'; // Telf

    if (isset($_POST['signup'])) {
        if (registro($_POST['email'], $_POST['password'], $_POST['nombre'], $_POST['apellidos'], $_POST['fecha'], $_POST['pais'], $_POST['cp'], $_POST['telf'], $ruta)) {
            header("Location: index.php");
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
                    <form action="signup.php" method="POST" enctype="multipart/form-data" class="px-3 px-lg-5">
                        <div class="mb-3 text-center">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control" placeholder="ejemplo@ejemplo.com" value="" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Repetir Contraseña:</label>
                            <input type="password" name="password2" class="form-control" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="" required>
                            <span id="errorNombre" class="noError">El nombre solo puede estar compuesto por letras y espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" value="" required>
                            <span id="errorApellidos" class="noError">Los apellidos solo pueden estar compuestos por letras y espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" name="fecha" class="form-control" value="" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">País:</label>
                            <input type="text" id="pais" name="pais" class="form-control" value="" required>
                            <span id="errorPais" class="noError">El pais solo puede estar compuesto por letras y espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Código Postal:</label>
                            <input type="text" id="cp" name="cp" class="form-control" value="" required>
                            <span id="errorCP" class="noError">El Código Postal solo acepta carácteres alfanuméricos (no se admiten acentos, tampoco ñ/ç/similares)</span>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Teléfono:</label>
                            <input type="text" name="telf" class="form-control" placeholder="+34623451789 ó 623451789" value="" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Foto de Perfil:</label>
                            <input type="file" name="img" class="form-control" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" name="signup" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="./js/signup.js" type="text/javascript"></script>
        <?php include("includes/footer.php"); ?>
    </body>
</html>