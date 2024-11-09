<?php require('views/header/header_administrador.php'); ?>

<div class="p-3 ">
    <h1>Empleados</h1>
    <?php if (isset($mensaje)): $app->alerta($tipo, $mensaje);
    endif ?>
    <a href="empleado.php?accion=crear" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo</a>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">CURP</th>
                <!--<th scope="col">Email</th>-->
                <th scope="col">Id Puesto</th>
                <th scope="col">Id Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <th scope="row"><?php echo $empleado['id_empleado']; ?></th>
                    <td><?php echo $empleado['nombre']; ?></td>
                    <td><?php echo $empleado['primer_apellido']; ?></td>
                    <td><?php echo $empleado['segundo_apellido']; ?></td>
                    <td><?php echo $empleado['curp']; ?></td>
                    <!--<td><//?php echo $empleado['email']; ?></td>-->
                    <td><?php echo $empleado['id_puesto']; ?></td>
                    <td><?php echo $empleado['id_usuario']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="empleado.php?accion=actualizar&id=<?php echo $empleado['id_empleado']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</a>
                            <a href="empleado.php?accion=eliminar&id=<?php echo $empleado['id_empleado']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('views/footer.php'); ?>