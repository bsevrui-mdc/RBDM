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
            <div id="enlacesContacto" class="mt-3 col-lg-6">
                <div class="my-2 content">
                    <h3 class="text-center pt-lg-4">Encuéntranos en Redes Sociales</h3>
                    <div class="py-3 d-flex justify-content-center">
                        <a class="text-decoration-none enlaces" href="https://www.tiktok.com/"
                            aria-label="Ir a Tiktok"><i class="mx-4 fa-brands fa-tiktok fa-3x"></i>@rbdm_gcm_TT</a>
                    </div>
                    <div class="py-3 d-flex justify-content-center">
                        <a class="text-decoration-none enlaces" href="https://www.instagram.com/"
                            aria-label="Ir a Instagram">
                            <i class="mx-4 fa-brands fa-instagram fa-3x"></i>@rbdm_gcm_IG</a>
                    </div>
                    <div class="py-3 d-flex justify-content-center">
                        <a class="text-decoration-none enlaces" href="https://x.com/" aria-label="Ir a Twitter"><i
                                class="mx-4 fa-brands fa-x-twitter fa-3x"></i>@rbdm_gcm_X</a>
                    </div>
                    <div class="py-3 d-flex justify-content-center">
                        <a class="text-decoration-none enlaces" href="https://www.facebook.com/"
                            aria-label="Ir a Facebook"><i class="mx-4 fa-brands fa-facebook fa-3x"></i>@rbdm_gcm_F</a>
                    </div>
                    <div class="py-3 d-flex justify-content-center">
                        <a class="text-decoration-none enlaces" href="https://www.youtube.com/"
                            aria-label="Ir a YouTube"><i class="mx-4 fa-brands fa-youtube fa-3x"></i>@rbdm_gcm_YT</a>
                    </div>
                </div>
            </div>
            <div id="formularioContacto" class="mt-3 col-lg-6">
                <div class="my-2 content">
                    <h3 class="text-center pt-lg-4">¿Necesitas contacto más directo?</h3>
                    <h3 class="text-center pb-lg-3">Mándanos un Email</h3>
                    <form action="" method="POST" class="px-lg-4">
                        <div class="pb-3 text-center">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" placeholder="ejemplo@ejemplo.com" id="email">
                        </div>
                        <div class="pb-3 text-center">
                            <label for="mensaje" class="form-label">Tu Mensaje:</label>
                            <textarea class="form-control" placeholder="Tu mensaje aquí" id="mensaje"></textarea>
                        </div>
                        <div class="pb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mb-2 col">
                <div class="my-3 content">
                    <h3 class="text-center pt-lg-4">Miembros del equipo</h3>
                    <div class="py-2 d-flex justify-content-center">
                        <a class=" miembros" href="./juegoDario.html"
                            aria-label="Ir al juego de Castillo Miranda,Darío J.">
                            Castillo Miranda, Darío J.</a>
                    </div>
                    <div class="py-2 d-flex justify-content-center">
                        <a class="miembros" href="./juegoRafa.html"
                            aria-label="Ir al juego de Roldán Campos, Rafael">Roldán Campos, Rafael</a>
                    </div>
                    <div class="py-2 d-flex justify-content-center">
                        <a class=" miembros" href="./juegoMariano.html"
                            aria-label="Ir al juego de Roldán Luque, Mariano Jesús">Roldán Luque, Mariano Jesús</a>
                    </div>
                    <div class="py-2 d-flex justify-content-center">
                        <a class=" miembros" href="./juegoMemoria.html"
                            aria-label="Ir al juego de Sevilla Ruiz, Borja">Sevilla Ruiz, Borja</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "includes/footer.php" ?>
</body>

</html>