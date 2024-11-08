<?php
require_once('../sistema.class.php');

class Permiso extends Sistema
{
    //INSERTAR A LA BASE DE DATOS
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO permiso (permiso) VALUES (:permiso);";
        $insertar = $this->conn->prepare($sql);
        //bindParam para evitar las inyecciones de SQL
        $insertar->bindParam(':permiso', $data['permiso'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
        $sql =
            "UPDATE permiso SET permiso=:permiso where id_permiso=:id_permiso;";
        $modificar = $this->conn->prepare($sql);
        $modificar->bindParam(':id_permiso', $id, PDO::PARAM_INT);
        $modificar->bindParam(':permiso', $data['permiso'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM permiso WHERE id_permiso=:id_permiso;";
        $eliminar = $this->conn->prepare($sql);
        $eliminar->bindParam(':id_permiso', $id, PDO::PARAM_INT);
        $eliminar->execute();
        $result = $eliminar->rowcount();
        return $result;
    }

    function readOne($id)
    {
        $result = [];
        $this->conexion();
        $sql = 'SELECT * from permiso where id_permiso = :id_permiso;';
        $consulta = $this->conn->prepare($sql);
        $consulta->bindParam(':id_permiso', $id, PDO::PARAM_INT);
        $consulta->execute();
        $result = $consulta->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll()
    {
        $this->conexion();
        $result = [];
        $sql = 'select * from permiso;';
        $consulta = $this->conn->prepare($sql);
        $consulta->execute();
        $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
