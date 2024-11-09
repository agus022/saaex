<?php
require_once("puesto.class.php");
$app = new Puesto;
//$app->checkRol('Administrador');

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null; //if ternario 
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'crear':
        include('views/puesto/crear.php');
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El puesto se agrego correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "ERROR! :(";
            $tipo = "danger";
        }
        $puestos = $app->readAll();
        include('views/puesto/index.php');
        break;
    case 'actualizar':
        $puestos = $app->readOne($id);
        include('views/puesto/crear.php');
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El puesto se actualizo correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "No se actualizo :(";
            $tipo = "danger";
        }
        $puestos = $app->readAll();
        include('views/puesto/index.php');
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
        $puestos = $app->readAll();
        include('views/puesto/index.php');
        break;
    default:
        $puestos = $app->readAll();
        include('views/puesto/index.php');
}
require_once('views/footer.php');