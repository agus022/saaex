<?php require('views/header/header_administrador.php'); ?>

<div class="p-3 ">
    <h1>Alumnos</h1>
    <?php if (isset($mensaje)): $app->alerta($tipo, $mensaje);
    endif ?>
    <a href="alumno.php?accion=crear" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo</a>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer apellido</th>
                <th scope="col">Segundo apellido</th>
                <th scope="col">CURP</th>
                <th scope="col">Semestre</th>
                <th scope="col">Carrera</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
                <tr>
                    <th scope="row"><?php echo $alumno['numero_control']; ?></th>
                    <td><?php echo $alumno['nombre']; ?></td>
                    <td><?php echo $alumno['primer_apellido']; ?></td>
                    <td><?php echo $alumno['segundo_apellido']; ?></td>
                    <td><?php echo $alumno['curp']; ?></td>
                    <td><?php echo $alumno['semestre']; ?></td>
                    <td><?php echo $alumno['carrera']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="alumno.php?accion=actualizar&id=<?php echo $alumno['numero_control']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</a>
                            <a href="alumno.php?accion=eliminar&id=<?php echo $alumno['numero_control']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('views/footer.php'); ?>