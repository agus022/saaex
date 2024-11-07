<?php
require_once("config.class.php");
class Sistema{
    var $conn;
    function conexion()
    {
        $this->conn = new PDO(SGBD . ':host=' . DBHOST . '; dbname=' . DBNAME . '; port=' . DBPORT, DBUSER, DBPASS);
    }

    function alerta($tipo, $mensaje)
    {
        include('views/alert.php');
    }
    
    function logout(){
        unset($_SESSION);
        session_destroy();
        $mensaje='Gracias por utilizar el sistema, se ha cerrado la sesion <a href="login.php">presione aqui para volver a entrar</a>';
        $tipo='info';
        require_once('admin/views/header.php');
         require_once ('admin/views/alert.php');
    }


}

?>