<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("includes/head-tags.php"); ?>
    </head>
    <body>
        <?php include("includes/navbar.php"); ?>
        <main class="container-fluid login">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 content">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center">Inicio de Sesión</h3>
                        </div>
                        <div class="col-12">
                            <form action="" method="POST" class="">
                                <div class="mb-3">
                                    <label class="form-label">Correo Electrónico/Nombre de usuario:</label>
                                    <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" id="">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control" id="">
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                            <a href="" class="text-decoration-none text-center">¿Has olvidado tu contraseña?</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>