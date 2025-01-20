<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>
</head>

<body class="detalles">
    <?php include("includes/navbar.php"); ?>
    <main>
        <div class="container transparente my-5 rounded-4">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row py-3">
                        <div class="col d-flex justify-content-center">
                            <img src="assets/img/Series/la_casa_de_papel.jpg" alt="imagenPelicula" class="img-fluid">
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col text-center">
                            <h1>La casa de papel</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center py-4">
                            <div class="calificacion"><i class="fa-solid fa-star text-primary px-2"></i>9.83</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 px-5">
                    <div class="row">
                        <div class="col text-start py-2 px-2">

                            <h2>sinopsis</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col py-3">
                            <p>
                                Un misterioso hombre conocido como «el Profesor» ha pasado toda su vida planeando el mayor de los atracos de la historia: entrar en la Fábrica Nacional de Moneda y Timbre e imprimir 2400 millones de euros. Para llevar a cabo este ambicioso plan, el Profesor recluta a un equipo de ocho personas con ciertas habilidades y que no tienen nada que perder. Estos, junto al Profesor, planean cada paso del atraco durante cinco meses. Este equipo, con nombres de diferentes ciudades del mundo, requiere de 11 días de reclusión en la Fábrica, durante los cuales tiene que lidiar con las fuerzas de élite de la policía y 67 rehenes.
                            </p>
                            <a href="https://es.wikipedia.org/wiki/La_casa_de_papel" target="_blank">Fuente: Wikipedia</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col py-3 px-2">
                            <h3>Fecha publicacion: 01-01-2020</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="videoplayer" id="player-1">
                        <div class="ratio ratio-16x9 bg-dark">
                            <video class="video" src="assets/video/video.mp4"></video>
                        </div>
                        <div class="controls controls-dark bg-primary">
                            <button class="btn btn-lg btn-video-playpause" data-bs-toggle="tooltip" title="Play Video"
                                type="button"><i class="fa-solid fa-play"></i><i class="fa-solid fa-pause d-none"></i></button>
                            <div class="px-1 w-100">
                                <div class="progress w-100">
                                    <div class="progress-bar"></div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-video-fullscreen"><i class="fa-solid fa-maximize"></i></button>
                            <div class="dropup">
                                <button class="btn btn-lg btn-video-volume" data-bs-toggle="dropdown" title="Volume"><i class="fa-solid fa-volume-low"></i></button>
                                <div class="dropdown-menu dropdown-menu-end dropup-volume dropdown-menu-dark bg-primary">
                                    <input class="form-range form-range-volume" type="range">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-3 order-lg-1 d-flex align-items-center justify-content-center flex-column">
                    <h3>DIRECTOR</h3>
                    <img src="./assets/img/reparto/Alex_Pina.jpg" alt="imagen" class="img-fluid py-2">
                    <h1 class="pb-5 text-center">Alex Pina</h1>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col text-start">
                            <h2>Reparto</h2>
                        </div>
                    </div>
                    <div class="row align-items-stretch">
                        <div class="col-lg-4 px-3 py-5">
                            <div class="card rounded-4 h-100">
                                <img src="./assets/img/reparto/Alvaro_Morte.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Alvaro Morte
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 px-3 py-5">
                            <div class="card rounded-4 h-100">
                                <img src="./assets/img/reparto/Ursula_Corbero.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Úrsula Corbero
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 px-3 py-5">
                            <div class="card rounded-4 h-100">
                                <img src="./assets/img/reparto/Pedro_Alonso.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Pedro Alonso
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-4 px-3 py-5">
                            <div class="card rounded-4">
                                <img src="./assets/img/reparto/Jaime_Lorente.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Jaime Lorente
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 px-3 py-5">
                            <div class="card">
                                <img src="./assets/img/reparto/Itziar_Ituño.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Itziar Ituño
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 px-3 py-5">
                            <div class="card">
                                <img src="./assets/img/reparto/Miguel_Herran.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Miguel Herrán
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="./js/videoplayer.js"></script>
    <script src="./js/controlVideos.js"></script>
</body>

</html>