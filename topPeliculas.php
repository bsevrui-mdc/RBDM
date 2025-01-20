<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <main>
        <div class="container-fluid">
            <div class="my-4 row">
                <div class="text-center col">
                    <h1>Ranking de Peliculas</h1>
                </div>
            </div>
            <div class="my-4 row d-none d-lg-block d-lg-flex">
                <div class="text-center col-lg-2 justify-content-center">Ranking</div>
                <div class="text-center col-lg-2 justify-content-center">Imagen</div>
                <div class="text-center col-lg-4 justify-content-center">Titulo</div>
                <div class="text-center col-lg-2 justify-content-center">Valoración</div>
                <div class="text-center col-lg-2 justify-content-center">Tu nota</div>
            </div>
            <div class="row top">
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex">
                    <div class="nota">1</div>
                </div>
                <div class="col-lg-2 contenedorImagen"><img src="./assets/img/peliculas/descarrilados.png" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-lg-75">
                        <div class="py-2 text-center col text-lg-start">
                            <a href="detalles.php">Descarrilados</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-auto col-7 bordeGenero align-items-center">
                            <h2 class="m-0">COMEDIA</h2>
                        </div>
                        <div class="my-auto col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.35</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.35</div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota">9.45</div>
                </div>
            </div>
            <div class="row top">
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex">
                    <div class="nota">2</div>
                </div>
                <div class="col-lg-2 contenedorImagen"><img src="./assets/img/peliculas/interstellar.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-lg-75">
                        <div class="py-2 text-center col text-lg-start">
                            <a href="detalles.php">Interstellar</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-auto col-7 bordeGenero align-items-center">
                            <h2 class="m-0">ACCION</h2>
                        </div>
                        <div class="my-auto col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.35</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.35</div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota">9.45</div>
                </div>
            </div>
            <div class="row top">
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex">
                    <div class="nota">3</div>
                </div>
                <div class="col-lg-2 contenedorImagen"><img src="./assets/img/peliculas/chucky.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-lg-75">
                        <div class="py-2 text-center col text-lg-start">
                            <a href="detalles.php">Chucky</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-auto col-7 bordeGenero align-items-center">
                            <h2 class="m-0">TERROR</h2>
                        </div>
                        <div class="my-auto col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.35</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.35</div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota">9.45</div>
                </div>
            </div>
            <div class="row top">
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex">
                    <div class="nota">4</div>
                </div>
                <div class="col-lg-2 contenedorImagen"><img src="./assets/img/peliculas/padre.jpg" alt="imagen" class="img-fluid w-100 h-100"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-lg-75">
                        <div class="py-2 text-center col text-lg-start">
                            <a href="detalles.php">Padre no hay más que uno</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-auto col-7 bordeGenero align-items-center">
                            <h2 class="m-0">COMEDIA</h2>
                        </div>
                        <div class="my-auto col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.35</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.35</div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota">9.45</div>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>