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
    </main>
    <?php include "includes/footer.php" ?>
</body>

</html>