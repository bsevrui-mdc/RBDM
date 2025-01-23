<header>
  <nav class="px-3 container-fluid navbar navbar-expand-lg bg-primary text-uppercase" id="mainNav">
    <a class="navbar-brand" href="index.php">
      <img src="/assets/img/logo.png" alt="logo">

    </a>
    <!-- Navbar <lg -->
    <div class="me-0 d-flex d-lg-none justify-content-center align-items-center">
      <a href="" class="mx-3"><i class="fa-solid fa-magnifying-glass"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <i class="fa-solid fa-bars "></i>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="topPeliculas.php">Películas</a></li>
        <li class="nav-item"><a class="nav-link" href="topSeries.php">Series</a></li>
        <li class="nav-item"><a class="nav-link" href="eleccionGenero.php">Géneros</a></li>
        <li class="d-lg-none nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">Usuario</a>
          <ul class="dropdown-menu bg-secondary dropdown-menu-end menuDropdown"
            aria-labelledby="usuarioDropdown">
            <?php
            if (isset($_SESSION['usuario'])) {
              if ($_SESSION['usuario']->tipo == 'admin') {
            ?>
                <li><a class="dropdown-item item" href="admin.php">Administracion</a></li>
              <?php } ?>
              <li><a class="dropdown-item item" href="usuario.php">Perfil</a></li>
              <hr>
              <li><a class="dropdown-item item" href="logout.php">Log Out <i
                    class="fa-solid fa-arrow-right-from-bracket icono-Log-Out"></i></a></li>
            <?php

            } else {
            ?>
              <li><a class="dropdown-item item" href="login.php">Iniciar sesion</a></li>
              <li><a class="dropdown-item item" href="login.php">Registrarse</a></li>

            <?php } ?>

          </ul>
        </li>
      </ul>
    </div>
    <!-- Navbar >=lg -->
    <div class="d-none d-lg-flex me-5 align-items-center ms-auto iconos">
      <input class="me-2" type="text" placeholder="Buscar..." name="buscador">
      <a href="" class="ms-3 me-4"><i class="fa-solid fa-magnifying-glass"></i></a>
      <div class="dropdown">
        <?php
        if (!isset($_SESSION["usuario"]->imagen)) { ?>
          <a href="#" class="text-white d-inline-block" data-bs-toggle="dropdown" aria-expanded="false"><i
              class="fa-solid fa-user"></i></a>
        <?php
        } else {
        ?>
          <img src="<?php echo $_SESSION['usuario']->imagen ?>" data-bs-toggle="dropdown" class="rounded-circle">
        <?php
        }
        ?>
        <ul class="dropdown-menu bg-secondary dropdown-menu-end menuDropdown">
          <?php
          if (isset($_SESSION['usuario'])) {
          ?>
            <li><a class="dropdown-item" href="usuario.php">Perfil</a></li>
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
  </nav>
</header>