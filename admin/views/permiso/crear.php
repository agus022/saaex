<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4 cards-aling"><?php if($accion == "crear"):echo('Nuevo');else: echo('Modicar');endif;?> Permiso</h1>
    
    <div class="card cards-aling " style=" width: 600px;">
        <form method="post" action="permiso.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            <div class="mb-3">
                <label for="permiso" class="form-label">Nombre del permiso</label>
                <input type="text" name="data[permiso] " placeholder="Ingrese el nombre del permiso" value="<?php if(isset($permiso['permiso'])):echo($permiso['permiso']);endif;?>" class="form-control" />
            </div>
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>