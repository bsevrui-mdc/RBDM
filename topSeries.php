<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>
</head>

<body>
    <?php
    require_once 'funciones.php';
    $contador = 1;
    $conn = conectarConBBDD();

    if (!isset($_SESSION['usuario'])) {
        try {
            $datosPelicula = $conn->query("SELECT c.id as id, c.nombre as nombre, c.nota as nota, c.genero as genero, c.imagen as imagen from contenido c where c.tipo = 'Serie' order by c.nota desc LIMIT 4");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    } else {
        $id = $_SESSION["usuario"]->id;
        try {
            $datosPelicula = $conn->query("SELECT c.id as id, c.nombre as nombre, c.nota as nota, c.genero as genero, c.imagen as imagen, l.nota as notaUsuario from contenido c, lista l where c.tipo = 'Serie' and l.id_usuario='$id' and l.id_contenido = c.id order by c.nota desc LIMIT 4");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    ?>
    <?php include("includes/navbar.php"); ?>
    <main>
        <div class="container-fluid">
            <div class="my-4 row">
                <div class="text-center col">
                    <h1>Ranking de Series</h1>
                </div>
            </div>
            <div class="my-4 row d-none d-lg-block d-lg-flex">
                <div class="text-center col-lg-2 justify-content-center">Ranking</div>
                <div class="text-center col-lg-2 justify-content-center">Imagen</div>
                <div class="text-center col-lg-4 justify-content-center">Titulo</div>
                <div class="text-center col-lg-2 justify-content-center">Valoración</div>
                <div class="text-center col-lg-2 justify-content-center">Tu nota</div>
            </div>
            <?php
            while ($fila = $datosPelicula->fetchObject()) {
            ?>
                <div class="row top">
                    <div class="col-lg-2 align-items-center justify-content-center d-none d-lg-flex">
                        <div class="nota"><?php echo $contador ?></div>
                    </div>
                    <div class="col-lg-2 contenedorImagen"><img src="<?php echo $fila->imagen ?>" alt="imagen" class="img-fluid w-100 h-100"></div>
                    <div class="col-lg-4 d-flex flex-column">
                        <div class="row d-flex align-items-center h-lg-75">
                            <div class="py-2 text-center col text-lg-start">
                                <a href="detalles.php?peli=<?php echo $fila->id ?>"><?php echo $fila->nombre ?></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="my-auto col-7 bordeGenero align-items-center">
                                <h2 class="m-0"><?php echo $fila->genero ?></h2>
                            </div>
                            <div class="my-auto col-5 bordeNota d-flex justify-content-end d-lg-none align-items-center">
                                <div class="nota"><i class="fa-solid fa-star text-primary"></i><?php echo $fila->nota ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                        <div class="nota"><i class="fa-solid fa-star text-primary"></i><?php echo $fila->nota ?></div>
                    </div>
                    <div class="col-lg-2 justify-content-center align-items-center border-start d-lg-flex d-none">
                        <div class="nota"><?php if (isset($fila->notaUsuario)) echo $fila->notaUsuario ?></div>
                    </div>
                </div>
            <?php
                $contador++;
            }
            ?>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>