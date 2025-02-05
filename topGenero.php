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
                    <h1><?php echo $_GET['peli'] ?></h1>
                </div>
            </div>
            <div class="my-4 row d-none d-lg-flex">
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
                <div class="col-lg-2 contenedorImagen"><img src="./assets/img/peliculas/veronica.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-lg-75">
                        <div class="py-2 text-center col text-lg-start">
                            <a href="detalles.php">Veronica</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-auto col-7 bordeGenero align-items-center">
                            <h2 class="m-0">PELICULA</h2>
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
                <div class="col-lg-2 contenedorImagen"><img src="./assets/img/Series/from_netflix.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-lg-75">
                        <div class="py-2 text-center col text-lg-start">
                            <a href="detalles.php">FROM</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-auto col-7 bordeGenero align-items-center">
                            <h2 class="m-0">SERIE</h2>
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
                <div class="col-lg-2 contenedorImagen"><img src="./assets/img/Series/alma.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-lg-75">
                        <div class="py-2 text-center col text-lg-start">
                            <a href="detalles.php">Alma</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-auto col-7 bordeGenero align-items-center">
                            <h3 class="m-0">SERIE</h3>
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
                <div class="col-lg-2 contenedorImagen"><img src="./assets/img/peliculas/expedeienteWarren.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-lg-75">
                        <div class="py-2 text-center col text-lg-start">
                            <a href="detalles.php">Expediente Warren</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="my-auto col-7 bordeGenero align-items-center">
                            <h2 class="m-0">PELICULA</h2>
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