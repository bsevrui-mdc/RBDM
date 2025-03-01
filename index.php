<?php



include_once("funciones.php");
$conn = conectarConBBDD();

?>
<?php
include("includes/a_config.php");

include("includes/carrusel-normal.php");

include("includes/carrusel-multiple.php");

include("googleconnect.php");

date_default_timezone_set("Europe/Madrid");
if ((!isset($_SESSION['usuario']->fecha)) && isset($_SESSION['access_token'])) {
    include("registermodal.php");

?>
<script>
document.getElementById('id01').style.display = 'block';
</script>
<?php

}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>
    <?php include("includes/modal.php"); ?>
    <script src="./js/scripts.js"></script>
    <script src="./js/cookies.js"></script>
</head>

<body class="index">
    <?php include("includes/navbar.php"); ?>
    <main class="my-3">


        <div class="container-fluid">
            <section aria-labelledby="tituloEstrenos">
                <div class="row d-md-none d-block">
                    <div class="text-center col">
                        <h1 class="text-primary" id="tituloEstrenos">Estrenos</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <?php
                        $ultimas3Pelis = obtenerUltimosTres('contenido', 'Pelicula');
                        $ultimas3Series = obtenerUltimosTres('contenido', 'Serie');
                        renderCarruselNormal($ultimas3Pelis); ?>
                    </div>
                    <div class="col-4 d-none d-lg-block top3">
                            <ul class="d-flex flex-grow-1 flex-column h-100 topGenero justify-content-around">
                            <?php
                                foreach ($ultimas3Series as $key => $peli) {
                                ?>
                                <li role="listitem" class="list-unstyled">
                                    <article>
                                        <a href="detalles.php?peli=<?= $peli->id ?>"
                                            aria-label="Redireccion hacia los detalles de <?= $peli->nombre ?>"
                                            class="d-inline">
                                            <div class="row">

                                                <div class="col-4 align-content-center">
                                                    <img src="<?= $peli->imagen ?>" alt="Poster de la pelicula <?php echo $peli->nombre ?>"
                                                        class="img-fluid">
                                                </div>
                                                <div class="col-8 align-content-center ">
                                                    <div class="text-clamp">
                                                        <h2><?= $peli->nombre ?></h2>
                                                    </div>

                                                    <div class="genero">Género: <?= $peli->genero ?></div>
                                                </div>

                                            </div>
                                        </a>
                                    </article>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>

                    </div>
                </div>
            </section>
            <section aria-labelledby="tituloPeliculas">
                <div class="row">
                    <div class="my-4 text-center col">
                        <h1 class="text-primary" id="tituloPeliculas">Peliculas</h1>
                    </div>
                </div>
                <div class="row d-none d-lg-block">
                    <div class="col-12">
                        <?php renderCarruselMultiple(obtenerTodo('Pelicula', 'contenido')); ?>
                    </div>
                </div>
                <div class="row d-lg-none movil">
                    <?php
                    foreach ($ultimas3Pelis as $key => $peli) {
                    ?>
                    <li role="listitem" class="list-unstyled">
                        <article>
                            <a href="detalles.php?peli=<?= $peli->id ?>"
                                aria-label="Redireccion hacia los detalles de <?= $peli->nombre ?>" class="d-inline">
                                <div class="col-12">
                                    <div class="my-2 row d-flex flex-grow-1">
                                        <div class="text-center col-4">
                                            <img src="<?= $peli->imagen ?>" alt="<?php echo $peli->nombre ?>"
                                                class="img-fluid">
                                        </div>
                                        <div class="col-8 align-content-center">
                                            <div class="text-clamp">
                                                <h2><?= $peli->nombre ?>
                                                </h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </li>
                    <?php
                    }
                    ?>
                </div>

            </section>
            <section aria-labelledby="tituloSeries">
                <div class="row">
                    <div class="my-4 text-center col">
                        <h1 id="tituloSeries" class="text-primary">Series</h1>
                    </div>
                </div>
                <div class="row d-none d-lg-block">
                    <div class="col-12">
                        <?php
                        renderCarruselMultiple(obtenerTodo('Serie', 'contenido'));
                        ?>

                    </div>
                </div>

                <div class="row d-lg-none movil">
                    <?php
                    foreach ($ultimas3Series as $key => $peli) {
                    ?>
                    <li role="listitem" class="list-unstyled">
                        <article>
                            <a href="detalles.php?peli=<?= $peli->id ?>"
                                aria-label="Redireccion hacia los detalles de <?= $peli->nombre ?>" class="d-inline">
                                <div class="col-12">
                                    <div class="my-2 row d-flex flex-grow-1">
                                        <div class="text-center col-4">
                                            <img src="<?= $peli->imagen ?>" alt="Poster de la serie <?php echo $peli->nombre ?>"
                                                class="img-fluid">
                                        </div>
                                        <div class="col-8 align-content-center">
                                            <div class="text-clamp">
                                                <h2><?= $peli->nombre ?>
                                                </h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </li>
                    <?php
                    }
                    ?>
                </div>
            </section>
        </div>
        <div id="bloqueo-cookies"></div>
        <div class="aviso-cookies" id="aviso-cookies">
            <img class="galleta" src="./assets/img/cookie.svg" alt="Galleta">
            <h3 class="titulo">Cookies</h3>
            <p class="text-center parrafo">Utilizamos cookies propias y de terceros para mejorar nuestros servicios.
                Acepte las
                cookies para recibir información y novedades</p>
            <button class="btn btn-primary" id="btn-aceptar-cookies">Aceptar cookies</button>
            <button class="btn btn-primary" id="btn-rechazar-cookies">Rechazar cookies</button><br>
            <div class="mt-3"><a class="enlace" href="about.php#pcAbout">Aviso de Cookies</a></div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
    <script src="js/carrusel.js"></script>
</body>

</html>