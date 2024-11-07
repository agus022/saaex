<?php
require_once('../sistema.class.php');

class Carrera extends Sistema
{
    //INSERTAR A LA BASE DE DATOS
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO carrera (clave_oficial,carrera,fecha_inicio) 
        VALUES (:clave_oficial,:carrera,:fecha_inicio);";
        $insertar = $this->conn->prepare($sql);
        //bindParam para evitar las inyecciones de SQL
        $insertar->bindParam(':clave_oficial', $data['clave_oficial'], PDO::PARAM_STR);
        $insertar->bindParam(':carrera', $data['carrera'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha_inicio', $data['fecha_inicio'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
        $sql = "UPDATE carrera SET clave_oficial=:clave_oficial,carrera=:carrera,fecha_inicio=:fecha_inicio 
        where id_carrera=:id_carrera;";
        $modificar = $this->conn->prepare($sql);
        $modificar->bindParam(':id_carrera', $id, PDO::PARAM_INT);
        $modificar->bindParam(':clave_oficial', $data['clave_oficial'], PDO::PARAM_STR);
        $modificar->bindParam(':carrera', $data['carrera'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha_inicio', $data['fecha_inicio'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM carrera WHERE id_carrera=:id_carrera;";
        $eliminar = $this->conn->prepare($sql);
        $eliminar->bindParam(':id_carrera', $id, PDO::PARAM_INT);
        $eliminar->execute();
        $result = $eliminar->rowcount();
        return $result;
    }

    function readOne($id)
    {
        $result = [];
        $this->conexion();
        $sql = 'SELECT * from carrera where id_carrera = :id_carrera;';
        $update = $this->conn->prepare($sql);
        $update->bindParam(':id_carrera', $id, PDO::PARAM_INT);
        $update->execute();
        $result = $update->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll()
    {
        $this->conexion();
        $result = [];
        $consulta = 'select * from carrera;';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
