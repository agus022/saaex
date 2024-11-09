<?php
require_once("rama.class.php");
$app = new Rama;
//$app->checkRol('Administrador');

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null; //if ternario 
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'crear':
        include('views/rama/crear.php');
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El rama se agrego correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "ERROR! :(";
            $tipo = "danger";
        }
        $ramas = $app->readAll();
        include('views/rama/index.php');
        break;
    case 'actualizar':
        $ramas = $app->readOne($id);
        include('views/rama/crear.php');
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El rama se actualizo correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "No se actualizo :(";
            $tipo = "danger";
        }
        $ramas = $app->readAll();
        include('views/rama/index.php');
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
        $ramas = $app->readAll();
        include('views/rama/index.php');
        break;
    default:
        $ramas = $app->readAll();
        include('views/rama/index.php');
}
require_once('views/footer.php');