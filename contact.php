<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("includes/head-tags.php"); ?>
    </head>
    <body>
        <?php include("includes/navbar.php"); ?>
        <main class="container-fluid contact">
            <div class="row">
                <div id="enlacesContacto" class="col-lg-6 mt-3">
                    <div class="my-3 content">
                        <h3 class="text-center pt-lg-4">Encuéntranos en Redes Sociales</h3>
                        <div class="d-flex justify-content-center py-3">
                            <a class="text-decoration-none enlaces" href=""><i class="fa-brands fa-tiktok fa-3x mx-4"></i>@rbdm_gcm_TT</a>
                        </div>
                        <div class="d-flex justify-content-center py-3">
                            <a class="text-decoration-none enlaces" href=""><i class="fa-brands fa-instagram fa-3x mx-4"></i>@rbdm_gcm_IG</a>
                        </div>
                        <div class="d-flex justify-content-center py-3">
                            <a class="text-decoration-none enlaces" href=""><i class="fa-brands fa-x-twitter fa-3x mx-4"></i>@rbdm_gcm_X</a>
                        </div>
                        <div class="d-flex justify-content-center py-3">
                            <a class="text-decoration-none enlaces" href=""><i class="fa-brands fa-facebook fa-3x mx-4"></i>@rbdm_gcm_F</a>
                        </div>
                        <div class="d-flex justify-content-center py-3">
                            <a class="text-decoration-none enlaces" href=""><i class="fa-brands fa-youtube fa-3x mx-4"></i>@rbdm_gcm_YT</a>
                        </div>
                    </div>
                </div>
                <div id="formularioContacto" class="col-lg-6 mt-3">
                    <div class="my-3 content">
                        <h3 class="text-center pt-lg-4">¿Necesitas contacto más directo?</h3>
                        <h3 class="text-center pb-lg-3">Mándanos un Email</h3>
                        <form action="" method="POST" class="px-lg-4">
                            <div class="pb-3 text-center">
                                <label class="form-label">Correo Electrónico:</label>
                                <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" id="">
                            </div>
                            <div class="pb-3 text-center">
                                <label class="form-label">Tu Mensaje:</label>
                                <textarea class="form-control" placeholder="Tu mensaje aquí"></textarea>
                            </div>
                            <div class="pb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="my-3 content">
                        <h3 class="text-center pt-lg-4">Miembros del equipo</h3>
                        <div class="d-flex justify-content-center py-2">
                            <a class="text-decoration-none miembros" href="">Castillo Miranda, Darío J.</a>
                        </div>
                        <div class="d-flex justify-content-center py-2">
                            <a class="text-decoration-none miembros" href="./juegoRafa.html">Roldán Campos, Rafael</a>
                        </div>
                        <div class="d-flex justify-content-center py-2">
                            <a class="text-decoration-none miembros" href="">Roldán Luque, Mariano Jesús</a>
                        </div>
                        <div class="d-flex justify-content-center py-2">
                            <a class="text-decoration-none miembros" href="./juegoMemoria.html">Sevilla Ruiz, Borja</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include "includes/footer.php" ?>
    </body>
</html>