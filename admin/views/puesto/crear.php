<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4"><?php if($accion == "crear"):echo('Nuevo');else: echo('Modicar');endif;?> Puesto</h1>
    <div class="card" style=" width: 600px;">
        <form method="post" action="puesto.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            <div class="mb-3">
                <label for="puesto" class="form-label">Nombre de Puesto</label>
                <input type="text" name="data[puesto] " placeholder="Ingrese nombre del puesto" value="<?php if(isset($puestos['puesto'])):echo($puestos['puesto']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="data[descripcion]" placeholder="Ingrese descripcion del puesto" value="<?php if(isset($puestos['descripcion'])):echo($puestos['descripcion']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="nivel" class="form-label">Nivel</label>
                <input type="text" name="data[nivel]" placeholder="Ingrese nivel"  value="<?php if(isset($puestos['nivel'])):echo($puestos['nivel']);endif;?>"class="form-control" />
            </div>
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>