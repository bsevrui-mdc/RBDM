<?php



include_once("funciones.php");
$conn = conectarConBBDD();

try {
    $peliculas = $conn->query("select * from contenido where tipo='Pelicula' order by fecha desc limit 3");
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

try {
    $series = $conn->query("select * from contenido where tipo='Serie' order by fecha desc limit 3");
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

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
            <div class="row d-md-none d-block">
                <div class="text-center col">
                    <h1 class="text-primary">Estrenos</h1>
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
                    <div class="d-flex flex-grow-1 flex-column h-100 topGenero justify-content-around">
                        <?php
                        foreach ($ultimas3Series as $key => $peli) {
                        ?>
                        <a href="detalles.php?peli=<?= $peli->id ?>" class="d-inline">
                            <div class="row">

                                <div class="col-4 align-content-center">
                                    <img src="<?= $peli->imagen ?>" class="img-fluid">
                                </div>
                                <div class="col-8 align-content-center ">
                                    <div class="text-clamp">
                                        <h2><?= $peli->nombre ?></h2>
                                    </div>

                                    <div class="genero">Género: <?= $peli->genero ?></div>
                                </div>

                            </div>
                        </a>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="my-4 text-center col">
                    <h1 class="text-primary">Peliculas</h1>
                </div>
            </div>

            <div class="row d-none d-lg-block">
                <div class="col-12">
                    <?php renderCarruselMultiple(obtenerTodo('Pelicula', 'contenido')); ?>
                </div>
            </div>

            <div class="row d-lg-none movil">
                <div class="col-12">
                    <div class="my-2 row d-flex flex-grow-1">
                        <div class="text-center col-4">
                            <img src="assets/img/peliculas/avatar.jpg" class="img-fluid">
                        </div>
                        <div class="col-8 align-content-center">
                            <div class="text-clamp">
                                <h2>Avatar
                                </h2>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="my-2 row d-flex flex-grow-1">
                        <div class="text-center col-4">
                            <img src="assets/img/peliculas/coco.jpg" class="img-fluid">
                        </div>
                        <div class="col-8 align-content-center">
                            <div class="text-clamp">
                                <h2>Coco
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="my-2 row d-flex flex-grow-1">
                        <div class="text-center col-4">
                            <img src="assets/img/peliculas/ironman.jpg" class="img-fluid">
                        </div>
                        <div class="col-8 align-content-center">
                            <div class="text-clamp">
                                <h2>Iron Man
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="my-4 text-center col">
                    <h1 class="text-primary">Series</h1>
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
                <div class="col-12">
                    <div class="my-2 row d-flex flex-grow-1">
                        <div class="text-center col-4">
                            <img src="assets/img/Series/elite.jpg" class="img-fluid">
                        </div>
                        <div class="col-8 align-content-center">
                            <div class="text-clamp">
                                <h2>Elite
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="my-2 row d-flex flex-grow-1">
                        <div class="text-center col-4">
                            <img src="assets/img/Series/from_netflix.jpg" class="img-fluid">
                        </div>
                        <div class="col-8 align-content-center">
                            <div class="text-clamp">
                                <h2>From
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="my-2 row d-flex flex-grow-1">
                        <div class="text-center col-4">
                            <img src="assets/img/Series/mrRobot.jpg" class="img-fluid">
                        </div>
                        <div class="col-8 align-content-center">
                            <div class="text-clamp">
                                <h2>Mr Robot
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <div id="bloqueo-cookies"></div>
        <div class="aviso-cookies" id="aviso-cookies">
            <img class="galleta" src="./assets/img/cookie.svg" alt="Galleta">
            <h3 class="titulo">Cookies</h3>
            <p class="parrafo">Utilizamos cookies propias y de terceros para mejorar nuestros servicios.
                Acepte las
                cookies para recibir información y novedades</p>
            <button class="btn btn-primary" id="btn-aceptar-cookies">Aceptar cookies</button>
            <button class="btn btn-primary" id="btn-rechazar-cookies">Rechazar cookies</button>
            <a class="enlace" href="#">Aviso de Cookies</a>
        </div>

        <?php include("includes/footer.php"); ?>


</body>


</html>