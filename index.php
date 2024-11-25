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
                    <?php include("includes/carrusel-normal.php"); ?>
                </div>
                <div class="col-4 d-none d-lg-block topGenero">
                   <!-- <div class="d-flex flex-column h-100 topGenero"> -->
                        <div class="row d-flex mb-3">
                            <div class="col-4 align-content-center imgs">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h2>Aventura</h2>
                                <div class="genero">Género: Drama</div>
                            </div>
                        </div>
                        <div class="row d-flex mb-3">
                            <div class="col-4 align-content-center imgs">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h2>Aventura</h2>
                                <div class="genero">Género: Drama</div>
                            </div>
                        </div>
                        <div class="row d-flex mb-3">
                            <div class="col-4 align-content-center imgs">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h2>Aventura</h2>
                                <div class="genero">Género: Drama</div>
                            </div>
                        </div>
                   <!-- </div> -->

                </div>
            </div>

            <div class="row">
                <div class="col text-center my-4">
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
                    <div class="row d-flex flex-grow-1 my-2">
                        <div class="col-4">
                            <img src="https://placehold.co/500" class="img-fluid">
                        </div>
                        <div class="col align-content-center">
                            <h2>Aventura</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row d-flex flex-grow-1 my-2">
                        <div class="col-4">
                            <img src="https://placehold.co/500" class="img-fluid">
                        </div>
                        <div class="col align-content-center">
                            <h2>Aventura</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row d-flex flex-grow-1 my-2">
                        <div class="col-4">
                            <img src="https://placehold.co/500" class="img-fluid">
                        </div>
                        <div class="col align-content-center">
                            <h2>Aventura</h2>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col text-center my-4">
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
                    <div class="row d-flex flex-grow-1 my-2">
                        <div class="col-4">
                            <img src="https://placehold.co/500" class="img-fluid">
                        </div>
                        <div class="col align-content-center">
                            <h2>Aventura</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row d-flex flex-grow-1 my-2">
                        <div class="col-4">
                            <img src="https://placehold.co/500" class="img-fluid">
                        </div>
                        <div class="col align-content-center">
                            <h2>Aventura</h2>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row d-flex flex-grow-1 my-2">
                        <div class="col-4">
                            <img src="https://placehold.co/500" class="img-fluid">
                        </div>
                        <div class="col align-content-center">
                            <h2>Aventura</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>