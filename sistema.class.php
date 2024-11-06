<?php
require_once("config.class.php");
class Sistema{
    var $conn;
    function conexion()
    {
        $this->conn = new PDO(SGBD . ':host=' . DBHOST . '; dbname=' . DBNAME . '; port=' . DBPORT, DBUSER, DBPASS);
    }
}

?>