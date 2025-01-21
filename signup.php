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
                    <form action="" method="POST" enctype="multipart/form-data" class="px-3 px-lg-5">
                        <div class="mb-3 text-center">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Contraseña:</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Repetir Contraseña:</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Nombre:</label>
                            <input type="text" class="form-control" placeholder="Pep">
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
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>