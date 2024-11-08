<?php
require_once("alumno.class.php");
require_once("carrera.class.php");
//require_once("usuario.class.php");
$app = new Alumno;
$appCarrera = new Carrera;

//$appUsuario = new Usuario;
//$app->checkRol('Administrador');

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null; //if ternario 
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($accion) {
    case 'crear':
        $carreras = $appCarrera->readAll();
        //$usuarios = $appUsuario->readAll();
        include('views/alumno/crear.php');
        break;
    case 'nuevo':
        $data = $_POST['data'];
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El alumno se registro correctamente! :)";
            $tipo = "success";
        } else {
            $mensaje = "ERROR! :(";
            $tipo = "danger";
        }
        $alumnos = $app->readAll();
        include('views/alumno/index.php');
        break;
    case 'actualizar':
        $carreras = $appCarrera->readAll();
        //$usuarios = $appUsuario->readAll();
        $alumnos = $app->readOne($id);
        include('views/alumno/crear.php');
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "Se actualizo correctamente su información del alumno! :)";
            $tipo = "success";
        } else {
            $mensaje = "No se actualizo :(";
            $tipo = "danger";
        }
        $alumnos = $app->readAll();
        include('views/alumno/index.php');
        break;
    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = 'Se elimino correctamente ';
                    $tipo = 'success';
                } else {
                    $mensaje = 'ERROR ';
                    $tipo = 'danger';
                }
            }
        }
        $alumnos = $app->readAll();
        include('views/alumno/index.php');
        break;
    default:
        $alumnos = $app->readAll();
        include('views/alumno/index.php');
}
require_once('views/footer.php');
