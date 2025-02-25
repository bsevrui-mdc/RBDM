<?php
include("includes/a_config.php");
include("funciones.php");

date_default_timezone_set("Europe/Madrid");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
}

$pattern1 = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,6}$/'; // Email
$pattern2 = '/^[a-zA-Z\s]+$/'; // Nombre, Apellidos, Pais
$pattern3 = '/^[a-zA-Z0-9]*$/'; // CP
$pattern4 = '/^[6-9]\d{0,8}$/'; // Telf

$error = false;

if (isset($_POST['actualizar'])) {

    if (empty($_POST['correo']) || !preg_match($pattern1, $_POST['correo']) || empty($_POST['nombre']) || !preg_match($pattern2, $_POST['nombre']) || empty($_POST['apellidos']) || !preg_match($pattern2, $_POST['apellidos']) || empty($_POST['fecha']) || empty($_POST['pais']) || !preg_match($pattern2, $_POST['pais']) || empty($_POST['codigo_postal']) || !preg_match($pattern3, $_POST['codigo_postal']) || empty($_POST['telefono']) || !preg_match($pattern4, $_POST['telefono'])) {
        $error = true;
    } else {
        if (isset($_FILES['img']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
            $ruta = "./assets/img/profilePictures/" . time() . "-" . $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
            if (actualizarUsuario($_POST["id"], $_POST['correo'], "", $_POST['nombre'], $_POST['apellidos'], "", $_POST['fecha'], $_POST['pais'], $_POST['codigo_postal'], $_POST['telefono'], $ruta)) {
                if (actualizarSesionUsuario($_POST["id"])) {
                    header("Location: usuario.php");
                } else {
                    $error = true;
                }
            } else {
                $error = true;
            }
        } else {
            if (actualizarUsuario($_POST["id"], $_POST['correo'], "", $_POST['nombre'], $_POST['apellidos'], "", $_POST['fecha'], $_POST['pais'], $_POST['codigo_postal'], $_POST['telefono'], "")) {
                if (actualizarSesionUsuario($_POST["id"])) {
                    header("Location: usuario.php");
                } else {
                    $error = true;
                }
            } else {
                $error = true;
            }
        }
    }
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
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_SESSION['usuario']->id; ?>">
            <div class="p-5 my-4 container-fluid datos-usuario bg-info p-lg-5 rounded-3">
                <div class="row">
                    <div class="col text-end">
                        <button type="submit" aria-label="botón de editar" name="editar" class="text-white bg-transparent border-0"><i
                                class="fa-solid fa-pen-to-square edit"></i></button>
                    </div>
                </div>
                <?php

                if ($error) {
                ?>
                    <div class="row">
                        <div class="col">
                            <span class="error">Algo ha salido mal :(</span>
                        </div>
                    </div>

                <?php
                }
                ?>
                <div class="mx-auto text-center row foto-perfil align-content-center">
                    <div class="col">
                        <img src="<?php echo $_SESSION['usuario']->imagen; ?>" alt="Foto de perfil" class="text-center img-fluid rounded-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col col-lg align-content-center">
                        <div class="gap-4 p-3 row align-content-around campos text-dark">
                            <div class="col bg-secondary campo p-lg-2 rounded-3 ">
                                <div class="fw-bold">Nombre:</div>
                                <div class="">
                                    <?php
                                    if (isset($_POST["editar"])) {
                                        echo "<input class='w-100 rounded-3 ps-1' type='text' name='nombre' value='" . $_SESSION['usuario']->nombre . "' id='nombre'>";
                                    } else {
                                        echo $_SESSION['usuario']->nombre;
                                    }
                                    ?>
                                </div>
                                <span id="errorNombre" class="noError">El nombre solo puede estar compuesto por letras y
                                    espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
                            </div>
                            <div class="col bg-secondary campo p-lg-2 rounded-3">
                                <div class="fw-bold">
                                    Apellidos:
                                </div>
                                <div>
                                    <?php
                                    if (isset($_POST["editar"])) {
                                        echo "<input class='w-100 rounded-3 ps-1' type='text' name='apellidos' value='" . $_SESSION['usuario']->apellidos . "' id='apellidos'>";
                                    } else {
                                        echo $_SESSION['usuario']->apellidos;
                                    }
                                    ?>
                                </div>
                                <span id="errorApellidos" class="noError">Los apellidos solo pueden estar compuestos por
                                    letras y espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
                            </div>
                        </div>
                        <div class="gap-4 p-3 row align-content-around campos text-dark">
                            <div class="col bg-secondary campo p-lg-2 rounded-3">
                                <div class="fw-bold">Correo electronico:</div>
                                <div class="">
                                    <?php
                                    if (isset($_POST["editar"])) {
                                        echo "<input class='w-100 rounded-3 ps-1' type='text' name='correo' value='" . $_SESSION['usuario']->correo . "' id='email'>";
                                    } else {
                                        echo $_SESSION['usuario']->correo;
                                    }
                                    ?>
                                </div>
                                <span id="errorEmail" class="noError">El correo debe de seguir el siguiente formato
                                    ejemplo@ejemplo.com</span>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST["editar"])) {
                        ?>
                            <div class="gap-4 p-3 row align-content-around campos text-dark">
                                <div class="col bg-secondary campo p-lg-2 rounded-3">
                                    <div>
                                        <span class="fw-bold">Foto de perfil:</span> dejar vacio si no se quiere cambiar
                                    </div>
                                    <input type="file" name="img" class="form-control">
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                        <div class="gap-4 p-3 row align-content-around campos text-dark">
                            <div class="col bg-secondary campo p-lg-2 rounded-3">
                                <div class="fw-bold">Fecha de nacimiento:</div>
                                <div class="">
                                    <?php
                                    if (isset($_POST["editar"])) {
                                        echo "<input class='w-100 rounded-3 ps-1' type='date' name='fecha' value='" . $_SESSION['usuario']->fecha . "'>";
                                    } else {
                                        echo $_SESSION['usuario']->fecha;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col bg-secondary campo p-lg-2 rounded-3">
                                <div class="fw-bold">Telefono:</div>
                                <div class="">
                                    <?php
                                    if (isset($_POST["editar"])) {
                                        echo "<input class='w-100 rounded-3 ps-1' type='text' name='telefono' value='" . $_SESSION['usuario']->telefono . "' id='telf'>";
                                    } else {
                                        echo $_SESSION['usuario']->telefono;
                                    }
                                    ?>
                                </div>
                                <span id="errorTelf" class="noError">El teléfono debe de comenzar por 6, 7, 8 ó 9 y
                                    tener un máximo de 9 digitos</span>
                            </div>
                        </div>
                        <div class="gap-4 p-3 row align-content-around campos text-dark">
                            <div class="col bg-secondary campo p-lg-2 rounded-3">
                                <div class="fw-bold">
                                    Pais:
                                </div>
                                <div>
                                    <?php
                                    if (isset($_POST["editar"])) {
                                        echo "<input class='w-100 rounded-3 ps-1' type='text' name='pais' value='" . $_SESSION['usuario']->pais . "' id='pais'>";
                                    } else {
                                        echo $_SESSION['usuario']->pais;
                                    }
                                    ?>
                                </div>
                                <span id="errorPais" class="noError">El pais solo puede estar compuesto por letras y
                                    espacios (no se admiten acentos, tampoco ñ/ç/similares)</span>
                            </div>
                            <div class="col bg-secondary campo p-lg-2 rounded-3">
                                <div class="fw-bold">Codigo Postal:</div>
                                <div class="">
                                    <?php
                                    if (isset($_POST["editar"])) {
                                        echo "<input class='w-100 rounded-3 ps-1' type='text' name='codigo_postal' value='" . $_SESSION['usuario']->codigo_postal . "' id='cp'>";
                                    } else {
                                        echo $_SESSION['usuario']->codigo_postal;
                                    }
                                    ?>
                                </div>
                                <span id="errorCP" class="noError">El Código Postal solo acepta carácteres alfanuméricos
                                    (no se admiten acentos, tampoco ñ/ç/similares)</span>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST["editar"])) {
                        ?>
                            <div class="p-3 row text-dark justify-content-center">
                                <div class="col-1">
                                    <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <?php include "includes/footer.php" ?>
    <script src="./js/signup.js" type="text/javascript"></script>
</body>

</html>