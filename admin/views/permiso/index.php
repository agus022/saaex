<?php require('views/header/header_administrador.php'); ?>

<div class="p-3 ">
    <h1>Permisos</h1>
    <?php if (isset($mensaje)): $app->alerta($tipo, $mensaje);
    endif ?>
    <a href="permiso.php?accion=crear" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo</a>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nombre del permiso</th>
                <th scope="col">Opciones</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($permisos as $permiso): ?>
                <tr>
                    <th scope="row"><?php echo $permiso['id_permiso']; ?></th>
                    <td><?php echo $permiso['permiso']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="permiso.php?accion=actualizar&id=<?php echo $permiso['id_permiso']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</a>
                            <a href="permiso.php?accion=eliminar&id=<?php echo $permiso['id_permiso']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('views/footer.php'); ?>