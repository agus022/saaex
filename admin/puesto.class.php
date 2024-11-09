<?php
require_once('../sistema.class.php');

class Puesto extends Sistema
{
    //INSERTAR A LA BASE DE DATOS
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO puesto(puesto,descripcion,nivel) 
        VALUES (:puesto,:descripcion,:nivel);";
        $insertar = $this->conn->prepare($sql);
        //bindParam para evitar las inyecciones de SQL
        $insertar->bindParam(':puesto', $data['puesto'], PDO::PARAM_STR);
        $insertar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $insertar->bindParam(':nivel', $data['nivel'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
        $sql = "UPDATE puesto SET puesto=:puesto,descripcion=:descripcion,nivel=:nivel 
        where id_puesto=:id_puesto;";
        $modificar = $this->conn->prepare($sql);
        $modificar->bindParam(':id_puesto', $id, PDO::PARAM_INT);
        $modificar->bindParam(':puesto', $data['puesto'], PDO::PARAM_STR);
        $modificar->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $modificar->bindParam(':nivel', $data['nivel'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM puesto WHERE id_puesto=:id_puesto;";
        $eliminar = $this->conn->prepare($sql);
        $eliminar->bindParam(':id_puesto', $id, PDO::PARAM_INT);
        $eliminar->execute();
        $result = $eliminar->rowcount();
        return $result;
    }

    function readOne($id)
    {
        $result = [];
        $this->conexion();
        $sql = 'SELECT * from puesto where id_puesto = :id_puesto;';
        $update = $this->conn->prepare($sql);
        $update->bindParam(':id_puesto', $id, PDO::PARAM_INT);
        $update->execute();
        $result = $update->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll()
    {
        $this->conexion();
        $result = [];
        $consulta = 'select * from puesto;';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
