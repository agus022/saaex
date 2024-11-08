<?php require('views/header/header_administrador.php'); ?>

    <h1 class="p-4 cards-aling"><?php if($accion == "crear"):echo('Nuevo');else: echo('Modicar');endif;?> Alumno</h1>
    
    <div class="card cards-aling" style=" width: 600px;">
        <form method="post" action="alumno.php?accion=<?php if($accion=="crear"):echo('nuevo');else:echo('modificar&id='.$id);endif;?>" class="p-4">
            
            <div class="mb-3">
                <label for="numero_control" class="form-label">Numero control</label>
                <input type="text" name="data[numero_control] " placeholder="No. de control" value="<?php if(isset($alumnos['numero_control'])):echo($alumnos['numero_control']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="data[nombre] " placeholder="Nombre del alumno" value="<?php if(isset($alumnos['nombre'])):echo($alumnos['nombre']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="primer_apellido" class="form-label">Primer apellido</label>
                <input type="text" name="data[primer_apellido]" placeholder="Primer apellido del alumno" value="<?php if(isset($alumnos['primer_apellido'])):echo($alumnos['primer_apellido']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                <input type="text" name="data[segundo_apellido]" placeholder="Segundo apellido del alumno" value="<?php if(isset($alumnos['segundo_apellido'])):echo($alumnos['segundo_apellido']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="curp" class="form-label">CURP</label>
                <input type="text" name="data[curp]" placeholder="CURP del alumno" value="<?php if(isset($alumnos['curp'])):echo($alumnos['curp']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="semestre" class="form-label">Semestre</label>
                <input type="number" name="data[semestre]" placeholder="Semestre" value="<?php if(isset($alumnos['semestre'])):echo($alumnos['semestre']);endif;?>" class="form-control" />
            </div>
            <div class="mb-3">
                <label>Carrera</label>
                <select name="data[id_carrera]" class="form-select">
                    <?php foreach ($carreras as $carrera):?>
                    <?php
                        $selected = "";
                        if ($alumnos['id_carrera'] == $carrera['id_carrera']){
                            $selected = "selected";
                        }
                            
                    ?>
                    <option value="<?php echo($carrera['id_carrera']);?>" <?php echo($selected)?> ><?php echo($carrera['carrera']);?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-success border-radius-cards" />
        </form>
    </div>
<?php require('views/footer.php'); ?>