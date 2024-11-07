<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4"><?php if($accion == "crear"):echo('Nueva');else: echo('Modicar');endif;?> Carrera</h1>
    <div class="card" style=" width: 600px;">
        <form method="post" action="carrera.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            <div class="mb-3">
                <label for="clave_oficial" class="form-label">Clave oficial</label>
                <input type="text" name="data[clave_oficial] " placeholder="Ingrese la clave oficial" value="<?php if(isset($carreras['clave_oficial'])):echo($carreras['clave_oficial']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="carrera" class="form-label">Carrera</label>
                <input type="text" name="data[carrera]" placeholder="Ingrese nombre de la carrera" value="<?php if(isset($carreras['carrera'])):echo($carreras['carrera']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha inicio</label>
                <input type="date" name="data[fecha_inicio]" placeholder="Ingrese la fecha"  value="<?php if(isset($carreras['fecha_inicio'])):echo($carreras['fecha_inicio']);endif;?>"class="form-control" />
            </div>
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>