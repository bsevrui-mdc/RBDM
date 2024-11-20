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
                <div class="col-12 pelicula-favorita text-end p-2">
                    <i class=" fa-border fa-solid fa-star text-secondary"></i>
                </div>
            </div>
        </div>

        <div class="container-fluid p-5 datos-usuario">
            <div class="row bg-info p-5 rounded-3">
                <div class="col-12 col-lg-4 foto-perfil align-content-center">
                    <img src="https://placehold.co/320x320" class="img-fluid">
                </div>
                <div class="col-12 col-lg align-content-center">
                    <div class="row h-100 align-content-around gap-4 campos text-dark p-3">
                        <div class="col-12 bg-secondary campo p-2 rounded-4">
                            <div class="fw-bold d-inline">Usuario:</div>
                            <div class="d-inline">VaMa_18</div>
                        </div>
                        <div class="col-12 bg-secondary campo p-2 rounded-4 ">
                            <div class="fw-bold d-inline">Nombre:</div>
                            <div class="d-inline">Ángeles Ruiz Siendones</div>
                        </div>
                        <div class="col-12 bg-secondary campo p-2 rounded-4">
                            <div class="fw-bold d-inline">Fecha de unión:</div>
                            <div class="d-inline">8-10-2024</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php  // include "includes/footer.php" ?>
</body>

</html>