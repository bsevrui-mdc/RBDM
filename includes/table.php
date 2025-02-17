
<div class="table-responsive d-none d-lg-block">
    <table class="table table-dark table-borderless">
        <thead>
            <tr>
                <?php foreach($titulos as $key => $titulo): ?>    
                <th><?php echo $titulo; ?></th>
                <?php endforeach?>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($p as $value): ?>
                <tr>
                   <!-- <td class="imgFilms">
                        <img src="<?php echo ($value->imagen); ?>" alt="" class="img-fluid imgTable">
                    </td> -->
                    <?php 
                // Verificamos el tipo de contenido y mostramos las columnas correspondientes
                if ($l == 'pelicula' || $l == 'serie'): ?>
                    <td><?php echo ($value->nombre); ?></td>
                    <td><?php echo ($value->genero); ?></td>
                    <td><?php echo ($value->nota); ?></td>
                <?php elseif ($l == 'usuario'): ?>
                    <!-- Si es usuario, muestra los datos relevantes -->
                    <td><?php echo ($value->nombre); ?></td>
                    <td><?php echo ($value->apellidos); ?></td>
                    <td><?php echo ($value->correo); ?></td>
                    <td><?php echo ($value->tipo); ?></td>
                <?php endif; ?>
                    <td>
                        <div class="col d-flex justify-content-start ">
                            <form action="editar.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                <input type="hidden" name="tipo" value="<?php echo $tabla; ?>">
                                <button name="editar" class="btn-icon"><span class="visually-hidden">editar</span><i class="fa-solid fa-pen" aria-hidden="true"></i></button>
                            </form>
                            <form action="" method="post">
                                <input type="hidden" name="idD" value="<?php echo $value->id; ?>">
                                <input type="hidden" name="tipoD" value="<?php echo $tabla; ?>">
                                <button name="borrar" class="btn-icon2"><span class="visually-hidden">borrar</span><i class="fa-solid fa-trash-can color-trash"></i></button>
                            </form>
                        </div>

                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>