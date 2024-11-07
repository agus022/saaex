<?php
require_once("carrera.class.php");
$app = new Carrera;
//$app->checkRol('Administrador');

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null; //if ternario 
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'crear':
        include('views/carrera/crear.php');
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "La carrera se agrego correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "ERROR! :(";
            $tipo = "danger";
        }
        $carreras = $app->readAll();
        include('views/carrera/index.php');
        break;
    case 'actualizar':
        $carreras = $app->readOne($id);
        include('views/carrera/crear.php');
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "La carrera se actualizo correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "No se actualizo :(";
            $tipo = "danger";
        }
        $carreras = $app->readAll();
        include('views/carrera/index.php');
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
        $carreras = $app->readAll();
        include('views/carrera/index.php');
        break;
    default:
        $carreras = $app->readAll();
        include('views/carrera/index.php');
}
require_once('views/footer.php');
