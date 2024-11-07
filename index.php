<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("includes/head-tags.php"); ?>
    </head>
    <body>
        <?php include("includes/navbar.php"); ?>
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <!-- Carousel -->
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">
                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                            </div>
                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://placehold.co/1920x1080" class="d-block" style="width:100%">
                                    <div class="carousel-caption">
                                    <h3>Iron Man</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, rerum? Adipisci ut laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://placehold.co/1920x1080" class="d-block" style="width:100%">
                                    <div class="carousel-caption">
                                    <h3>La casa de papel</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, rerum? Adipisci ut laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                    </div> 
                                </div>
                                <div class="carousel-item">
                                    <img src="https://placehold.co/1920x1080" alt="New York" class="d-block" style="width:100%">
                                    <div class="carousel-caption">
                                    <h3>From</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, rerum? Adipisci ut laboriosam ipsam repellendus maiores enim velit nostrum tenetur? Facilis quibusdam, delectus odit tenetur laudantium molestiae accusamus quisquam at.</p>
                                    </div>  
                                </div>
                            </div>
                            <!-- Left and right controls/icons -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-4">
                                <img src="https://placehold.co/1920x1080" class="d-block" style="width:100%">
                            </div>
                            <div class="col">
                                <h2>Aventura</h2>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <img src="https://placehold.co/1920x1080" class="d-block" style="width:100%">
                            </div>
                            <div class="col">
                                <h2>Aventura</h2>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <img src="https://placehold.co/1920x1080" class="d-block" style="width:100%">
                            </div>
                            <div class="col">
                                <h2>Aventura</h2>
                                <p>Género: Drama</p>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
    </body>
</html>