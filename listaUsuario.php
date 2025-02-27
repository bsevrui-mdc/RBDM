<?php
include("includes/a_config.php");
include("funciones.php");

date_default_timezone_set("Europe/Madrid");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["eliminar"])) {
    if (borrarPeliculaDeLista($_SESSION['usuario']->id, $_POST["eliminar"])) {
    }
}



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>
    <script src="js/focusListaUsuario.js"></script>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <main class="listaUsuario">
        <?php
        if (isset($_POST["eliminar"])) {
            borrarPeliculaDeLista($_SESSION['usuario']->id, $_POST["eliminar"]);
        }
        ?>
        <div class="container gap-2 lista-usuario">
            <div class="p-4 row d-none d-lg-flex">
                <div class="text-center col">
                    <h1>Lista Personal</h1>
                </div>
            </div>
            <div class="mb-4 row">
                <div class="col d-flex align-items-center">
                    <div class="leyenda statusCurrentlyWatchingBg"></div>
                    <p class="m-0 d-inline-block">Viendo</p>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="leyenda statusOnHoldBg"></div>
                    <p class="m-0 d-inline-block">En pausa</p>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="leyenda statusDroppedBg"></div>
                    <p class="m-0 d-inline-block">Abandonada</p>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="leyenda statusPlanToWatchBg"></div>
                    <p class="m-0 d-inline-block">Planeo Verla</p>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="leyenda statusCompletedBg"></div>
                    <p class="m-0 d-inline-block">Completada</p>
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
                <div class="col-1"></div>
            </div>
            <div>
                <?php
                $listaUsuario = obtenerListaUsuario($_SESSION['usuario']->id);
                if ($listaUsuario != false) {
                    echo '<ul>';
                    foreach ($listaUsuario as $value) {

                ?>
                <li class="list-unstyled">
                    <article>
                        <a class="parImpar" href="detalles.php?peli=<?php echo $value->id; ?>"
                            aria-label="Detalles de <?= $value->nombre ?>">
                            <div class="row top <?php
                                                        switch ($value->estado) {
                                                            case 'on-hold':
                                                                echo "statusOnHold";
                                                                break;
                                                            case 'dropped':
                                                                echo "statusDropped";
                                                                break;
                                                            case 'watching':
                                                                echo "statusCurrentlyWatching";
                                                                break;
                                                            case 'completed':
                                                                echo "statusCompleted";
                                                                break;
                                                            default:
                                                                echo "statusPlanToWatch";
                                                                break;
                                                        }
                                                        ?>">
                                <div class="col-lg-2 contenedorImagen"><img src="<?php echo $value->imagen; ?>"
                                        alt="imagen" class="img-fluid"></div>
                                <div class="col-lg d-flex flex-column">
                                    <div class="row d-flex align-items-center h-75">
                                        <div class="py-2 text-center col text-lg-start py-lg-0">
                                            <h1><?php echo $value->nombre; ?></h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="my-auto col-7 bordeGenero d-flex align-items-center">
                                            <h2 class="m-0"><?php echo $value->genero; ?><div>Estado: <?php
                                                                                                                switch ($value->estado) {
                                                                                                                    case 'on-hold':
                                                                                                                        echo "En pausa";
                                                                                                                        break;
                                                                                                                    case 'dropped':
                                                                                                                        echo "Abandonada";
                                                                                                                        break;
                                                                                                                    case 'watching':
                                                                                                                        echo "Viendo";
                                                                                                                        break;
                                                                                                                    case 'completed':
                                                                                                                        echo "Completada";
                                                                                                                        break;
                                                                                                                    default:
                                                                                                                        echo "Planeo verla";
                                                                                                                        break;
                                                                                                                }
                                                                                                                ?>
                                                </div>
                                            </h2>

                                        </div>
                                        <div
                                            class="my-auto col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center">
                                            <div class="nota"><i
                                                    class="fa-solid fa-star text-primary"></i><?php echo $value->nota; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-3 justify-content-center align-items-center border-start d-lg-flex d-none">
                                    <div class="nota"><i
                                            class="fa-solid fa-star text-primary"></i><?php echo $value->nota; ?>
                                    </div>
                                </div>
                                <div class="col-1 justify-content-center align-items-center d-lg-flex d-none">
                                    <form action="" method="post"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta película?');">
                                        <button type="submit" aria-label="Eliminar <?= $value->nombre ?>"
                                            name="eliminar"
                                            class="text-white border-0 bg-danger rounded-1 delete-button"
                                            value="<?= $value->id ?>"><i
                                                class=" fa-solid fa-trash-can delete"></i></button>
                                    </form>
                                </div>

                            </div>
                        </a>
                    </article>
                </li>
                <?php
                    }
                    echo '</ul>';
                } else {
                    echo "<div class='text-center row'>";
                    echo "<div class='p-5 col'>";
                    echo "<h4 class='p-2 my-5 border rounded d-inline bg-info'><i class='fa-solid fa-film'></i> No tiene añadido ningún contenido a la lista personal</h4>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </main>
    <?php include "includes/footer.php" ?>
</body>

</html>