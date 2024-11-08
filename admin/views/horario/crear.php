<?php require('views/header/header_administrador.php'); ?>
<h1><?php if($accion == "crear"): echo('Nuevo'); else: echo ('Actualizar'); endif;?> horario</h1>

<form method="post" 
action="horario.php?accion=<?php if($accion == "crear"):echo('nuevo'); else:echo('modificar&id='.$id);endif;?>">
<div class="mb-3">
    <label for="examplehorario" class="form-label">Hora de inicio</label>
    <input type="time" name="data[hora_inicio]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($horarios['hora_inicio'])):echo($horarios['hora_inicio']);endif;?>" />
</div>
<div class="mb-3">
    <label for="examplehorario" class="form-label">Hora de termino</label>
    <input type="time" name="data[hora_termino]" placeholder="Escribe aqui el numero" class="form-control" 
    value="<?php if(isset($horarios['hora_termino'])):echo($horarios['hora_termino']);endif;?>" />
</div>
<div class="mb-3">
    <label for="">Dia</label>
    <select name="data[id_dia]" id="" class="form-select form-select-sm" aria-label="Small select example">
    <option>Dias disponibles</option>
        <?php foreach($dias as $dia):?>
        <?php 
        $selecionar = "";
        if($secciones['id_dia'] == $dia['id_dia']){
            $selecionar = "selected";
        }        
        ?>
        <option value="<?php echo($dia['id_dia']);?>"<?php echo($selecionar);?>><?php echo($dia['dia']);?></option>
        <?php endforeach;?>
    </select>
</div>
<div class="mb-3">
    <label for="">Grupo</label>
    <select name="data[id_grupo]" id="" class="form-select form-select-sm" aria-label="Small select example">
    <option>Grupos disponibles</option>
        <?php foreach($grupos as $grupo):?>
        <?php 
        $selecionar = "";
        if($secciones['id_grupo'] == $grupo['id_grupo']){
            $selecionar = "selected";
        }        
        ?>
        <option value="<?php echo($grupo['id_grupo']);?>"<?php echo($selecionar);?>><?php echo($grupo['id_grupo']);?></option>
        <?php endforeach;?>
    </select>
</div>
<div class="mb-3">
    <label for="">Espacio</label>
    <select name="data[id_espacio]" id="" class="form-select form-select-sm" aria-label="Small select example">
    <option>Espacios disponibles</option>
        <?php foreach($espacios as $espacio):?>
        <?php 
        $selecionar = "";
        if($secciones['id_espacio'] == $espacio['id_espacio']){
            $selecionar = "selected";
        }        
        ?>
        <option value="<?php echo($espacio['id_espacio']);?>"<?php echo($selecionar);?>><?php echo($espacio['espacio']);?></option>
        <?php endforeach;?>
    </select>
</div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-outline-info"/>
</form>
<?php require('views/footer.php'); ?>