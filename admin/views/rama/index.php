<?php require('views/header/header_administrador.php'); ?>

<div class="p-3 ">
    <h1>Ramas</h1>
    <?php if (isset($mensaje)): $app->alerta($tipo, $mensaje);
    endif ?>
    <a href="rama.php?accion=crear" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo</a>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Rama</th>
                <th scope="col">Descripcion</th>
             
        </thead>
        <tbody>
            <?php foreach ($ramas as $rama): ?>
                <tr>
                    <th scope="row"><?php echo $rama['id_rama']; ?></th>
                    <td><?php echo $rama['rama']; ?></td>
                    <td><?php echo $rama['descripcion']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="rama.php?accion=actualizar&id=<?php echo $rama['id_rama']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</a>
                            <a href="rama.php?accion=eliminar&id=<?php echo $rama['id_rama']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('views/footer.php'); ?>