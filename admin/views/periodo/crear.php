<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4"><?php if($accion == "crear"):echo('Nuevo');else: echo('Modicar');endif;?> periodo</h1>
    <div class="card" style=" width: 600px;">
        <form method="post" action="periodo.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            <div class="mb-3">
                <label for="periodo" class="form-label">Fecha Inicial</label>
                <input type="date" name="data[fecha_inicial] " placeholder="Ingrese fecha inicial" value="<?php if(isset($periodos['fecha_inicial'])):echo($periodos['fecha_inicial']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="fecha_final" class="form-label">Fecha Final</label>
                <input type="date" name="data[fecha_final]" placeholder="Ingrese fecha final" value="<?php if(isset($periodos['fecha_final'])):echo($periodos['fecha_final']);endif;?>" class="form-control" />
            </div>
            
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>