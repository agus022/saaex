<?php require('views/header/header_administrador.php'); ?>

<div class="p-3 ">
    <h1>Periodos</h1>
    <?php if (isset($mensaje)): $app->alerta($tipo, $mensaje);
    endif ?>
    <a href="periodo.php?accion=crear" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo</a>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Fecha Inicial</th>
                <th scope="col">Fecha Final</th>
             
        </thead>
        <tbody>
            <?php foreach ($periodos as $periodo): ?>
                <tr>
                    <th scope="row"><?php echo $periodo['id_periodo']; ?></th>
                    <td><?php echo $periodo['fecha_inicial']; ?></td>
                    <td><?php echo $periodo['fecha_final']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="periodo.php?accion=actualizar&id=<?php echo $periodo['id_periodo']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</a>
                            <a href="periodo.php?accion=eliminar&id=<?php echo $periodo['id_periodo']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('views/footer.php'); ?>