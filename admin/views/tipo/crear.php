<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4"><?php if($accion == "crear"):echo('Nuevo');else: echo('Modicar');endif;?> tipo</h1>
    <div class="card" style=" width: 600px;">
        <form method="post" action="tipo.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" name="data[tipo] " placeholder="Ingrese Tipo" value="<?php if(isset($tipos['tipo'])):echo($tipos['tipo']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="data[descripcion]" placeholder="Ingrese Descripcion" value="<?php if(isset($tipos['descripcion'])):echo($tipos['descripcion']);endif;?>" class="form-control" />
            </div>
            
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>