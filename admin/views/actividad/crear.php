<?php require('views/header/header_administrador.php'); ?>
<h1><?php if($accion == "crear"): echo('Nuevo'); else: echo ('Actualizar'); endif;?> Actividad</h1>

<form method="post" 
action="actividad.php?accion=<?php if($accion == "crear"):echo('nuevo'); else:echo('actualizar&id='.$id);endif;?>">
<div class="mb-3">
    <label for="exampleactividad" class="form-label">Nombre de la actividad</label>
    <input type="text" name="data[actividad]" placeholder="Escribe aqui el nombre" class="form-control" 
    value="<?php if(isset($actividades['actividad'])):echo($actividades['actividad']);endif;?>" />
</div>
<div class="mb-3">
    <label for="exampleactividad" class="form-label">Descripcion</label>
    <input type="text" name="data[descripcion]" placeholder="Escribe aqui el numero" class="form-control" 
    value="<?php if(isset($actividades['descripcion'])):echo($actividades['descripcion']);endif;?>" />
</div>
<div class="mb-3">
    <label for="">Tipo</label>
    <select name="data[id_tipo]" id="" class="form-select form-select-sm" aria-label="Small select example">
    <option>tipos disponibles</option>
        <?php foreach($tipos as $tipo):?>
        <?php 
        $selecionar = "";
        if($actividades['id_tipo'] == $tipo['id_tipo']){
            $selecionar = "selected";
        }        
        ?>
        <option value="<?php echo($tipo['id_tipo']);?>"<?php echo($selecionar);?>><?php echo($tipo['tipo']);?></option>
        <?php endforeach;?>
    </select>
</div>
    <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-outline-info"/>
</form>
<?php require('views/footer.php'); ?>