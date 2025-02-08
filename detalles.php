<?php
require_once 'funciones.php';
$conn = conectarConBBDD();
$notaUsuario = '';
if (isset($_GET['peli']) && is_numeric($_GET['peli'])) {
    $pelicula = obtenerDatosPelicula($conn, $_GET['peli']);
} else {
    header("Location:index.php");
}

$comentarios = obtenerComentarios($conn, $_GET['peli']);

if (isset($_POST['eliminar'])) {
    eliminarComentario($conn, $_POST['idComentario'], $_GET['peli']);
}

if (isset($_POST['actualizar'])) {
    actualizarComentario($conn, $_POST['comentario'], $_POST['idComentario'], $_GET['peli']);
}
?>

<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>

    <head>


        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>


        <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.4/dist/katex.min.js"></script>


        <script defer src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    </head>


</head>
<?php
if (isset($_POST['comentar'])) {
    comentar($conn, $_SESSION['usuario']->id, $_GET['peli'], $_POST['comentarioUsuario']);
}

if (isset($_POST["cambiarValoracion"])) {
    cambiarValoracion($conn, $_SESSION['usuario']->id, $_GET['peli'], $_POST['nuevaNotaUsuario'], $_POST['estadoContenido']);
}


if (isset($_SESSION['usuario'])) {
    $notaUsuario = obtenerNotaUsuario($conn, $_SESSION['usuario']->id, $_GET['peli']);
    try {
        $idUser = $_SESSION['usuario']->id;
        $result = $conn->query("select estado from lista where id_contenido = $_GET[peli] and id_usuario=$idUser");
        if ($result->rowCount()) {
            $fila = $result->fetchObject();
            $estado = $fila->estado;
        } else {
            $estado = '';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}



?>

<body class="detalles" style="background-image: url(<?php echo $pelicula->imagen ?>);">
    <?php include("includes/navbar.php"); ?>
    <main>
        <div class="container my-5 transparente rounded-4">
            <div class="row">
                <div class="col-lg-3">
                    <div class="py-3 row">
                        <div class="col d-flex justify-content-center">
                            <img src="<?php echo $pelicula->imagen ?>" alt="imagenPelicula" class="img-fluid">
                        </div>
                    </div>
                    <div class="py-3 row">
                        <div class="text-center col">
                            <h1 class="text-break"><?php echo $pelicula->nombre ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="py-4 text-center col">
                            <div class="calificacion">Nota: <i class="px-2 fa-solid fa-star text-primary"></i><?php echo $pelicula->nota ?></div>
                            <?php
                            if (isset($_SESSION['usuario'])) { ?>
                                <div class="calificacion">Nota Usuario: <i class="px-2 fa-solid fa-star text-primary"></i><?php echo $notaUsuario ?></div>
                                <form method="post" action="">
                                    <select name="nuevaNotaUsuario" class="my-4">
                                        <?php
                                        for ($i = 0; $i <= 10; $i++) {
                                            echo "<option value=$i";
                                            if ($i == $notaUsuario) echo 'selected';
                                            echo ">$i</option>";
                                        }
                                        ?>
                                    </select>

                                    <select name="estadoContenido" class="my-4">
                                        <option value="ptw" <?php if ($estado == "ptw") echo 'selected' ?>>Planeo verla</option>
                                        <option value="watching" <?php if ($estado == "watching") echo 'selected' ?>>Viendo</option>
                                        <option value="dropped" <?php if ($estado == "dropped") echo 'selected' ?>>Abandonada</option>
                                        <option value="on-hold" <?php if ($estado == "on-hold") echo 'selected' ?>>En pausa</option>
                                        <option value="completed" <?php if ($estado == "completed") echo 'selected' ?>>Completada</option>
                                    </select>
                                    <button class="btn btn-primary" type="submit" name="cambiarValoracion">Cambiar nota y estado</button>
                                </form>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="px-5 col-lg-9">
                    <div class="row">
                        <div class="px-2 py-2 col text-start">

                            <h2>sinopsis</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="py-3 col">
                            <p>
                                <?php echo $pelicula->sinopsis ?>
                            </p>
                            <a href="https://es.wikipedia.org/wiki/La_casa_de_papel" target="_blank">Fuente: Wikipedia</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-2 py-3 col">
                            <h3><?php echo $pelicula->fecha ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="videoplayer" id="player-1">
                        <div class="ratio ratio-16x9 bg-dark">
                            <video class="video" src="<?php echo $pelicula->video ?>"></video>
                        </div>
                        <div class="controls controls-dark bg-primary">
                            <button class="btn btn-lg btn-video-playpause" data-bs-toggle="tooltip" title="Play Video"
                                type="button"><i class="fa-solid fa-play"></i><i class="fa-solid fa-pause d-none"></i></button>
                            <div class="px-1 w-100">
                                <div class="progress w-100">
                                    <div class="progress-bar"></div>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-video-fullscreen"><i class="fa-solid fa-maximize"></i></button>
                            <div class="dropup">
                                <button class="btn btn-lg btn-video-volume" data-bs-toggle="dropdown" title="Volume"><i class="fa-solid fa-volume-low"></i></button>
                                <div class="dropdown-menu dropdown-menu-end dropup-volume dropdown-menu-dark bg-primary">
                                    <input class="form-range form-range-volume" type="range">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-5 row">
                <div class="col-lg-3 order-lg-1 d-flex align-items-center justify-content-center flex-column">
                    <h3>DIRECTOR</h3>
                    <img src="./assets/img/reparto/Alex_Pina.jpg" alt="imagen" class="py-2 img-fluid">
                    <h1 class="pb-5 text-center">Alex Pina</h1>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col text-start">
                            <h2>Reparto</h2>
                        </div>
                    </div>
                    <div class="row align-items-stretch">
                        <div class="px-3 py-5 col-lg-4">
                            <div class="card rounded-4 h-100">
                                <img src="./assets/img/reparto/Alvaro_Morte.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Alvaro Morte
                                </div>
                            </div>
                        </div>
                        <div class="px-3 py-5 col-lg-4">
                            <div class="card rounded-4 h-100">
                                <img src="./assets/img/reparto/Ursula_Corbero.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Úrsula Corbero
                                </div>
                            </div>
                        </div>
                        <div class="px-3 py-5 col-lg-4">
                            <div class="card rounded-4 h-100">
                                <img src="./assets/img/reparto/Pedro_Alonso.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Pedro Alonso
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="px-3 py-5 col-lg-4">
                            <div class="card rounded-4">
                                <img src="./assets/img/reparto/Jaime_Lorente.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Jaime Lorente
                                </div>
                            </div>
                        </div>
                        <div class="px-3 py-5 col-lg-4">
                            <div class="card">
                                <img src="./assets/img/reparto/Itziar_Ituño.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Itziar Ituño
                                </div>
                            </div>
                        </div>
                        <div class="px-3 py-5 col-lg-4">
                            <div class="card">
                                <img src="./assets/img/reparto/Miguel_Herran.jpg" class="img-fluid card-img-top rounded-4" alt="imagen">
                                <div class="card-body">
                                    Miguel Herrán
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="container my-5 transparente rounded-4 py3">
            <div class="row">
                <h2>comentarios</h2>
            </div>
            <?php
            if (isset($_SESSION['usuario'])) {
            ?>
                <form action="" method="post" id="formulario">
                    <div class="row">
                        <div class="col">
                            <div id="standalone-container" style="background-color: white; color: black;"><!--Aqui esta el estiilo en linea-->
                                <div id="toolbar-container">
                                    <span class="ql-formats">
                                        <select class="ql-font"></select>
                                        <select class="ql-size"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <select class="ql-color"></select>
                                        <select class="ql-background"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-script" value="sub"></button>
                                        <button class="ql-script" value="super"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-header" value="1"></button>
                                        <button class="ql-header" value="2"></button>
                                        <button class="ql-blockquote"></button>
                                        <button class="ql-code-block"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-indent" value="-1"></button>
                                        <button class="ql-indent" value="+1"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-direction" value="rtl"></button>
                                        <select class="ql-align"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-link"></button>
                                        <button class="ql-image"></button>
                                        <button class="ql-video"></button>
                                        <button class="ql-formula"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-clean"></button>
                                    </span>
                                </div>
                                <div id="editor-container"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="comentarioUsuario" id="comentarioUsuario">
                    <div class="row">
                        <div class="col text-end">
                            <input type="submit" name="comentar" value="Comentar" class="btn btn-primary" />

                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
            <?php
            while ($fila = $comentarios->fetchObject()) {
            ?>
                <form method="post" action="">
                    <div class="py-3 row">
                        <div class="col-lg-1">
                            <img src="<?php echo $fila->imagen ?>" class="img-fluid">
                        </div>

                        <div class="col-lg-10">
                            <input type="hidden" name="idComentario" value="<?php echo $fila->idComentario ?>">
                            <textarea name="comentario" class="form-control h-100"><?php echo $fila->texto ?></textarea>
                        </div>
                        <div class="col-lg-1 d-flex align-items-center">
                            <?php if (isset($_SESSION['usuario']) && $fila->idUsuario == $_SESSION['usuario']->id) { ?>
                                <button class="mx-1 btn btn-primary" type="submit" name="eliminar">
                                    <i class="fa-solid fa-trash icono-Log-Out"></i>
                                </button>
                                <button class="mx-1 btn btn-primary" type="submit" name="actualizar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            <?php } ?>
                        </div>

                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="./js/videoplayer.js"></script>
    <script src="./js/controlVideos.js"></script>
    <script src="/js/quill.js"></script>

    <script>
        window.onload = function() {
            var quill = new Quill('#editor-container', {
                modules: {
                    formula: true, // Asegúrate de que el módulo 'formula' esté habilitado
                    syntax: true,
                    toolbar: '#toolbar-container'
                },
                placeholder: 'Escribe un comentario...',
                theme: 'snow'
            });

            document.getElementById('formulario').addEventListener('submit', function() {
                console.log(quill.root.innerHTML);
                var contenido = quill.root.innerHTML;
                document.getElementById('comentarioUsuario').value = contenido;
            });
        };
    </script>
</body>

</html>