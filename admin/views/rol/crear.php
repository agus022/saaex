<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4 cards-aling"><?php if($accion == "crear"):echo('Nuevo');else: echo('Modicar');endif;?> Rol</h1>
    
    <div class="card cards-aling " style=" width: 600px;">
        <form method="post" action="rol.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            <div class="mb-3">
                <label for="rol" class="form-label">Nombre del rol</label>
                <input type="text" name="data[rol] " placeholder="Ingrese el nombre del rol" value="<?php if(isset($rol['rol'])):echo($rol['rol']);endif;?>" class="form-control" />
            </div>
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>