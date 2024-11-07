<?php 
include_once('../sistema.class.php');
class espacio extends Sistema{
    function create($data){
        $result = [];
        $this->conexion();
        $sql = 'insert into espacio (espacio, campus, edificio, sala) 
                values ( :espacio , :campus , :edificio , :sala )';
        $insertar = $this->conn->prepare($sql);
        $insertar->bindparam(':espacio',$data['espacio'], PDO::PARAM_STR);
        $insertar->bindparam(':campus',$data['campus'], PDO::PARAM_STR);
        $insertar->bindparam(':edificio',$data['edificio'], PDO::PARAM_STR);
        $insertar->bindparam(':sala',$data['sala'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }
    function update($id, $data){
        $this -> conexion();
        $result = [];
        $sql = "update espacio set
        espacio = :espacio , 
        campus = :campus , 
        edificio = :edificio , 
        sala = :sala 
        where id_espacio = :id_espacio;";
        $actualizar = $this->conn->prepare($sql);
        $actualizar -> bindParam(':id_espacio', $id, PDO::PARAM_INT);
        $actualizar -> bindParam(':espacio', $data['espacio'], PDO::PARAM_STR);
        $actualizar -> bindParam(':campus', $data['campus'], PDO::PARAM_STR);
        $actualizar -> bindParam(':edificio', $data['edificio'], PDO::PARAM_STR);
        $actualizar -> bindParam(':sala', $data['sala'], PDO::PARAM_STR);
        $actualizar -> execute();
        $result = $actualizar -> rowCount();
        return $result;
    }
    function delete($id){
        $result=[];
        $this->conexion();
        $sql = 'delete from espacio where id_espacio = :id';
        $borrar = $this->conn->prepare($sql);
        $borrar->bindparam(':id', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($data){
        $result=[];
        $this->conexion();
        $consulta='select * from espacio where id_espacio = :id';
        $sql = $this->conn->prepare($consulta);
        $sql->bindparam(':id', $data, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $result=[];
        $this->conexion();
        $consulta='select * from espacio';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>