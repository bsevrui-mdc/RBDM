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
                <div class="mx-3 card">
                    <img src="./assets/img/genero/terror.png" class="card-img-top" alt="imagen">
                </div>
                <div class="py-3 text-center card-body">
                    <a href="topGenero.php?genero=Terror">Terror</a>
                </div>
            </div>
            <div class="px-4 col-lg-4">
                <div class="mx-3 card">
                    <img src="./assets/img/genero/accion.png" class="card-img-top" alt="imagen">
                </div>
                <div class="py-3 text-center card-body">
                    <a href="topGenero.php?genero=Accion">Accion</a>
                </div>
            </div>
            <div class="px-4 col-lg-4">
                <div class="mx-3 card">
                    <img src="./assets/img/genero/aventura.png" class="card-img-top" alt="imagen">
                </div>
                <div class="py-3 text-center card-body">
                    <a href="topGenero.php?genero=Aventura">Aventura</a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            <div class="px-4 col-lg-4">
                <div class="mx-3 card">
                    <img src="./assets/img/genero/comedia.png" class="card-img-top" alt="imagen">
                </div>
                <div class="py-3 text-center card-body">
                    <a href="topGenero.php?genero=Comedia">Comedia</a>
                </div>
            </div>
            <div class="px-4 col-lg-4">
                <div class="mx-3 card">
                    <img src="./assets/img/genero/drama.png" class="card-img-top" alt="imagen">
                </div>
                <div class="py-3 text-center card-body">
                    <a href="topGenero.php?genero=Drama">Drama</a>
                </div>
            </div>
            <div class="px-4 col-lg-4">
                <div class="mx-3 card">
                    <img src="./assets/img/genero/infantil.png" class="card-img-top" alt="imagen">
                </div>
                <div class="py-3 text-center card-body">
                    <a href="topGenero.php?genero=Infantil">Infantil</a>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>