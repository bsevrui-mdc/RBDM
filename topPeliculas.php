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
                <div class="row my-4">
                    <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex"><h1>1</h1></div>
                    <div class="col-lg-2 justify-content-center"><img src="https://placehold.co/1920x1200" alt="imagen" class="img-fluid"></div>
                    <div class="col-lg-4 d-flex flex-column">
                        <div class="row d-flex align-items-center h-75">
                            <div class="col"><h1>título de película 1</h1></div>
                        </div>
                        <div class="row flex-grow-1 h-25">
                            <div class="col d-flex">
                                <h3 class="me-auto">TERROR</h3>
                                <h1 class="d-flex d-lg-none"><i class="fa-solid fa-star text-primary px-2"></i>10</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                        <h1><i class="fa-solid fa-star text-primary px-2"></i>10</h1>
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