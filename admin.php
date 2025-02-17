<?php 
include("includes/a_config.php"); 
include("funciones.php"); 

if ($_SESSION['usuario']->tipo != 'admin') {
    header("Location: index.php");
}

$titulosPS = [
    'nombre'=>'Nombre',
    'genero'=>'Genero',
    'fecha'=>'Nota',
    ];
    $titulosUsu=[
        'nombre'=>'Nombre',
        'apellidos'=>'Apellidos',
        'correo'=>'Email',
        'tipo'=>'Tipo',
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
$p = obtenerTodo($l,$tabla);//Obtenemos todos los datos 
if(isset($_POST['borrar'])) {
    borrar($_POST['idD'],$_POST['tipoD']); 
    header('location:admin.php');
}

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
                        <!--
                        <div class="col-3 col-lg-12">
                            <img src="<?php echo $_SESSION['usuario']->imagen ?>" alt="" class="imgAdmin">
                        </div>
                        -->
                        <!--aparecen los iconos al minimizar la pantalla -->
                        <div class="col d-lg-none d-block align-content-center">
                            <div class="row">
                                <div class="d-flex flex-row gap-3 justify-content-around">
                                    <form method="post">
                                        <button type="submit" name="peli" class="btn-icon"><span class="visually-hidden">peliculas</span><i class="fa-solid fa-film"></i></button>
                                    </form>
                                    <form method="post">
                                        <button type="submit" name="serie" class="btn-icon"><span class="visually-hidden">series</span><i class="fa-solid fa-tv"></i></button>
                                    </form>
                                    <form method="post">
                                        <button type="submit" name="usu" class="btn-icon"><span class="visually-hidden">usuarios</span><i class="fa-solid fa-user"></i></button>
                                    </form>
                                </div>
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
                                <input class="form-control py-2 border-right-0 border" id="search" aria-label="true" type="search" placeholder="Buscar"
                                    id="example-search-input"></label>
                                <button class="btn bg-white border-0"><i class="fa fa-search"><span class="visually-hidden">seach</span></i></button>  
                        </div>
                    </div>
                    <form action="editar.php" method="post">
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
                            <!-- Dropdown de Bootstrap -->
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Añadir
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <form action="editar.php" method="post">
                                            <input type="hidden" name="tipo" value="cliente">
                                            <button type="submit" name="user" class="dropdown-item">Añadir Usuario</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="editar.php" method="post">
                                            <input type="hidden" name="tipo" value="contenido">
                                            <button type="submit" name="media" class="dropdown-item">Añadir Película/Serie</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="row">
                        <div class="col">
                            <?php include("includes/table.php"); ?>
                            <?php foreach ($p as $value): ?>
                            <div class="row d-lg-none mb-3">
                                <!--
                                <div class="col-4">
                                   <img src="<?php echo $value->imagen ?>" class="img-fluid imgTable"> 
                                </div>
                                -->
                                <div class="col-6 d-flex flex-column justify-content-center text-center">
                                    <p class="titulo"><?php echo $value->nombre ?></p>
                                    <?php if ($l === 'usuario'): ?>
                                        <p><?php echo $value->apellidos ?></p>
                                        <p><?php echo $value->tipo ?></p>
                                    <?php else: ?>
                                        <p><?php echo $value->genero ?></p>
                                        <p><?php echo $value->nota ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col d-flex justify-content-around align-items-center">
                                    <form  action="editar.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                        <input type="hidden" name="tipo" value="<?php echo $tabla; ?>">
                                        <button name="editar" class="btn-icon"><span class="visually-hidden">btn editar</span><i class="fa-solid fa-pen" aria-hidden="true"></i></button>
                                    </form>
                                    <form  action="" method="post">
                                        <input type="hidden" name="idD" value="<?php echo $value->id; ?>">
                                        <input type="hidden" name="tipoD" value="<?php echo $tabla; ?>">
                                        <button name="borrar" class="btn-icon2"><span class="visually-hidden">borrar</span><i class="fa-solid fa-trash-can color-trash"></i></button>
                                    </form>
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