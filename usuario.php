<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <main class="usuario">
        <div class="container-fluid">
            <div class="row">
                <div class="pelicula-favorita text-end p-2">
                    <i class="fa-solid fa-star text-primary"></i>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5 datos-usuario">
            <div class="row bg-info p-lg-5 rounded-3">
                <div class="col-lg-4 foto-perfil align-content-center mx-auto text-center">
                    <img src="assets/img/usuario.jpg" class="img-fluid rounded-3 text-center">
                </div>
                <!--CF2: el col-12 no es necesario.  -->
                <div class="col-12 col-lg align-content-center">
                    <div class="row h-100 align-content-around gap-4 campos text-dark p-3">
                        <div class="col-12 bg-secondary campo p-lg-2 rounded-3">
                            <div class="fw-bold d-inline">Usuario:</div>
                            <div class="d-inline">VaMa_18</div>
                        </div>
                        <div class="col-12 bg-secondary campo p-lg-2 rounded-3 ">
                            <div class="fw-bold d-inline">Nombre:</div>
                            <div class="d-inline">Ángeles Ruiz Siendones</div>
                        </div>
                        <div class="col-12 bg-secondary campo p-lg-2 rounded-3">
                            <div class="fw-bold d-inline">Fecha de unión:</div>
                            <div class="d-inline">8-10-2024</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid lista-usuario gap-2">
            <div class="row d-none d-lg-flex p-4">
                <div class="col text-center">
                    <h1>Lista Personal</h1>
                </div>
            </div>
            <div class="row d-none d-lg-flex">
                <div class="col-2 text-center">
                    <h2>Imagen</h2>
                </div>
                <div class="col text-center">
                    <h2 class="m-0">titulo</h2>
                </div>
                <div class="col-3 text-center">
                    <h2 class="m-0">Valoracion</h2>
                </div>
            </div>
            <div class="row top">
                <div class="col-lg-2 contenedorImagen"><img src="assets/img/Series/breaking-bad.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start py-2 py-lg-0">
                            <a href="detalles.php">Breaking Bad</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 bordeGenero  align-items-center my-auto">
                            <h3 class="m-0">Drama</h3>
                        </div>
                        <div class="col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center my-auto">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>10</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>10</div>
                </div>
            </div>

            <div class="row top">
                <div class="col-lg-2 contenedorImagen"><img src="assets/img/Series/from_netflix.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start py-2 py-lg-0">
                            <a href="detalles.php">From</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 bordeGenero  align-items-center my-auto">
                            <h3 class="m-0">TERROR</h3>
                        </div>
                        <div class="col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center my-auto">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.50</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>9.50</div>
                </div>
            </div>

            <div class="row top">
                <div class="col-lg-2 contenedorImagen"><img src="assets/img/Series/la_casa_de_papel.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start py-2 py-lg-0">
                            <a href="detalles.php">La casa de papel</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 bordeGenero align-items-center my-auto">
                            <h3 class="m-0">Accion</h3>
                        </div>
                        <div class="col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center my-auto">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>9</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>9</div>
                </div>
            </div>

            <div class="row top">
                <div class="col-lg-2 contenedorImagen"><img src="assets/img/Series/Lqsa.jpg" alt="imagen" class="img-fluid"></div>
                <div class="col-lg d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start py-2 py-lg-0">
                            <a href="detalles.php">La que se avecina</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 bordeGenero  align-items-center my-auto">
                            <h3 class="m-0">COMEDIA</h3>
                        </div>
                        <div class="col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center my-auto">
                            <div class="nota"><i class="fa-solid fa-star text-primary"></i>8.75</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <div class="nota"><i class="fa-solid fa-star text-primary"></i>8.75</div>
                </div>
            </div>
        </div>
    </main>
    <?php include "includes/footer.php" ?>
</body>

</html>