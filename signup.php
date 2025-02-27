<?php
    require("funciones.php");
    include("includes/a_config.php");

    date_default_timezone_set("Europe/Madrid");

    if (isset($_SESSION['usuario'])) {
        header("Location: usuario.php");
    }

    $errorCaptcha = false;
    $errorCarga = false;
    $error = false;

    $paises = ["Argentina", "Brasil", "Chile", "México", "Colombia", "España", "Francia", "Italia", "Reino Unido", "Alemania", "Canadá", "Estados Unidos", "Japón", "Australia", "India", "China", "Sudáfrica", "Rusia", "Egipto", "Perú", "Pakistán"];

    if (isset($_POST['signup'])) {
        if ($_POST['captcha'] != $_COOKIE['captchaString']) {
            $errorCaptcha = true;
        } else {
            setcookie("captchaString", "", time()-3600, '/');
            if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']) || $_POST['password'] != $_POST['password2'] || empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['fecha']) || empty($_POST['pais']) || empty($_POST['cp']) || empty($_POST['telf']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
                $errorCarga = true;
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
                <h1 class="text-center mt-3" tabindex="0">Registro</h1>
                <?php
                        if ($errorCaptcha) {
                            ?>
                <p class="error" role="alert">El CAPTCHA introducido no era correcto</p>
                <?php
                        }
                        if ($errorCarga) {
                            ?>
                <span class="error" role="alert">Error al cargar la información :(</span>
                <?php
                        }
                        if ($error) {
                            ?>
                <span class="error" role="alert">Correo duplicado, si el error persiste intentelo más tarde</span>
                <?php
                        }
                    ?>
                <form action="signup.php" method="POST" enctype="multipart/form-data" class="px-3 px-lg-5">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" aria-label="Correo Electrónico" id="email" name="email" class="form-control"
                            value="<?php if (isset($_POST['email']) && !empty($_POST['email']) && !$errorCarga) { echo $_POST['email']; } ?>"
                            required>
                        <span id="errorEmail" role="alert" class="noError">El correo debe de seguir el siguiente formato
                            ejemplo@ejemplo.com, además no se admiten acentos ni carácteres especiales (esto debido a su
                            carácter internacional)</span>
                    </div>
                    <div class="mb-3 row g-3">
                        <div class="col">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" aria-label="Contraseña" id="password" name="password"
                                class="form-control"
                                value="<?php if (isset($_POST['password']) && !empty($_POST['password']) && !$errorCarga) { echo $_POST['password']; } ?>"
                                required>
                            <span id="errorPass" role="alert" class="noError">El contraseña debe superar los 8
                                carácteres y contener
                                mayúsuculas, mínusculas, números y alfanuméricos</span>
                        </div>
                        <div class="col">
                            <label for="password2" class="form-label">Repetir Contraseña:</label>
                            <input type="password" aria-label="escribir contraseña nuevamente" id="password2"
                                name="password2" class="form-control"
                                value="<?php if (isset($_POST['password2']) && !empty($_POST['password2']) && !$errorCarga) { echo $_POST['password2']; } ?>"
                                required>
                            <span id="errorPass2" role="alert" class="noError">Las contraseñas deben de coincidir</span>
                        </div>
                    </div>
                    <div class="mb-3 row g-3">
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" aria-label="Nombre" id="nombre" name="nombre" class="form-control"
                                value="<?php if (isset($_POST['nombre']) && !empty($_POST['nombre']) && !$errorCarga) { echo $_POST['nombre']; } ?>"
                                required>
                            <span id="errorNombre" role="alert" class="noError">El nombre solo puede estar compuesto por
                                letras y
                                espacios</span>
                        </div>
                        <div class="col">
                            <label for="apellidos" class="form-label">Apellidos:</label>
                            <input type="text" aria-label="Apellidos" id="apellidos" name="apellidos"
                                class="form-control"
                                value="<?php if (isset($_POST['apellidos']) && !empty($_POST['apellidos']) && !$errorCarga) { echo $_POST['apellidos']; } ?>"
                                required>
                            <span id="errorApellidos" role="alert" class="noError">Los apellidos solo pueden estar
                                compuestos por
                                letras y espacios</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" aria-label="Fecha de nacimiento" name="fecha" id="fecha" class="form-control"
                            value="<?php if (isset($_POST['fecha']) && !empty($_POST['fecha']) && !$errorCarga) { echo $_POST['fecha']; } ?>"
                            required>
                    </div>
                    <div class="mb-3 row g-3">
                        <div class="col">
                            <label for="pais" class="form-label">País:</label>
                            <select id="pais" name="pais" class="form-select" aria-label="Select para el pais" required>
                                <?php
                                    foreach($paises as $pais) {
                                        echo "<option value='".$pais."'";
                                        if (isset($_POST['pais']) && !empty($_POST['pais']) && !$errorCarga && $_POST['pais'] == $pais) {
                                            echo " selected";
                                        }
                                        echo ">".$pais."</option>";
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="cp" class="form-label">Código Postal:</label>
                            <input type="text" aria-label="Codigo Postal" id="cp" name="cp" class="form-control"
                                value="<?php if (isset($_POST['cp']) && !empty($_POST['cp']) && !$errorCarga) { echo $_POST['cp']; } ?>"
                                required>
                            <span id="errorCP" role="alert" class="noError">El Código Postal solo acepta carácteres
                                alfanuméricos,
                                excluyendo acentos y carácteres especiales (esto debido a su carácter
                                internacional)</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telf" class="form-label">Teléfono:</label>
                        <input type="text" aria-label="Telefono" id="telf" name="telf" class="form-control"
                            value="<?php if (isset($_POST['telf']) && !empty($_POST['telf']) && !$errorCarga) { echo $_POST['telf']; } ?>"
                            required>
                        <span id="errorTelf" role="alert" class="noError">El teléfono debe de comenzar por 6, 7, 8 ó 9 y
                            tener un
                            máximo de 9 digitos</span>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Foto de Perfil:</label>
                        <input type="file" aria-label="Foto de perfil" id="img" name="img" class="form-control"
                            required>
                    </div>
                    <div class="mb-3 text-center">
                        <img id="captchaImage" src="./includes/captcha.php" alt="CAPTCHA" class="mb-3">
                        <i id="refreshCaptcha" class="fas fa-redo" aria-label="Recargar Captcha"></i>
                        <label for="captcha" class="visually-hidden">Captcha:</label>
                        <input type="text" aria-label="captcha de verificacion" id="captcha" name="captcha"
                            class="form-control">
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