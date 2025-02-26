<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <main class="py-5 container-fluid contenedorGeneros">
        <div class="row d-flex justify-content-around">
            <div class="px-4 col-lg-4">
                <a href="topGenero.php?genero=Terror">
                    <div class="mx-3">
                        <img src="./assets/img/genero/terror.png" class="card-img-top" alt="Imagen del género Terror">
                        <div class="py-3 text-center card-body">
                            <h2>Terror</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="px-4 col-lg-4">
                <a href="topGenero.php?genero=Accion">
                    <div class="mx-3">
                        <img src="./assets/img/genero/accion.png" class="card-img-top" alt="Imagen del género Acción">
                        <div class="py-3 text-center card-body">
                            <h2>Acción</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="px-4 col-lg-4">
                <a href="topGenero.php?genero=Aventura">
                    <div class="mx-3 ">
                        <img src="./assets/img/genero/aventura.png" class="card-img-top"
                            alt="Imagen del género Aventura">
                        <div class="py-3 text-center card-body">
                            <h2>Aventura</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="px-4 col-lg-4">
                <a href="topGenero.php?genero=Comedia">
                    <div class="mx-3">
                        <img src="./assets/img/genero/comedia.png" class="card-img-top" alt="Imagen del género Comedia">
                        <div class="py-3 text-center card-body">
                            <h2>Comedia</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="px-4 col-lg-4">
                <a href="topGenero.php?genero=Drama">
                    <div class="mx-3">
                        <img src="./assets/img/genero/drama.png" class="card-img-top" alt="Imagen del género Drama">
                        <div class="py-3 text-center card-body">
                            <h2>Drama</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="px-4 col-lg-4">
                <a href="topGenero.php?genero=Infantil">
                    <div class="mx-3">
                        <img src="./assets/img/genero/infantil.png" class="card-img-top"
                            alt="Imagen del género Infantil">
                        <div class="py-3 text-center card-body">
                            <h2>Infantil</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>