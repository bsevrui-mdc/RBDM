<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("includes/head-tags.php"); ?>
    </head>
    <body>
        <?php include("includes/navbar.php"); ?>
        <main class="container-fluid admin">
            <div class="row py-3">
                <!--Parte izquierda-->
                <div class="col-lg-2">
                    <div class="row text-center">
                        <div class="col-3 col-lg-12">
                            <img src="../assets/img/admin.jpg" alt="" class="imgAdmin">
                        </div>
                        <div class="col-9 d-lg-none d-block align-content-center">
                            <div class="row justify-content-around">
                                <div class="col"><i class="fa-solid fa-film"></i></div>
                                <div class="col"><i class="fa-solid fa-tv"></i></div>
                                <div class="col"><i class="fa-solid fa-user"></i></div>
                            </div>
                        </div>
                        <div class="col d-none d-lg-block">
                            <div class="display-3 nameAdmin">admin</div>
                            <p>Josep Maria</p>
                            <p>Gonzales</p>
                            <p>Agusto</p>
                        </div>
                        <div class="col d-none d-lg-block">
                            <form action="" method="post" class="d-flex flex-column">
                                <input type="submit" class="btn btn-primary mb-2 rounded-pill" value="Peliculas">
                                <input type="submit" class="btn btn-primary mb-2 rounded-pill" value="Series">
                                <input type="submit" class="btn btn-primary mb-2 rounded-pill" value="Usuarios">
                            </form>
                        </div>
                    </div>
                </div>
                <!--Parte derecha-->
                <div class="col-lg-10">
                    <div class="row py-3">
                        <div class="col-md-4 ms-auto d-none d-lg-block">
                            <div class="input-group">
                                <input class="form-control py-2 border-right-0 border" type="search" placeholder="Buscar"
                                    id="example-search-input">
                                <button class="btn bg-white border-0"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col textList">
                            <h1>Lista de Peliculas</h1>
                            <input type="button" class="btn btn-primary w-25" value="Añadir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?php include("includes/table.php"); ?>
                            <div class="row d-lg-none mb-3">
                                <div class="col-4 text-center">
                                    <img src="../assets/img/peliculas/avatar.jpg" class="img-fluid imgTable">
                                </div>
                                <div class="col-6 d-flex flex-column justify-content-center text-center">
                                    <p>Avatar</p>
                                    <p>Aventura</p>
                                </div>
                                <div class="col d-flex flex-column justify-content-around align-items-center">
                                    <i class="fa-solid fa-pen"></i>
                                    <i class="fa-solid fa-trash-can color-trash"></i>
                                </div>
                            </div>
                            <div class="row d-lg-none mb-3">
                                <div class="col-4">
                                    <img src="../assets/img/peliculas/chucky.jpg" class="img-fluid imgTable">
                                </div>
                                <div class="col-6 d-flex flex-column justify-content-center text-center">
                                    <p>Chucky</p>
                                    <p>Terror</p>
                                </div>
                                <div class="col d-flex flex-column justify-content-around align-items-center">
                                    <i class="fa-solid fa-pen"></i>
                                    <i class="fa-solid fa-trash-can color-trash "></i>
                                </div>
                            </div>
                            <div class="row d-lg-none mb-3">
                                <div class="col-4">
                                    <img src="../assets/img/peliculas/coco.jpg" class="img-fluid imgTable">
                                </div>
                                <div class="col-6 d-flex flex-column justify-content-center text-center">
                                    <p>Coco</p>
                                    <p>Infantil</p>
                                </div>
                                <div class="col d-flex flex-column justify-content-around align-items-center">
                                    <i class="fa-solid fa-pen"></i>
                                    <i class="fa-solid fa-trash-can color-trash "></i>
                                </div>
                            </div>
                            <div class="row d-lg-none mb-3">
                                <div class="col-4">
                                    <img src="../assets/img/peliculas/descarrilados.png" class="img-fluid imgTable">
                                </div>
                                <div class="col-6 d-flex flex-column justify-content-center text-center">
                                    <p>Descarrilados</p>
                                    <p>Comedia</p>
                                </div>
                                <div class="col d-flex flex-column justify-content-around align-items-center">
                                    <i class="fa-solid fa-pen"></i>
                                    <i class="fa-solid fa-trash-can color-trash "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include "includes/footer.php" ?>
    </body>
</html>