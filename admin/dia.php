<?php 
include('dia.class.php');
$app = new dia;
$accion=(isset($_GET['accion'])) ? $_GET['accion'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch($accion){
    case 'actualizar':
        $dias = $app -> readOne($id); 
        $dias = $dias[0];
        include('views/dia/crear.php');
        break;
    case 'modificar':
        $data= $_POST['data'];
        $result=$app->update($id,$data);
        if($result){
            $mensaje="El dia se actualizo";
            $tipo="success";
        }else{
            $mensaje="No se actualizo";
            $tipo="danger";
        }
        $dias = $app->readAll();
        include('views/dia/index.php');
        break;
    case 'update':
        break;
    case 'delete':
        $id = (isset($_GET['id']))?$_GET['id']:null;
        if (!is_null($id)){
            if (is_numeric($id)){
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = 'el dato fue borrado exitosamente';
                    $tipo = "success";
                }else{
                    $mensaje = 'ocurrio un error';
                    $tipo = 'danger';
                }
            }
        }
        $dias = $app->readAll();
        include ('views/dia/index.php');
        break;
    case 'crear':
        include('views/dia/crear.php');
        break;
    case 'nuevo':
        $data=$_POST['data'];
        $resultado = $app->create($data);
        if ($resultado){
            $mensaje = 'el dia se dio de alta correctamente';
            $tipo = "success";
        }else{
            $mensaje = 'ocurrio un error';
            $tipo = "danger";
        }
        $dias = $app->readAll();
        include('views/dia/index.php');
        break;
    case 'logout':
        $app->logout();
        $break;
    default:
        $dias = $app->readAll();
        include 'views/dia/index.php';
}
require_once ('views/footer.php');
?>