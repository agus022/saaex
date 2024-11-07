<?php require('views/header/header_administrador.php'); ?>
<h1>Dias</h1>
    <?php 
      if (isset($mensaje)) : $app->alert($tipo,$mensaje);endif;
    ?>
    <a href="dia.php?accion=crear" class="btn btn-success">Nuevo</a>
    <table class="table">
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Espacio</th>
        <th scope="col">Campus</th>
        <th scope="col">Edificio</th>
        <th scope="col">Sala</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($espacios as $espacio):?>
    <tr>
        <th scope="row"><?php echo $dia['id_espacio']; ?></th>
        <td ><?php echo $espacio['espacio'];?></td>
        <td ><?php echo $espacio['campus'];?></td>
        <td ><?php echo $espacio['edificio'];?></td>
        <td ><?php echo $espacio['sala'];?></td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <a href="espacio.php?accion=actualizar&id=<?php echo $espacio['id_espacio']; ?>" class="btn btn-warning">Actualizar</a>
                <a href="espacio.php?accion=delete&id=<?php echo $espacio['id_espacio']; ?>" class="btn btn-danger">Eliminar</a>
            </div>
        </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
<?php require('views/footer.php'); ?>