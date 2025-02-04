<?php
    require('funciones.php');
    include("includes/a_config.php");

    date_default_timezone_set("Europe/Madrid");
    if (isset($_SESSION['usuario'])) {
        header("Location: index.php");
    }

    $errorLogin = false;
    $errorCaptcha = false;

    if (isset($_POST['login'])) {
        if ($_POST['captcha'] != $_COOKIE['captchaString']) {
            $errorCaptcha = true;
        } else {
            setcookie("captchaString", $captchaString, time()-3600, '/');
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $errorLogin = true;
            } else {
                if (iniciarSesion($_POST['email'], $_POST['password'])) {
                    header("Location: index.php");
                } else {
                    $errorLogin = true;
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
    <body class="login">
        <?php include("includes/navbar.php"); ?>
        <main class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 my-lg-4 content">
                    <h1 class="pt-4 pb-2 text-center pt-lg-3 pb-lg-1">Inicio de Sesión</h1>
                    <?php
                        if ($errorCaptcha) {
                            ?>
                            <p class="error">El CAPTCHA introducido no era correcto</p>
                            <?php
                        }
                        if ($errorLogin) {
                            ?>
                            <p class="error">Correo o Contraseña Incorrectos</p>
                            <?php
                        }
                    ?>
                    <form action="login.php" method="POST" class="px-3 px-lg-5">
                        <div class="mb-3 text-center">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control" placeholder="ejemplo@ejemplo.com" value="<?php if (isset($_POST['email']) && !empty($_POST['email']) && !$errorLogin) { echo $_POST['email']; } ?>" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" name="password" class="form-control" value="<?php if (isset($_POST['password']) && !empty($_POST['password']) && !$errorLogin) { echo $_POST['password']; } ?>" required>
                        </div>
                        <div class="mb-3 text-center">
                            <img id="captchaImage" src="./includes/captcha.php" alt="CAPTCHA" class="mb-3">
                            <i id="refreshCaptcha" class="fas fa-redo"></i>
                            <input type="text" id="captcha" name="captcha" class="form-control">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" name="login">Iniciar</button>
                        </div>
                    </form>
                    <div class="mb-3 d-flex justify-content-center">
                        <?php
                        if (!isset($_SESSION['access_token'])) {
                            echo '<a href="'.$google_client->createAuthUrl().'"><button class="btn btn-light"><i class="fa-brands fa-google me-2 googlebtn"></i>Continuar con Google</button></a>';
                        }
                        ?>
                    </div>
                    <div class="pt-1 text-center">
                        <a href="" class="pt-1 text-decoration-none">¿Has olvidado tu contraseña?</a>
                    </div>
                    <div class="pb-3 text-center">
                        <a href="signup.php" class="text-decoration-none">¿No tienes una cuenta? Registrate</a>
                    </div>
                </div>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
        <script src="./js/captcha.js"></script>
    </body>
</html>