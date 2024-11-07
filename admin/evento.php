<?php 
include('evento.class.php');
$app = new evento;
$accion=(isset($_GET['accion'])) ? $_GET['accion'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch($accion){
    case 'actualizar':
        $eventos = $app -> readOne($id); 
        include('views/evento/crear.php');
        break;
    case 'modificar':
        $data= $_POST['data'];
        $result=$app->update($id,$data);
        if($result){
            $mensaje="El evento se actualizo";
            $tipo="success";
        }else{
            $mensaje="No se actualizo";
            $tipo="danger";
        }
        $eventos = $app->readAll();
        include('views/evento/index.php');
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
        $eventos = $app->readAll();
        include ('views/evento/index.php');
        break;
    case 'crear':
        include('views/evento/crear.php');
        break;
    case 'nuevo':
        $data=$_POST['data'];
        $resultado = $app->create($data);
        if ($resultado){
            $mensaje = 'el evento se dio de alta correctamente';
            $tipo = "success";
        }else{
            $mensaje = 'ocurrio un error';
            $tipo = "danger";
        }
        $eventos = $app->readAll();
        include('views/evento/index.php');
        break;
    case 'logout':
        $app->logout();
        $break;
    default:
        $eventos = $app->readAll();
        include 'views/evento/index.php';
}
require_once ('views/footer.php');
?>