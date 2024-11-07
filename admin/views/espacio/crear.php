<?php require('views/header/header_administrador.php'); ?>
<h1><?php if($accion == "crear"): echo('Nuevo'); else: echo ('Actualizar'); endif;?> espacio</h1>

<form method="post" 
action="espacio.php?accion=<?php if($accion == "crear"):echo('nuevo'); else:echo('modificar&id='.$id);endif;?>">
<div class="mb-3">
    <label for="exampleespacio" class="form-label">Nombre del espacio</label>
    <input type="text" name="data[espacio]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($espacios['espacio'])):echo($espacios['espacio']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleespacio" class="form-label">Campus</label>
    <input type="text" name="data[campus]" placeholder="Escribe aqui el numero" class="form-control" 
    value="<?php if(isset($espacios['campus'])):echo($espacios['campus']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleespacio" class="form-label">Nombre del edificio</label>
    <input type="text" name="data[edificio]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($espacios['edificio'])):echo($espacios['edificio']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleespacio" class="form-label">Nombre de la sala</label>
    <input type="text" name="data[sala]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($espacios['sala'])):echo($espacios['sala']);endif;?>" />
</div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-outline-info"/>
</form>
<?php require('views/footer.php'); ?>