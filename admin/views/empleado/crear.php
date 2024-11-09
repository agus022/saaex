<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4"><?php if($accion == "crear"):echo('Nuevo');else: echo('Modicar');endif;?> Empleado</h1>
    <div class="card" style=" width: 600px;">
        <form method="post" action="empleado.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            <div class="mb-3">
                <label for="empleado" class="form-label">Nombre de Empleado</label>
                <input type="text" name="data[nombre] " placeholder="Ingrese nombre del empleado" value="<?php if(isset($empleados['nombre'])):echo($empleados['nombre']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Primer Apellido</label>
                <input type="text" name="data[primer_apellido]" placeholder="Ingrese primer apellido" value="<?php if(isset($empleados['primer_apellido'])):echo($empleados['primer_apellido']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="nivel" class="form-label">Segundo Apellido</label>
                <input type="text" name="data[segundo_apellido]" placeholder="Ingrese segundo apellido"  value="<?php if(isset($empleados['segundo_apellido'])):echo($emplead0s['segundo_apellido']);endif;?>"class="form-control" />
            </div>
            <div class="mb-3">
                <label for="nivel" class="form-label">CURP</label>
                <input type="text" name="data[curp]" placeholder="Ingrese CURP"  value="<?php if(isset($empleados['curp'])):echo($empleados['curp']);endif;?>"class="form-control" />
            </div>
           <!-- <div class="mb-3">
                <label for="nivel" class="form-label">Email</label>
                <input type="text" name="data[email]" placeholder="Ingrese email"  value="<//?php if(isset($empleados['email'])):echo($empleados['email']);endif;?>"class="form-control" />
            </div>-->
            <div class="mb-3">
                <label for="nivel" class="form-label">Id Puesto</label>
                <input type="text" name="data[id_puesto]" placeholder="Ingrese ID del Puesto"  value="<?php if(isset($empleados['id_puesto'])):echo($empleados['id_puesto']);endif;?>"class="form-control" />
            </div>
            <div class="mb-3">
                <label for="nivel" class="form-label">Id Usuario</label>
                <input type="text" name="data[id_usuario]" placeholder="Ingrese ID del Puesto"  value="<?php if(isset($empleados['id_usuario'])):echo($empleados['id_usuario']);endif;?>"class="form-control" />
            </div>
            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>