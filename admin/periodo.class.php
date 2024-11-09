<?php
require_once('../sistema.class.php');

class Periodo extends Sistema
{
    //INSERTAR A LA BASE DE DATOS
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO periodo(fecha_inicial,fecha_final) 
        VALUES (:fecha_inicial,:fecha_final);";
        $insertar = $this->conn->prepare($sql);
        //bindParam para evitar las inyecciones de SQL
        $insertar->bindParam(':fecha_inicial', $data['fecha_incial'], PDO::PARAM_STR);
        $insertar->bindParam(':fecha_final', $data['fecha_final'], PDO::PARAM_STR);
        
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
        $sql = "UPDATE puesto SET fecha_inicial=:fecha_inicial,fecha_final=:fecha_final
        where id_periodo=:id_periodo;";
        $modificar = $this->conn->prepare($sql);
        $modificar->bindParam(':id_periodo', $id, PDO::PARAM_INT);
        $modificar->bindParam(':fecha_inicial', $data['fecha_inicial'], PDO::PARAM_STR);
        $modificar->bindParam(':fecha_final', $data['fecha_final'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM periodo WHERE id_periodo=:id_periodo;";
        $eliminar = $this->conn->prepare($sql);
        $eliminar->bindParam(':id_periodo', $id, PDO::PARAM_INT);
        $eliminar->execute();
        $result = $eliminar->rowcount();
        return $result;
    }

    function readOne($id)
    {
        $result = [];
        $this->conexion();
        $sql = 'SELECT * from periodo where id_periodo = :id_periodo;';
        $update = $this->conn->prepare($sql);
        $update->bindParam(':id_periodo', $id, PDO::PARAM_INT);
        $update->execute();
        $result = $update->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll()
    {
        $this->conexion();
        $result = [];
        $consulta = 'select * from periodo;';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
