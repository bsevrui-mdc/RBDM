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
                <h1 class="pt-4 pb-2 text-center pt-lg-3 pb-lg-1" tabindex="0">Inicio de Sesión</h1>
                <?php
                    if ($errorLogin) {
                    ?>
                <p class="error" role="alert">Correo o Contraseña Incorrectos</p>
                <?php
                    }
                    ?>
                <form action="login.php" method="POST" class="px-3 px-lg-5">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" aria-label="Correo Electrónico" name="email" id="email" class="form-control"
                            value="<?php if (isset($_POST['email']) && !empty($_POST['email']) && !$errorLogin) {
                                            echo $_POST['email'];
                                        } ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" aria-label="Contraseña" name="password" id="password"
                            class="form-control" value="<?php if (isset($_POST['password']) && !empty($_POST['password']) && !$errorLogin) {
                                            echo $_POST['password'];
                                        } ?>" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="login">Iniciar</button>
                    </div>
                </form>
                <div class="mb-3 d-flex justify-content-center">
                    <?php
                        if (!isset($_SESSION['access_token'])) {
                            echo '<a href="' . $google_client->createAuthUrl() . '" aria-label="Boton de inicio de sesion con google"><button class="btn btn-light" tabindex="-1"><i class="fa-brands fa-google me-2 googlebtn"></i>Continuar con Google</button></a>';
                        }
                        ?>
                </div>
                <div class="pb-3 text-center">
                    <a href="signup.php" aria-label="Ir a Registrarte">¿No tienes una cuenta? Registrate</a>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>