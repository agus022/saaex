<?php require('views/header/header_administrador.php'); ?>
<h1>Actividad</h1>
    <?php 
      if (isset($mensaje)) : $app->alert($tipo,$mensaje);endif;
    ?>
    <a href="actividad.php?accion=crear" class="btn btn-success">Nuevo</a>
    <table class="table">
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Actividad</th>
        <th scope="col">Tipo</th>
        <th scope="col">Descripcion</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($actividades as $actividad):?>
    <tr>
        <th scope="row"><?php echo $actividad['id_actividad']; ?></th>
        <td ><?php echo $actividad['actividad'];?></td>
        <td ><?php echo $actividad['tipo'];?></td>
        <td ><?php echo $actividad['descripcion'];?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="actividad.php?accion=actualizar&id=<?php echo $actividad['id_actividad']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="actividad.php?accion=delete&id=<?php echo $actividad['id_actividad']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php require('views/footer.php'); ?>