<?php 
require_once('../sistema.class.php');
class dia extends Sistema{
    function create($data){
        $result = [];
        $this->conexion();
        $sql = 'insert into dia (dia) values ( :dia )';
        $insertar = $this->conn->prepare($sql);
        $insertar->bindparam(':dia',$data['dia'], PDO::PARAM_STR);
        $insertar->execute();
        $result = $insertar->rowCount();
        return $result;
    }
    function update($id, $data){
        $this -> conexion();
        $result = [];
        $sql = "update dia set
        dia = :dia
        where id_dia = :id_dia;";
        $actualizar = $this->conn->prepare($sql);
        $actualizar -> bindParam(':id_dia', $id, PDO::PARAM_INT);
        $actualizar -> bindParam(':dia', $data['dia'], PDO::PARAM_STR);
        $actualizar -> execute();
        $result = $actualizar -> rowCount();
        return $result;
    }
    function delete($id){
        $result=[];
        $this->conexion();
        $sql = 'delete from dia where id_dia = :id';
        $borrar = $this->conn->prepare($sql);
        $borrar->bindparam('id', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($data){
        $result=[];
        $this->conexion();
        $consulta='select * from dia where id_dia = :id';
        $sql = $this->conn->prepare($consulta);
        $sql->bindparam(':id', $data, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $result=[];
        $this->conexion();
        $consulta='select * from dia';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>