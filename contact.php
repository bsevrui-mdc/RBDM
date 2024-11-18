<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("includes/head-tags.php"); ?>
    </head>
    <body>
        <?php include("includes/navbar.php"); ?>
        <main class="container-fluid contact">
            <div class="row my-4">
                <div id="enlacesContacto" class="col-12 col-lg-6 content">
                    <div class="row mx-2">
                        <div class="col-12">
                            <h3 class="text-center my-lg-4">Encuéntranos en Redes Sociales</h3>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center py-3 rrss">
                            <img src="/assets/icons/tiktok.svg" class="icon" alt="TikTok_logo">
                            <a class="text-decoration-none" href="">@rbdm_gcm_TT</a>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center py-3 rrss">
                            <img src="/assets/icons/instagram.svg" class="icon" alt="instagram_logo">
                            <a class="text-decoration-none" href="">@rbdm_gcm_IG</a>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center py-3 rrss">
                            <img src="/assets/icons/twitter-x.svg" class="icon" alt="x_logo">
                            <a class="text-decoration-none" href="">@rbdm_gcm_X</a>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center py-3 rrss">
                            <img src="/assets/icons/facebook.svg" class="icon" alt="facebook_logo">
                            <a class="text-decoration-none" href="">@rbdm_gcm_F</a>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-center py-3 rrss">
                            <img src="/assets/icons/youtube.svg" class="icon" alt="youtube_logo">
                            <a class="text-decoration-none" href="">@rbdm_gcm_YT</a>
                        </div>
                    </div>
                </div>
                <div id="formularioContacto" class="col-12 col-lg-6 mt-5 mt-lg-0 content">
                    <div class="row mx-2">
                        <div class="col-12">
                            <h3 class="text-center mt-lg-4">¿Necesitas contacto más directo?</h3>
                            <h3 class="text-center mb-lg-3">Mándanos un Email</h3>
                        </div>
                        <div class="col-12">
                            <form action="" method="POST" class="px-lg-4">
                                <div class="mb-3 text-center">
                                    <label class="form-label">Correo Electrónico:</label>
                                    <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" id="">
                                </div>
                                <div class="mb-3 text-center">
                                    <label class="form-label">Tu Mensaje:</label>
                                    <textarea class="form-control" placeholder="Tu mensaje aquí"></textarea>
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include "includes/footer.php" ?>
    </body>
</html>