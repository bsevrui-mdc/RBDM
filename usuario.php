<?php
include("includes/a_config.php");
include("funciones.php");

date_default_timezone_set("Europe/Madrid");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}



?>
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
                <div class="p-2 pelicula-favorita text-end">
                    <i class="fa-solid fa-star text-primary"></i>
                </div>
            </div>
        </div>

        <div class="p-5 container-fluid datos-usuario">
            <div class="row bg-info p-lg-5 rounded-3">
                <div class="mx-auto text-center col-lg-4 foto-perfil align-content-center">
                    <img src="<?php echo $_SESSION['usuario']->imagen; ?>" class="text-center img-fluid rounded-3">
                </div>
                <div class="col col-lg align-content-center">
                    <div class="gap-4 p-3 row h-100 align-content-around campos text-dark">
                        <div class="col-12 bg-secondary campo p-lg-2 rounded-3 ">
                            <div class="fw-bold d-inline">Nombre y apellidos:</div>
                            <div class="d-inline">
                                <?php echo $_SESSION['usuario']->nombre . " " . $_SESSION['usuario']->apellidos; ?>
                            </div>
                        </div>
                        <div class="col-12 bg-secondary campo p-lg-2 rounded-3">
                            <div class="fw-bold d-inline">Correo electronico:</div>
                            <div class="d-inline"><?php echo $_SESSION['usuario']->correo; ?></div>
                        </div>
                        <div class="col-12 bg-secondary campo p-lg-2 rounded-3">
                            <div class="fw-bold d-inline">Fecha de nacimiento:</div>
                            <div class="d-inline">
                                <?php echo $_SESSION['usuario']->fecha; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="gap-2 container-fluid lista-usuario">
            <div class="p-4 row d-none d-lg-flex">
                <div class="text-center col">
                    <h1>Lista Personal</h1>
                </div>
            </div>
            <div class="row d-none d-lg-flex">
                <div class="text-center col-2">
                    <h2>Imagen</h2>
                </div>
                <div class="text-center col">
                    <h2 class="m-0">titulo</h2>
                </div>
                <div class="text-center col-3">
                    <h2 class="m-0">Valoracion</h2>
                </div>
            </div>

            <?php
            $listaUsuario = obtenerListaUsuario($_SESSION['usuario']->id);
            if ($listaUsuario != false) {
                foreach ($listaUsuario as $value) {
            ?>
                    <a href="detalles.php?peli=<?php echo $value->id; ?>">
                        <div class="row top">
                            <div class="col-lg-2 contenedorImagen"><img src="<?php echo $value->imagen; ?>" alt="imagen"
                                    class="img-fluid"></div>
                            <div class="col-lg d-flex flex-column">
                                <div class="row d-flex align-items-center h-75">
                                    <div class="py-2 text-center col text-lg-start py-lg-0">
                                        <h1><?php echo $value->nombre; ?></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="my-auto col-7 bordeGenero align-items-center">
                                        <h3 class="m-0"><?php echo $value->genero; ?></h3>
                                    </div>
                                    <div class="my-auto col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center">
                                        <div class="nota"><i class="fa-solid fa-star text-primary"></i><?php echo $value->nota; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 justify-content-center align-items-center border-start d-lg-flex d-none">
                                <div class="nota"><i class="fa-solid fa-star text-primary"></i><?php echo $value->nota; ?></div>
                            </div>

                        </div>
                    </a>
            <?php
                }
            } else {
                echo "<div class='text-center row'>";
                echo "<div class='p-5 col'>";
                echo "<h4 class='p-2 my-5 border rounded d-inline bg-info'>No tiene añadido ningun contenido a la lista personal</h4>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </main>
    <?php include "includes/footer.php" ?>
</body>

</html>