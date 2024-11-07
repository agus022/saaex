<?php require('views/header/header_administrador.php'); ?>

<div class="p-3 ">
    <h1>Carrera</h1>
    <?php if (isset($mensaje)): $app->alerta($tipo, $mensaje);
    endif ?>
    <a href="carrera.php?accion=crear" class="btn btn-success"><i class="bi bi-plus-circle"></i> Nuevo</a>
    <table class="table table-hover">
        <thead>

            <tr>
                <th scope="col">#ID</th>
                <th scope="col">CVE Oficial</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fehca inicio</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carreras as $carrera): ?>
                <tr>
                    <th scope="row"><?php echo $carrera['id_carrera']; ?></th>
                    <td><?php echo $carrera['clave_oficial']; ?></td>
                    <td><?php echo $carrera['carrera']; ?></td>
                    <td><?php echo $carrera['fecha_inicio']; ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="carrera.php?accion=actualizar&id=<?php echo $carrera['id_carrera']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Actualizar</a>
                            <a href="carrera.php?accion=eliminar&id=<?php echo $carrera['id_carrera']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require('views/footer.php'); ?>