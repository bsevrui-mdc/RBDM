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
            <div class="row py-3">
                <!--Parte izquierda-->
                <div class="col-lg-2">
                    <div class="row text-center">
                        <div class="col-6 col-lg-12 ">
                            <img src="https://placehold.co/150x150" alt="" class="imgAdmin">
                        </div>
                        <div class="col-6 col-lg-12">
                            <div class="display-3 nameAdmin">admin</div>
                            <p>nombre</p>
                            <p>apll1</p>
                            <p>apll2</p>
                        </div>
                        <div class="col-6 col-lg-12 d-none">
                            <i class="fa-solid fa-film"></i>
                            <i class="fa-solid fa-tv"></i>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="col-lg">
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
                        <div class="col-md-4 ms-auto">
                            <div class="input-group">
                                <input class="form-control py-2 border-right-0 border" type="search"
                                    placeholder="Buscar" id="example-search-input">
                                <button class="btn bg-white border-0">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col d-flex justify-content-between">
                            <h1>Lista de Peliculas</h1>
                            <input type="button" class="btn btn-primary w-25" value="Añadir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-dark table-borderless">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nombre</th>
                                            <th>Genero</th>
                                            <th>Fecha</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="imgFilms"><img src="https://placehold.co/100x100" alt=""></td>
                                            <td>Fallguys</td>
                                            <td>Infantil</td>
                                            <td>18-11-2000</td>
                                            <td>
                                                <i class="fa-solid fa-pen"></i>
                                                <i class="fa-solid fa-trash-can color-trash"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="imgFilms"><img src="https://placehold.co/100x100" alt=""></td>
                                            <td>Fallguys</td>
                                            <td>Infantil</td>
                                            <td>18-11-2000</td>
                                            <td>
                                                <i class="fa-solid fa-pen"></i>
                                                <i class="fa-solid fa-trash-can color-trash"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="imgFilms"><img src="https://placehold.co/100x100" alt=""></td>
                                            <td>Fallguys</td>
                                            <td>Infantil</td>
                                            <td>18-11-2000</td>
                                            <td>
                                                <i class="fa-solid fa-pen"></i>
                                                <i class="fa-solid fa-trash-can color-trash"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="imgFilms"><img src="https://placehold.co/100x100" alt=""></td>
                                            <td>Fallguys</td>
                                            <td>Infantil</td>
                                            <td>18-11-2000</td>
                                            <td>
                                                <i class="fa-solid fa-pen"></i>
                                                <i class="fa-solid fa-trash-can color-trash"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="imgFilms"><img src="https://placehold.co/100x100" alt=""></td>
                                            <td>Fallguys</td>
                                            <td>Infantil</td>
                                            <td>18-11-2000</td>
                                            <td>
                                                <i class="fa-solid fa-pen"></i>
                                                <i class="fa-solid fa-trash-can color-trash"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="imgFilms"><img src="https://placehold.co/100x100" alt=""></td>
                                            <td>Fallguys</td>
                                            <td>Infantil</td>
                                            <td>18-11-2000</td>
                                            <td>
                                                <i class="fa-solid fa-pen"></i>
                                                <i class="fa-solid fa-trash-can color-trash"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="imgFilms"><img src="https://placehold.co/100x100" alt=""></td>
                                            <td>Fallguys</td>
                                            <td>Infantil</td>
                                            <td>18-11-2000</td>
                                            <td>
                                                <i class="fa-solid fa-pen"></i>
                                                <i class="fa-solid fa-trash-can color-trash"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="imgFilms"><img src="https://placehold.co/100x100" alt=""></td>
                                            <td>Fallguys</td>
                                            <td>Infantil</td>
                                            <td>18-11-2000</td>
                                            <td>
                                                <i class="fa-solid fa-pen"></i>
                                                <i class="fa-solid fa-trash-can color-trash"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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