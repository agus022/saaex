<?php
include ('horario.class.php');
$app = new horario;
$accion = (isset($_GET['accion']) ? $_GET['accion'] : null); 
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion){
    case 'crear':
        $dias = $app -> readAllDias(); 
        $grupos = $app -> readAllGrupo();
        $espacios = $app -> readAllEspacio();
        include "views/horario/crear.php";
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $result= $app -> create($data);
        if($result){
            $mensaje = "La sección ha sido registrada.";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error, no se pudo registar correctamente.";
            $tipo = "danger";
        }
        $horarios = $app -> readAll();
        include "views/horario/index.php";
        break;
    case 'modificar':
        $horarios = $app -> readOne($id);
        $dias = $app -> readAllDias();
        $grupos = $app -> readAllGrupo();
        $espacios = $app -> readAllEspacio();
        include "views/horario/crear.php";
        break;
    case 'actualizar':
        $data = $_POST['data'];
        $result= $app->update($id, $data);
        if($result){
            $mensaje = "La sección ha sido actualizada.";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error, no se pudo actualizar.";
            $tipo = "danger";
        }
        $horarios = $app -> readAll();
        include "views/horario/index.php";
        break;
    case 'eliminar':
        $id = (isset($_GET['id'])) ? $_GET['id'] : null;
        if(!is_null($id)){
            if(is_numeric($id)){
                $result= $app->delete($id);
                if($result){
                    $mensaje = "La sección se ha eliminado correctamente.";
                    $tipo = "success";
                } else {
                    $mensaje = "Hubo un error, no se pudo borrar la sección.";
                    $tipo = "danger";
                }
            } 
        }
        $horarios = $app -> readAll();
        include "views/horario/index.php";
        break;
    default:
        $horarios = $app->readAll();
        include "views/horario/index.php";
}
?>