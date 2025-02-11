<?php
require_once('funciones.php');
$conn = conectarConBBDD();
try {
    $novedades = $conn->query("select * from contenido order by fecha desc limit 3");
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>

<div class="modal" tabindex="-1" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center modal-title">Novedades</h5>
            </div>
            <div class="modal-body">
                <?php
                while ($fila = $novedades->fetchObject()) {
                ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="<?php echo $fila->imagen ?>" alt="<?php echo $fila->imagen ?>" class="img-fluid h-100">
                        </div>
                        <div class="col-lg-8">
                            Titulo:<div class="titulo"><?php echo $fila->nombre ?></div><br>
                            Genero:<div class="genero"><?php echo $fila->genero ?></div> <br>
                            Fecha de publicacion:<div class="fecha"><?php echo $fila->fecha ?></div> <br>
                        </div>
                    </div><br>
                <?php
                }

                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="aceptarmodal">Aceptar</button>
            </div>
        </div>
    </div>
</div>