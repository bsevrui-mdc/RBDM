<?php
function renderCarruselNormal($items)
{
    if (empty($items)) {
        echo "<p>No hay contenido para mostrar.</p>";
        return;
    }
?>
    <div id="carrusel" class="carousel slide carrusel-normal" data-bs-ride="carousel" aria-label="Carrusel de estrenos">
        <!-- Indicadores -->
        <div class="carousel-indicators">
            <?php foreach ($items as $index => $item): ?>
                <button type="button" data-bs-target="#carrusel" data-bs-slide-to="<?= $index; ?>"
                    class="<?= $index === 0 ? 'active' : ''; ?>" aria-label="Ir a la diapositiva <?= $index + 1; ?>">
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Contenido del carrusel -->
        <div class="carousel-inner" aria-live="polite">
            <?php foreach ($items as $index => $item): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>" role="group" aria-roledescription="diapositiva"
                    aria-label="Diapositiva <?= $index + 1; ?> de <?= count($items); ?>">
                    <a href="detalles.php?peli=<?= $item->id ?>">
                        <img src="<?= $item->imagen; ?>" class="img-fluid" alt="<?= htmlspecialchars($item->nombre); ?>">
                        <div class="carousel-caption">
                            <h1><?= $item->nombre; ?></h1>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Controles de navegación -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carrusel" data-bs-slide="prev"
            aria-label="Anterior">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrusel" data-bs-slide="next"
            aria-label="Siguiente">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

<?php
}
?>