<?php
require_once('../sistema.class.php');

class Alumno extends Sistema
{
    //INSERTAR A LA BASE DE DATOS
    function create($data)
    {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO alumno (numero_control,nombre, primer_apellido, segundo_apellido, curp, semestre, id_carrera, id_usuario) 
        VALUES (:numero_control,:nombre,:primer_apellido,:segundo_apellido,:curp,:semestre,:id_carrera,:id_usuario);";
        $insertar = $this->conn->prepare($sql);
        //bindParam para evitar las inyecciones de SQL
        $insertar->bindParam(':numero_control', $data['numero_control'], PDO::PARAM_STR);
        $insertar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $insertar->bindParam(':primer_apellido', $data['primer_apellido'], PDO::PARAM_STR);
        $insertar->bindParam(':segundo_apellido', $data['segundo_apellido'], PDO::PARAM_STR);
        $insertar->bindParam(':curp', $data['curp'], PDO::PARAM_STR);
        $insertar->bindParam(':semestre', $data['semestre'], PDO::PARAM_INT);
        $insertar->bindParam(':id_carrera', $data['id_carrera'], PDO::PARAM_INT);
        $insertar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }

    function update($id, $data)
    {
        $result = [];
        $this->conexion();
        $sql = "UPDATE alumno SET nombre=:nombre,primer_apellido=:primer_apellido,segundo_apellido=:segundo_apellido,curp=:curp,semestre=:semestre,id_carrera=:id_carrera,id_usuario=:id_usuario 
        where numero_control=:numero_control;";
        $modificar = $this->conn->prepare($sql);
        $modificar->bindParam(':numero_control', $id, PDO::PARAM_STR);
        $modificar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $modificar->bindParam(':primer_apellido', $data['primer_apellido'], PDO::PARAM_STR);
        $modificar->bindParam(':segundo_apellido', $data['segundo_apellido'], PDO::PARAM_STR);
        $modificar->bindParam(':curp', $data['curp'], PDO::PARAM_STR);
        $modificar->bindParam(':semestre', $data['semestre'], PDO::PARAM_INT);
        $modificar->bindParam(':id_carrera', $data['id_carrera'], PDO::PARAM_INT);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    function delete($id)
    {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM alumno WHERE numero_control=:numero_control;";
        $eliminar = $this->conn->prepare($sql);
        $eliminar->bindParam(':numero_control', $id, PDO::PARAM_INT);
        $eliminar->execute();
        $result = $eliminar->rowcount();
        return $result;
    }

    function readOne($id)
    {
        $result = [];
        $this->conexion();
        $sql = 'SELECT * from alumno where numero_control = :numero_control;';
        $update = $this->conn->prepare($sql);
        $update->bindParam(':numero_control', $id, PDO::PARAM_INT);
        $update->execute();
        $result = $update->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll()
    {
        $this->conexion();
        $result = [];
        $consulta = 'select a.*,c.carrera from alumno a join carrera c on a.id_carrera=c.id_carrera';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
