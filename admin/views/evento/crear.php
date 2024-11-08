<?php require('views/header/header_administrador.php'); ?>
<h1><?php if($accion == "crear"): echo('Nuevo'); else: echo ('Actualizar'); endif;?> Evento</h1>

<form method="post" 
action="evento.php?accion=<?php if($accion == "crear"):echo('nuevo'); else:echo('modificar&id='.$id);endif;?>">
<?php if ($accion == "crear"): ?>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Codigo del evento</label>
    <input type="text" name="data[id_evento]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($eventos['id_evento'])):echo($eventos['id_evento']);endif;?>" />
</div>
<?endif;?>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Nombre del evento</label>
    <input type="text" name="data[evento]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($eventos['evento'])):echo($eventos['evento']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Descripcion</label>
    <input type="text" name="data[descripcion]" placeholder="Escribe aqui la descripcion" class="form-control" 
    value="<?php if(isset($eventos['descripcion'])):echo($eventos['descripcion']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Hora de inicio</label>
    <input type="datetime-local" name="data[hora_inicio]" placeholder="Escribe aqui la hora" class="form-control" 
    value="<?php if(isset($eventos['hora_inicio'])):echo($eventos['hora_inicio']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Hora de termino</label>
    <input type="datetime-local" name="data[hora_termino]" placeholder="Escribe aqui la hora" class="form-control" 
    value="<?php if(isset($eventos['hora_termino'])):echo($eventos['hora_termino']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Nombre del lugar</label>
    <input type="text" name="data[lugar]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($eventos['lugar'])):echo($eventos['lugar']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Nombre de la ciudad</label>
    <input type="text" name="data[ciudad]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($eventos['ciudad'])):echo($eventos['ciudad']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Nombre del estado</label>
    <input type="text" name="data[estado]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($eventos['estado'])):echo($eventos['estado']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleevento" class="form-label">Nombre del pais</label>
    <input type="text" name="data[pais]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($eventos['pais'])):echo($eventos['pais']);endif;?>" />
</div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-outline-info"/>
</form>
<?php require('views/footer.php'); ?>