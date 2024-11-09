<?php
require_once('../sistema.class.php');

class Rama extends Sistema
{
    //INSERTAR A LA BASE DE DATOS
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO rama(rama,descripcion) 
        VALUES (:rama,:descripcion);";
        $insertar = $this->conn->prepare($sql);
        //bindParam para evitar las inyecciones de SQL
        $insertar->bindParam(':rama', $data['rama'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
        $sql = "UPDATE rama SET rama=:rama,descripcion=:descripcion,segundo_apellido=:segundo_apellido, curp=:curp, id_puesto=:id_puesto, id_usuario=:id_usuario
        where id_rama=:id_rama;";
        $modificar = $this->conn->prepare($sql);
        $modificar->bindParam(':id_rama', $id, PDO::PARAM_INT);
        $modificar->bindParam(':rama', $data['rama'], PDO::PARAM_STR);
        $modificar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
       
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM rama WHERE id_rama=:id_rama;";
        $eliminar = $this->conn->prepare($sql);
        $eliminar->bindParam(':id_rama', $id, PDO::PARAM_INT);
        $eliminar->execute();
        $result = $eliminar->rowcount();
        return $result;
    }

    function readOne($id)
    {
        $result = [];
        $this->conexion();
        $sql = 'SELECT * from rama where id_rama = :id_rama;';
        $update = $this->conn->prepare($sql);
        $update->bindParam(':id_rama', $id, PDO::PARAM_INT);
        $update->execute();
        $result = $update->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll()
    {
        $this->conexion();
        $result = [];
        $consulta = 'select * from rama;';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
