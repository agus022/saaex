<?php require('views/header/header_administrador.php'); ?>

<div class="p-3 ">
    <h1>Tipos</h1>
    <?php if (isset($mensaje)): $app->alerta($tipo, $mensaje);
    endif ?>
    <a href="tipo.php?accion=crear" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo</a>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descripcion</th>
             
        </thead>
        <tbody>
            <?php foreach ($tipos as $tipo): ?>
                <tr>
                    <th scope="row"><?php echo $tipo['id_tipo']; ?></th>
                    <td><?php echo $tipo['tipo']; ?></td>
                    <td><?php echo $tipo['descripcion']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="tipo.php?accion=actualizar&id=<?php echo $tipo['id_tipo']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</a>
                            <a href="tipo.php?accion=eliminar&id=<?php echo $tipo['id_tipo']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('views/footer.php'); ?>