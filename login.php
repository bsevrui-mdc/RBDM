<?php include("includes/a_config.php"); ?>
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
                    <h3 class="text-center py-4 pb-lg-1 pt-lg-3">Inicio de Sesión</h3>
                    <form action="" method="POST" class="px-3 px-lg-5">
                        <div class="mb-3 text-center">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" id="">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Iniciar</button>
                        </div>
                    </form>
                    <div class="text-center pb-3 pt-1">
                        <a href="" class="text-decoration-none text-center pb-3 pt-1">¿Has olvidado tu contraseña?</a>
                    </div>
                </div>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>