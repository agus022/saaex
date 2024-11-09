<?php
require_once("periodo.class.php");
$app = new Periodo;
//$app->checkRol('Administrador');

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null; //if ternario 
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'crear':
        include('views/periodo/crear.php');
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El periodo se agrego correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "ERROR! :(";
            $tipo = "danger";
        }
        $periodos = $app->readAll();
        include('views/periodo/index.php');
        break;
    case 'actualizar':
        $periodos = $app->readOne($id);
        include('views/periodo/crear.php');
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El periodo se actualizo correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "No se actualizo :(";
            $tipo = "danger";
        }
        $periodos = $app->readAll();
        include('views/periodo/index.php');
        break;
    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = 'Se elimino correctamente ';
                    $tipo = 'success';
                } else {
                    $mensaje = 'ERROR al eliminar';
                    $tipo = 'danger';
                }
            }
        }
        $periodos = $app->readAll();
        include('views/periodo/index.php');
        break;
    default:
        $periodos = $app->readAll();
        include('views/periodo/index.php');
}
require_once('views/footer.php');