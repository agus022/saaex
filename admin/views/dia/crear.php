<?php require('views/header/header_administrador.php'); ?>
<h1><?php if($accion == "crear"): echo('Nuevo'); else: echo ('Actualizar'); endif;?> dia</h1>

<form method="post" 
action="dia.php?accion=<?php if($accion == "crear"):echo('nuevo'); else:echo('modificar&id='.$id);endif;?>">
<div class="mb-3">
    <label for="exampledia" class="form-label">Nombre del dia</label>
    <input type="text" name="data[dia]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($dias['dia'])):echo($dias['dia']);endif;?>" />
</div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-outline-info"/>
</form>
<?php require('views/footer.php'); ?>