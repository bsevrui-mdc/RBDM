<?php 
include("includes/a_config.php"); 
include("funciones.php"); 

if ($_SESSION['usuario']->tipo != 'admin') {
    header("Location: index.php");
}

$titulosPS = [
    'nombre'=>'Nombre',
    'genero'=>'Genero',
    'fecha'=>'Fecha',
    ];
    $titulosUsu=[
        'nombre'=>'Nombre',
        'apellidos'=>'Apellidos',
        'correo'=>'Email'
    ];
$titulos=$titulosPS;//valor predeterminado
$l='pelicula';//valor predeterminado
$tabla='contenido';//tabla por defecto
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['peli'])) {
        $l = 'pelicula';
        $tabla ='contenido';
        $titulos=$titulosPS;
       
    } elseif (isset($_POST['serie'])) {
        $l = 'serie';
        $tabla ='contenido';
        $titulos=$titulosPS;
       
    } elseif (isset($_POST['usu'])) {
        $l = 'usuario';
        $tabla ='usuario';
        $titulos=$titulosUsu;
        
    }
}
$p=obtenerTodo($l,$tabla);//Obtenemos datos 
?>
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
                            <img src="../assets/img/profilePictures/admin.jpg" alt="" class="imgAdmin">
                        </div>
                        <!--aparecen los iconos al minimizar la pantalla -->
                        <div class="col-9 d-lg-none d-block align-content-center">
                            <div class="row justify-content-around">
                                <div class="col"><i class="fa-solid fa-film"></i></div>
                                <div class="col"><i class="fa-solid fa-tv"></i></div>
                                <div class="col"><i class="fa-solid fa-user"></i></div>
                            </div>
                        </div>
                        <div class="col d-none d-lg-block">
                            <div class="display-3 nameAdmin">admin</div>
                            <p><?php echo $_SESSION['usuario']->nombre ?></p>
                            <p><?php echo $_SESSION['usuario']->apellidos ?></p>
                            
                        </div>
                        <div class="col d-none d-lg-block">
                            <form action="" method="post" class="d-flex flex-column">
                                <input type="submit" class="btn btn-primary mb-2 rounded-pill" name="peli" value="Peliculas">
                                <input type="submit" class="btn btn-primary mb-2 rounded-pill" name="serie" value="Series">
                                <input type="submit" class="btn btn-primary mb-2 rounded-pill" name="usu" value="Usuarios">
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
                            
                            <h1><?php
                            if($l === 'pelicula'){
                                echo "lista de películas";
                            }else if($l==='serie'){
                                echo 'lista de series';
                            }else if($l=='usuario'){
                                echo 'lista de usuarios';
                            }
                            ?>
                            </h1>
                            <input type="button" class="btn btn-primary w-25" value="Añadir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?php include("includes/table.php"); ?>
                            <?php foreach ($p as $value): ?>
                            <div class="row d-lg-none mb-3">
                                <div class="col-4">
                                    <img src="<?php echo $value->imagen ?>" class="img-fluid imgTable">
                                </div>
                                <div class="col-6 d-flex flex-column justify-content-center text-center">
                                    <p><?php echo $value->nombre ?></p>
                                    <p><?php echo $value->genero ?></p>
                                </div>
                                <div class="col d-flex flex-column justify-content-around align-items-center">
                                    <i class="fa-solid fa-pen"></i>
                                    <i class="fa-solid fa-trash-can color-trash"></i>
                                </div>    
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include "includes/footer.php" ?>
    </body>
</html>