<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("includes/head-tags.php"); ?>
    <script src="./js/scripts.js"></script>

</head>

<body class="index">
    <?php include("includes/navbar.php"); ?>
    <main class="my-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/1920x1080" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>Iron Man</h3>
                                    <p class="d-none d-lg-block">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Iure, rerum? Adipisci ut
                                        laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis
                                        quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x1080" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>La casa de papel</h3>
                                    <p class="d-none d-lg-block">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Iure, rerum? Adipisci ut
                                        laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis
                                        quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/1920x1080" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>From</h3>
                                    <p class="d-none d-lg-block">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Iure, rerum? Adipisci ut
                                        laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis
                                        quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="d-flex flex-column h-100">
                        <div class="row d-flex flex-grow-1">
                            <div class="col-4 align-content-center">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h1>Aventura</h1>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                        <div class="row d-flex flex-grow-1">
                            <div class="col-4">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h1>Aventura</h1>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                        <div class="row d-flex flex-grow-1">
                            <div class="col-4">
                                <img src="https://placehold.co/500" class="img-fluid">
                            </div>
                            <div class="col align-content-center">
                                <h1>Aventura</h1>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row multiple d-none d-lg-block">
                <div id="carouselExampleControls" class="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt=""> </div>
                                <div class="card-body">
                                    <h3 class="card-title">Card title 1</h3>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 4</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 5</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 6</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 7</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 8</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 9</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="row multiple d-none d-lg-block">
                <div id="carouselExampleControls" class="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 4</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 5</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 6</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 7</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 8</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper"><img src="https://placehold.co/1920x1080" class="d-block w-100"
                                        alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">Card title 9</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the
                                        card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </main>
    <?php include("includes/footer.php"); ?>
</body>

</html>