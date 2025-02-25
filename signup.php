<?php
    require("funciones.php");
    include("includes/a_config.php");

    date_default_timezone_set("Europe/Madrid");

    if (isset($_SESSION['usuario'])) {
        header("Location: usuario.php");
    }

    $pattern1 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,6}$/'; // Email
    $pattern2 = '/^[a-zA-Z\s]+$/'; // Nombre, Apellidos, Pais
    $pattern3 = '/^[a-zA-Z0-9]*$/'; // CP
    $pattern4 = '/^[6-9]\d{0,8}$/'; // Telf

    $error = false;
    $errorCaptcha = false;

    $paises = ["Argentina", "Brasil", "Chile", "México", "Colombia", "España", "Francia", "Italia", "Reino Unido", "Alemania", "Canadá", "Estados Unidos", "Japón", "Australia", "India", "China", "Sudáfrica", "Rusia", "Egipto", "Perú", "Pakistán"];

    if (isset($_POST['signup'])) {
        if ($_POST['captcha'] != $_COOKIE['captchaString']) {
            $errorCaptcha = true;
        } else {
            setcookie("captchaString", "", time()-3600, '/');
            if (empty($_POST['email']) || !preg_match($pattern1, $_POST['email']) || empty($_POST['password']) || empty($_POST['password2']) || $_POST['password'] != $_POST['password2'] || empty($_POST['nombre']) || !preg_match($pattern2, $_POST['nombre']) || empty($_POST['apellidos']) || !preg_match($pattern2, $_POST['apellidos']) || empty($_POST['fecha']) || empty($_POST['pais']) || !preg_match($pattern2, $_POST['pais']) || empty($_POST['cp']) || !preg_match($pattern3, $_POST['cp']) || empty($_POST['telf']) || !preg_match($pattern4, $_POST['telf']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
                $error = true;
            } else {
                $ruta = "./assets/img/profilePictures/".time()."-".$_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
            }
    
            if (!$error) {
                if (registro($_POST['email'], $_POST['password'], $_POST['nombre'], $_POST['apellidos'], $_POST['fecha'], $_POST['pais'], $_POST['cp'], $_POST['telf'], $ruta)) {
                    header("Location: index.php");
                } else {
                    $error = true;
                }
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
                        if ($errorCaptcha) {
                            ?>
                            <p class="error">El CAPTCHA introducido no era correcto</p>
                            <?php
                        }
                        if ($error) {
                            ?>
                            <span class="error">Algo ha salido mal :(</span>
                            <?php
                        }
                    ?>
                    <form action="signup.php" method="POST" enctype="multipart/form-data" class="px-3 px-lg-5">
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php if (isset($_POST['email']) && !empty($_POST['email']) && !$error) { echo $_POST['email']; } ?>" required>
                            <span id="errorEmail" class="noError">El correo debe de seguir el siguiente formato ejemplo@ejemplo.com</span>
                        </div>
                        <div class="mb-3 row g-3">
                            <div class="col">
                                <label class="form-label">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control" value="<?php if (isset($_POST['password']) && !empty($_POST['password']) && !$error) { echo $_POST['password']; } ?>" required>
                                <span id="errorPass" class="noError">El contraseña debe superar los 8 carácteres y contener mayúsuculas, mínusculas, números y alfanuméricos</span>
                            </div>
                            <div class="col">
                                <label class="form-label">Repetir Contraseña:</label>
                                <input type="password" id="password2" name="password2" class="form-control" value="<?php if (isset($_POST['password2']) && !empty($_POST['password2']) && !$error) { echo $_POST['password2']; } ?>" required>
                                <span id="errorPass2" class="noError">Las contraseñas deben de coincidir</span>
                            </div>
                        </div>
                        <div class="mb-3 row g-3">
                            <div class="col">
                                <label class="form-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php if (isset($_POST['nombre']) && !empty($_POST['nombre']) && !$error) { echo $_POST['nombre']; } ?>" required>
                                <span id="errorNombre" class="noError">El nombre solo puede estar compuesto por letras y espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
                            </div>
                            <div class="col">
                                <label class="form-label">Apellidos:</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php if (isset($_POST['apellidos']) && !empty($_POST['apellidos']) && !$error) { echo $_POST['apellidos']; } ?>" required>
                                <span id="errorApellidos" class="noError">Los apellidos solo pueden estar compuestos por letras y espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" name="fecha" class="form-control" value="<?php if (isset($_POST['fecha']) && !empty($_POST['fecha']) && !$error) { echo $_POST['fecha']; } ?>" required>
                        </div>
                        <div class="mb-3 row g-3">
                            <div class="col">
                                <label for="pais" class="form-label">País:</label>
                                <select id="pais" name="pais" class="form-select" aria-label="Select para el pais" required>
                                    <?php
                                    foreach($paises as $pais) {
                                        echo "<option value='".$pais."'>".$pais."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Código Postal:</label>
                                <input type="text" id="cp" name="cp" class="form-control" value="<?php if (isset($_POST['cp']) && !empty($_POST['cp']) && !$error) { echo $_POST['cp']; } ?>" required>
                                <span id="errorCP" class="noError">El Código Postal solo acepta carácteres alfanuméricos (no se admiten acentos, tampoco ñ/ç/similares)</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono:</label>
                            <input type="text" id="telf" name="telf" class="form-control" value="<?php if (isset($_POST['telf']) && !empty($_POST['telf']) && !$error) { echo $_POST['telf']; } ?>" required>
                            <span id="errorTelf" class="noError">El teléfono debe de comenzar por 6, 7, 8 ó 9 y tener un máximo de 9 digitos</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto de Perfil:</label>
                            <input type="file" name="img" class="form-control" required>
                        </div>
                        <div class="mb-3 text-center">
                            <img id="captchaImage" src="./includes/captcha.php" alt="CAPTCHA" class="mb-3">
                            <i id="refreshCaptcha" class="fas fa-redo"></i>
                            <input type="text" id="captcha" name="captcha" class="form-control">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" name="signup" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
        <script src="./js/signup.js" type="text/javascript"></script>
        <script src="./js/captcha.js"></script>
    </body>
</html>