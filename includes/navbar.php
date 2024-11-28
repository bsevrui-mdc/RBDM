<header>
  <nav class="navbar navbar-expand-lg bg-primary text-uppercase" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="/assets/img/logo.png" alt="logo" height="60">
      </a>
      <div class="me-0 d-flex d-lg-none justify-content-center align-items-center">
        <input class="me-2 rounded-2 px-2 w-75 d-none d-lg-block" placeholder="Search..." type="text" name="buscador">
        <i class="fa-solid fa-magnifying-glass mx-3"></i>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <i class="fa-solid fa-bars "></i>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="topPeliculas.php">Películas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="topSeries.php">Series</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="eleccionGenero.php">Géneros</a>
          </li>
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              Usuario
            </a>
            <ul class="dropdown-menu bg-secondary dropdown-menu-end" aria-labelledby="usuarioDropdown">
              <li><a class="dropdown-item item" href="usuario.php">Perfil</a></li>
              <li><a class="dropdown-item item" href="admin.php">Administración</a></li>
              <hr>
              <li><a class="dropdown-item item" href="login.php">Log Out <i class="fa-solid fa-arrow-right-from-bracket icono-Log-Out"></i></a></li>
            </ul>
          </li>
        </ul>
      </div>

      <div class="ms-auto d-lg-flex d-none iconos me-5">
        <input class="me-2 rounded-2 px-2" placeholder="Search..." type="text" name="buscador">
        <i class="fa-solid fa-magnifying-glass me-5"></i>
        <div class="dropdown">
          <a href="#" class="d-inline-block text-white" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user"></i>
          </a>
          <ul class="dropdown-menu bg-secondary dropdown-menu-end">
            <li><a class="dropdown-item" href="usuario.php">Perfil</a></li>
            <li><a class="dropdown-item" href="admin.php">Administracion</a></li>
            <hr>
            <li><a class="dropdown-item" href="login.php">Log Out <i class="fa-solid fa-arrow-right-from-bracket icono-Log-Out"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>