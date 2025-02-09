<?php
function renderCarruselMultiple($movies)
{
    if (empty($movies)) {
        echo "<p>No hay contenido para mostrar.</p>";
        return;
    }
?>
<div id="carouselExampleControls" class="carousel carrusel-multiple">
    <div class="carousel-inner">
        <?php
            foreach ($movies as $index => $movie) {
                $activeClass = ($index === 0) ? 'active' : ''; // La primera imagen debe tener 'active'
                echo "<div class='carousel-item multiple-item $activeClass'>
                        <div class='position-relative'>
                            <a href='detalles.php?peli=$movie->id'>
                                <img src='$movie->imagen' class='img-fluid' alt='Imagen'>
                                <h2 class='overlay-text position-absolute bottom-0 w-100 text-center text-white p-3'>
                                    $movie->nombre
                                </h2>
                            </a>
                        </div>
                      </div>";
            }
            ?>
    </div>
    <button class="carousel-control-prev multiple-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="fa-solid fa-arrow-left" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next multiple-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="fa-solid fa-arrow-right" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<?php
}
?>