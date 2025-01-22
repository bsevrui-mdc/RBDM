<?php
include("includes/a_config.php");
include("funciones.php");
$conn = conectarConBBDD();

include("googleconnect.php");

date_default_timezone_set("Europe/Madrid");


// session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>

    <script src="./js/scripts.js"></script>

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
                    <?php include("includes/carrusel-normal.php"); ?>
                </div>
                <div class="col-4 d-none d-lg-block top3">
                    <div class="d-flex flex-grow-1 flex-column h-100 topGenero justify-content-around">
                        <div class="row">
                            <div class="col-4 align-content-center">
                                <img src="assets/img/peliculas/chucky.jpg" class="img-fluid">
                            </div>
                            <div class="col-8 align-content-center ">
                                <div class="text-clamp">
                                    <h2>Chuky</h2>
                                </div>

                                <div class="genero">Género: Terror</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 align-content-center">
                                <img src="assets/img/Series/breaking-bad.jpg" class="img-fluid">
                            </div>
                            <div class="col-8 align-content-center ">
                                <div class="text-clamp">
                                    <h2>Breaking bad</h2>
                                </div>

                                <div class="genero">Género: Drama</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 align-content-center">
                                <img src="assets/img/Series/Lqsa.jpg" class="img-fluid">
                            </div>
                            <div class="col-8 align-content-center ">
                                <div class="text-clamp">
                                    <h2>la que se avecina</h2>
                                </div>

                                <div class="genero">Género: Comedia</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="my-4 text-center col">
                    <h1 class="text-primary">Peliculas destacadas</h1>
                </div>
            </div>

            <div class="row d-none d-lg-block">
                <div class="col-12">
                    <?php include("includes/carrusel-multiple.php"); ?>
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
                    <h1 class="text-primary">Series destacadas</h1>
                </div>
            </div>
            <div class="row d-none d-lg-block">
                <div class="col-12">
                    <?php include("includes/carrusel-multiple.php"); ?>
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
    </main>
    <?php
    if ((!isset($_SESSION['iduser']) && isset($_SESSION['access_token']))) {
        include("registermodal.php");

    ?>
        <script>
            document.getElementById('id01').style.display = 'block';
        </script>
    <?php

    }
    ?>
    <?php include("includes/footer.php"); ?>
</body>

</html>