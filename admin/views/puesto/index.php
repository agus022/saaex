<?php require('views/header/header_administrador.php'); ?>

<div class="p-3 ">
    <h1>Puesto</h1>
    <?php if (isset($mensaje)): $app->alerta($tipo, $mensaje);
    endif ?>
    <a href="puesto.php?accion=crear" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo</a>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Nivel</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($puestos as $puesto): ?>
                <tr>
                    <th scope="row"><?php echo $puesto['id_puesto']; ?></th>
                    <td><?php echo $puesto['puesto']; ?></td>
                    <td><?php echo $puesto['descripcion']; ?></td>
                    <td><?php echo $puesto['nivel']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="puesto.php?accion=actualizar&id=<?php echo $puesto['id_puesto']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</a>
                            <a href="puesto.php?accion=eliminar&id=<?php echo $puesto['id_puesto']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('views/footer.php'); ?>