<?php include("includes/a_config.php"); ?>
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
                    <form action="" method="POST" class="px-3 px-lg-5">
                        <div class="mb-3 text-center">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Nombre de usuario:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Repetir Contraseña:</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>