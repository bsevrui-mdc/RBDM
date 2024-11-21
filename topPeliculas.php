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
            <div class="row my-4">
                <div class="col text-center">
                    <h1>Ranking de Peliculas</h1>
                </div>
            </div>
            <div class="row my-4 d-none d-lg-block d-lg-flex">
                <div class="col-lg-2 justify-content-center text-center">Ranking</div>
                <div class="col-lg-2 justify-content-center text-center">Imagen</div>
                <div class="col-lg-4 justify-content-center text-center">Titulo</div>
                <div class="col-lg-2 justify-content-center text-center">Valoración</div>
                <div class="col-lg-2 justify-content-center text-center">Tu nota</div>
            </div>
            <div class="row top">
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex"><div class="nota">1</div></div>
                <div class="col-lg-2 contenedorImagen"><img src="https://placehold.co/1920x1080" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start">
                            <h2>título de película 1</h2>
                        </div>
                    </div>
                    <div class="row h-25">
                        <div class="col-8 bordeGenero">
                            <h3>TERROR</h3>
                        </div>
                        <div class="col-4 bordeNota d-flex justify-content-end d-lg-none">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>10</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>10</div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota">9.45</div>
                </div>
            </div>
            <div class="row top">
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex"><div class="nota">2</div></div>
                <div class="col-lg-2 contenedorImagen"><img src="https://placehold.co/1920x1080" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start">
                            <h2>título de película 2</h2>
                        </div>
                    </div>
                    <div class="row h-25">
                        <div class="col-8 bordeGenero">
                            <h3>TERROR</h3>
                        </div>
                        <div class="col-4 bordeNota d-flex justify-content-end d-lg-none">
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
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex"><div class="nota">3</div></div>
                <div class="col-lg-2 contenedorImagen"><img src="https://placehold.co/1920x1080" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start">
                            <h2>título de película 3</h2>
                        </div>
                    </div>
                    <div class="row h-25">
                        <div class="col-8 bordeGenero">
                            <h3>TERROR</h3>
                        </div>
                        <div class="col-4 bordeNota d-flex justify-content-end d-lg-none">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.10</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.10</div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota">9.45</div>
                </div>
            </div>
            <div class="row top">
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex"><div class="nota">4</div></div>
                <div class="col-lg-2 contenedorImagen"><img src="https://placehold.co/1920x1080" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start">
                            <h2>título de película 4</h2>
                        </div>
                    </div>
                    <div class="row h-25">
                        <div class="col-8 bordeGenero">
                            <h3>TERROR</h3>
                        </div>
                        <div class="col-4 bordeNota d-flex justify-content-end d-lg-none">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.05</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.05</div>
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