<header>
    <nav class="px-3 container-fluid navbar navbar-expand-lg bg-primary text-uppercase" id="mainNav">
        <a class="navbar-brand" href="index.php">
            <img src="/assets/img/logo.png" alt="logo de RBDM">

        </a>
        <!-- Navbar <lg -->
        <div class="me-0 d-flex d-lg-none justify-content-center align-items-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar"
                aria-label="Menu desplegable">
                <i class="fa-solid fa-bars "></i>
            </button>
            <div class="ms-3 dropdown">
                <?php
                if (!isset($_SESSION["usuario"]->imagen)) { ?>
                    <button class="text-white d-inline-block" data-bs-toggle="dropdown" aria-expanded="false"
                        aria-label="Opciones Usuario" tabindex="0">
                        <i class="fa-solid fa-user" aria-hidden="true" tabindex="0"></i>
                    </button>
                <?php
                } else {
                ?>
                    <img src="<?php echo $_SESSION['usuario']->imagen ?>" alt="Foto de perfil" data-bs-toggle="dropdown" class="rounded-circle">
                <?php
                }

                ?>
                <ul class="dropdown-menu bg-secondary dropdown-menu-end menuDropdown">
                    <?php
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <li><a class="dropdown-item" href="usuario.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="listaUsuario.php">Lista de usuario</a></li>
                        <?php
                        if ($_SESSION['usuario']->tipo == "admin") {
                        ?>
                            <li><a class="dropdown-item" href="admin.php">Administracion</a></li>
                        <?php
                        }
                        ?>
                        <hr>
                        <li><a class="dropdown-item" href="logout.php">Cerrar Sesión <i
                                    class="fa-solid fa-arrow-right-from-bracket icono-Log-Out"></i></a></li>
                    <?php
                    } else {
                    ?>
                        <li><a class="dropdown-item" href="login.php">Iniciar Sesión</a></li>
                        <li><a class="dropdown-item" href="signup.php">Registrarse</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item focus-visible"><a class="outline-none nav-link focus-visible"
                        href="topPeliculas.php">Películas</a></li>
                <li class="nav-item focus-visible"><a class="outline-none nav-link focus-visible"
                        href="topSeries.php">Series</a></li>
                <li class="nav-item focus-visible"><a class="outline-none nav-link focus-visible"
                        href="eleccionGenero.php">Géneros</a></li>

            </ul>
        </div>
        <!-- Navbar >=lg -->
        <div class="d-none d-lg-flex me-5 align-items-center ms-auto iconos">


            <div class="dropdown">
                <?php if (!isset($_SESSION["usuario"]->imagen)) { ?>
                    <a class="text-white d-inline-block" data-bs-toggle="dropdown" aria-expanded="false"
                        aria-label="Opciones Usuario" tabindex="0">
                        <i class="fa-solid fa-user"></i>
                        <span class="visually-hidden">Opciones usuario</span>
                    </a>
                <?php } else { ?>
                    <button class="p-0 bg-transparent border-0" data-bs-toggle="dropdown" aria-expanded="false"
                        tabindex="0" role="button">
                        <img src="<?php echo $_SESSION['usuario']->imagen ?>" class="rounded-circle"
                            alt="imagen de usuario">
                    </button>
                <?php } ?>

                <ul class="dropdown-menu bg-secondary dropdown-menu-end menuDropdown">
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <li><a class="dropdown-item" href="usuario.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="listaUsuario.php">Lista de usuario</a></li>
                        <?php if ($_SESSION['usuario']->tipo == "admin") { ?>
                            <li><a class="dropdown-item" href="admin.php">Administracion</a></li>
                        <?php } ?>
                        <hr>
                        <li><a class="dropdown-item" href="logout.php">Cerrar Sesión <i
                                    class="fa-solid fa-arrow-right-from-bracket icono-Log-Out"></i></a></li>
                    <?php } else { ?>
                        <li><a class="dropdown-item" href="login.php" tabindex="0">Iniciar Sesión</a></li>
                        <li><a class="dropdown-item" href="signup.php" tabindex="0">Registrarse</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>