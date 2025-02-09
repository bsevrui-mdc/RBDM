<?php
function renderCarruselNormal($items)
{
    if (empty($items)) {
        echo "<p>No hay contenido para mostrar.</p>";
        return;
    }
?>
<div id="demo" class="carousel slide carrusel-normal" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <?php
            foreach ($items as $index => $item):
            ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
            <a href="detalles.php?peli=<?= $item->id ?>">
                <img src="<?= $item->imagen; ?>" class="img-fluid">
                <div class="carousel-caption">
                    <h1>
                        <?= $item->nombre; ?>
                    </h1>
                </div>
            </a>
        </div>
        <?php
            endforeach;
            ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<?php
}
?>