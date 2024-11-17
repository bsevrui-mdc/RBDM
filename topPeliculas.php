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
            <div class="row my-4 d-none d-lg-block d-lg-flex">
                <div class="col-lg-2 justify-content-center text-center">Ranking</div>
                <div class="col-lg-2 justify-content-center text-center">Imagen</div>
                <div class="col-lg-4 justify-content-center text-center">Titulo</div>
                <div class="col-lg-2 justify-content-center text-center">Valoración</div>
                <div class="col-lg-2 justify-content-center text-center">Tu nota</div>
            </div>
            <div class="row my-4 top">
                <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex">1</div>
                <div class="col-lg-2 contenedorImagen"><img src="https://placehold.co/1920x1200" alt="imagen" class="img-fluid"></div>
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row d-flex align-items-center h-75">
                        <div class="col text-center text-lg-start">
                            <h1>título de película 1</h1>
                        </div>
                    </div>
                    <div class="row h-25">
                        <div class="col-9 bordeGenero">
                            <h3>TERROR</h3>
                        </div>
                        <div class="col-3 bordeNota d-flex justify-content-end d-lg-none">
                            <p><i class="fa-solid fa-star text-primary px-2"></i>10</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <h1><i class="fa-solid fa-star text-primary px-2 "></i>10</h1>
                </div>
                <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                    <h1>9.45</h1>
                </div>
            </div>

        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>