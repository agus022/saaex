<?php require('views/header/header_administrador.php'); ?>
<h1>Dias</h1>
    <?php 
      if (isset($mensaje)) : $app->alerta($tipo,$mensaje);endif;
    ?>
    <a href="dia.php?accion=crear" class="btn btn-success">Nuevo</a>
    <table class="table">
  <thead>
    <tr>
    <th scope="col">Id</th>
      <th scope="col">Dia</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($dias as $dia):?>
    <tr>
        <th scope="row"><?php echo $dia['id_dia']; ?></th>
        <td ><?php echo $dia['dia'];?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="dia.php?accion=actualizar&id=<?php echo $dia['id_dia']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="dia.php?accion=delete&id=<?php echo $dia['id_dia']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php require('views/footer.php'); ?>