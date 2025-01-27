
<div class="table-responsive d-none d-lg-block">
    <table class="table table-dark table-borderless">
        <thead>
            <tr>
                <th></th>
                <?php foreach($titulos as $key => $titulo): ?>
                <th><?php echo $titulo; ?></th>
                <?php endforeach?>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($p as $value): ?>
                <tr>
                    <td class="imgFilms">
                        <img src="<?php echo ($value->imagen); ?>" alt="" class="img-fluid imgTable">
                    </td>
                    <?php
                // Verificamos el tipo de contenido y mostramos las columnas correspondientes
                if ($l == 'pelicula' || $l == 'serie'): ?>
                    <td><?php echo ($value->nombre); ?></td>
                    <td><?php echo ($value->genero); ?></td>
                    <td><?php echo ($value->fecha); ?></td>
                <?php elseif ($l == 'usuario'): ?>
                    <!-- Si es usuario, muestra los datos relevantes -->
                    <td><?php echo ($value->nombre); ?></td>
                    <td><?php echo ($value->apellidos); ?></td>
                    <td><?php echo ($value->correo); ?></td>
                <?php endif; ?>
                    <td>
                        <i class="fa-solid fa-pen"></i>
                        <i class="fa-solid fa-trash-can color-trash"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>