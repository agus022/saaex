<?php require('views/header/header_administrador.php'); ?>
<h1>Horario</h1>
    <?php 
      if (isset($mensaje)) : $app->alerta($tipo,$mensaje);endif;
    ?>
    <a href="horario.php?accion=crear" class="btn btn-success">Nuevo</a>
    <table class="table">
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Horario</th>
        <th scope="col">Dia</th>
        <th scope="col">Actividad</th>
        <th scope="col">Rama</th>
        <th scope="col">Edificio</th>
        <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($horarios as $horario):?>
    <tr>
        <th scope="row"><?php echo $horario['id_sesion_dia']; ?></th>
        <td ><?php echo $horario['horario'];?></td>
        <td ><?php echo $horario['dia'];?></td>
        <td ><?php echo $horario['actividad'];?></td>
        <td ><?php echo $horario['rama'];?></td>
        <td ><?php echo $horario['edificio'];?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="horario.php?accion=modificar&id=<?php echo $horario['id_sesion_dia']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="horario.php?accion=delete&id=<?php echo $horario['id_sesion_dia']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php require('views/footer.php'); ?>