<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
<div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img
              src="./img/DALL_E-2024-10-07-10.35-removebg-preview.png"
              alt="logo"
              height="60"
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mynavbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Item 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Item 2</a>
              </li>
              <li class="nav-item dropdown ">
                <a
                  class="nav-link dropstart dropdown-toggle"
                  href="#"
                  data-bs-toggle="dropdown"
                  >Item 3</a
                >
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Item 3.1</a></li>
                  <li><a class="dropdown-item" href="#">Item 3.2</a></li>
                  <li><a class="dropdown-item" href="#">Item 3.3</a></li>
                </ul>
              </li>
            </ul>

            <form class="d-flex">
              <input
                class="form-control me-2"
                type="text"
                placeholder="Search"
              />
              <button
                type="button"
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdrop"
              >
                Login
              </button>

              <!-- Modal -->
              <div
                class="modal fade"
                id="staticBackdrop"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">
                        Modal title
                      </h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">Pulsa aceptar para salir</div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-success"
                        data-bs-dismiss="modal"
                      >
                        Aceptar
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
</nav>