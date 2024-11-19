<?php include("includes/a_config.php"); ?>
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
                <div class="col text-center">
                    <h1 class="text-primary">Estrenos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/1920x1080" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>Iron Man</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, rerum? Adipisci ut
                                        laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis
                                        quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x1080" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>La casa de papel</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, rerum? Adipisci ut
                                        laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis
                                        quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x1080" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>From</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, rerum? Adipisci ut
                                        laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis
                                        quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="col-4 d-none d-lg-block">
                    <div class="d-flex flex-column h-100">
                        <div class="row d-flex flex-grow-1">
                            <div class="col-4 align-content-center">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h1>Aventura</h1>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                        <div class="row d-flex flex-grow-1">
                            <div class="col-4">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h1>Aventura</h1>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                        <div class="row d-flex flex-grow-1">
                            <div class="col-4">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h1>Aventura</h1>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row d-none d-lg-block">
                <div class="col text-center my-4">
                    <h1 class="text-primary">Peliculas destacadas</h1>
                </div>
            </div>

            <div class="row d-none d-lg-block">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel multiple">
                        <div class="carousel-inner">
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>

                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev multiple-prev" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="fa-solid fa-arrow-left" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next multiple-next" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="fa-solid fa-arrow-right" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>


            <div class="row d-none d-lg-block">
                <div class="col text-center my-4">
                    <h1 class="text-primary">Series destacadas</h1>
                </div>
            </div>
            <div class="row d-none d-lg-block">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel multiple">
                        <div class="carousel-inner">
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>

                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                            <div class="carousel-item multiple-item">
                                <div class="position-relative">
                                    <img src="https://placehold.co/1920x1080" class="img-fluid" alt="Imagen">
                                    <h3
                                        class="overlay-text position-absolute bottom-0 w-100 text-center text-white p-3">
                                        Pelicula
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev multiple-prev" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="fa-solid fa-arrow-left" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next multiple-next" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="fa-solid fa-arrow-right" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>