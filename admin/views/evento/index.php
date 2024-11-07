<?php require('views/header/header_administrador.php'); ?>
<h1>Evento</h1>
    <?php 
      if (isset($mensaje)) : $app->alert($tipo,$mensaje);endif;
    ?>
    <a href="evento.php?accion=crear" class="btn btn-success">Nuevo</a>
    <table class="table">
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Evento</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Hora inicio</th>
        <th scope="col">Hora termino</th>
        <th scope="col">Lugar</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Estado</th>
        <th scope="col">Pais</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($eventos as $evento):?>
    <tr>
        <th scope="row"><?php echo $evento['id_evento']; ?></th>
        <td ><?php echo $evento['evento'];?></td>
        <td ><?php echo $evento['descripcion'];?></td>
        <td ><?php echo $evento['hora_inicio'];?></td>
        <td ><?php echo $evento['hora_termino'];?></td>
        <td ><?php echo $evento['lugar'];?></td>
        <td ><?php echo $evento['ciudad'];?></td>
        <td ><?php echo $evento['estado'];?></td>
        <td ><?php echo $evento['pais'];?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="evento.php?accion=actualizar&id=<?php echo $evento['id_evento']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="evento.php?accion=delete&id=<?php echo $evento['id_evento']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php require('views/footer.php'); ?>