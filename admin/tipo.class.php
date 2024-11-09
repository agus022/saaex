<?php
require_once('../sistema.class.php');

class Tipo extends Sistema
{
    //INSERTAR A LA BASE DE DATOS
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO tipo(tipo,descripcion) 
        VALUES (:tipo,:descripcion);";
        $insertar = $this->conn->prepare($sql);
        //bindParam para evitar las inyecciones de SQL
        $insertar->bindParam(':tipo', $data['fecha_incial'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
        $sql = "UPDATE tipo SET tipo=:tipo,descripcion=:descripcion
        where id_tipo=:id_tipo;";
        $modificar = $this->conn->prepare($sql);
        $modificar->bindParam(':id_tipo', $id, PDO::PARAM_INT);
        $modificar->bindParam(':tipo', $data['tipo'], PDO::PARAM_STR);
        $modificar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM tipo WHERE id_tipo=:id_tipo;";
        $eliminar = $this->conn->prepare($sql);
        $eliminar->bindParam(':id_tipo', $id, PDO::PARAM_INT);
        $eliminar->execute();
        $result = $eliminar->rowcount();
        return $result;
    }

    function readOne($id)
    {
        $result = [];
        $this->conexion();
        $sql = 'SELECT * from tipo where id_tipo = :id_tipo;';
        $update = $this->conn->prepare($sql);
        $update->bindParam(':id_tipo', $id, PDO::PARAM_INT);
        $update->execute();
        $result = $update->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll()
    {
        $this->conexion();
        $result = [];
        $consulta = 'select * from tipo;';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
