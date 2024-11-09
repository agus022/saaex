<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4"><?php if($accion == "crear"):echo('Nuevo');else: echo('Modicar');endif;?> Rama</h1>
    <div class="card" style=" width: 600px;">
        <form method="post" action="rama.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            <div class="mb-3">
                <label for="rama" class="form-label">Nombre de rama</label>
                <input type="text" name="data[rama] " placeholder="Ingrese nombre del rama" value="<?php if(isset($ramas['rama'])):echo($ramas['rama']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="data[descripcion]" placeholder="Ingrese Descripcion" value="<?php if(isset($ramas['descripcion'])):echo($ramas['descripcion']);endif;?>" class="form-control" />
            </div>
            
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>