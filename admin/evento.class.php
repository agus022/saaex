<?php 
include_once('../sistema.class.php');
class evento extends Sistema{
    function create($data){
        $result = [];
        $this->conexion();
        $sql = 'insert into evento (id_evento, evento, descripcion, hora_inicio, hora_termino, lugar, ciudad, estado, pais) 
                values ( :id_evento , :evento , :descripcion , :hora_inicio , :hora_termino , :lugar , :ciudad , :estado , :pais)';
        $insertar = $this->conn->prepare($sql);
        $insertar -> bindparam(':id_evento',$data['id_evento'], PDO::PARAM_STR);
        $insertar -> bindparam(':evento',$data['evento'], PDO::PARAM_STR);
        $insertar -> bindparam(':descripcion',$data['descripcion'], PDO::PARAM_STR);
        $insertar -> bindparam(':hora_inicio',$data['hora_inicio'], PDO::PARAM_STR);
        $insertar -> bindparam(':hora_termino',$data['hora_termino'], PDO::PARAM_STR);
        $insertar -> bindparam(':lugar',$data['lugar'], PDO::PARAM_STR);
        $insertar -> bindparam(':ciudad',$data['ciudad'], PDO::PARAM_STR);
        $insertar -> bindparam(':estado',$data['estado'], PDO::PARAM_STR);
        $insertar -> bindparam(':pais',$data['pais'], PDO::PARAM_STR);
        $insertar -> execute();
        $result = $insertar->rowCount();
        return $result;
    }
    function update($id, $data){
        $this -> conexion();
        $result = [];
        $sql = "update evento set
        evento = :evento , 
        descripcion = :descripcion , 
        hora_inicio = :hora_inicio , 
        hora_termino = :hora_termino , 
        lugar = :lugar , 
        ciudad = :ciudad , 
        estado = :estado , 
        pais = :pais  
        where id_evento = :id_evento ";
        $actualizar = $this->conn->prepare($sql);
        $actualizar -> bindParam(':id_evento', $id, PDO::PARAM_STR);
        $actualizar -> bindParam(':evento', $data['evento'], PDO::PARAM_STR);
        $actualizar -> bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $actualizar -> bindParam(':hora_inicio', $data['hora_inicio'], PDO::PARAM_STR);
        $actualizar -> bindParam(':hora_termino', $data['hora_termino'], PDO::PARAM_STR);
        $actualizar -> bindparam(':lugar',$data['lugar'], PDO::PARAM_STR);
        $actualizar -> bindparam(':ciudad',$data['ciudad'], PDO::PARAM_STR);
        $actualizar -> bindparam(':estado',$data['estado'], PDO::PARAM_STR);
        $actualizar -> bindparam(':pais',$data['pais'], PDO::PARAM_STR);
        $actualizar -> execute();
        $result = $actualizar -> rowCount();
        return $result;
    }
    function delete($id){
        $result=[];
        $this->conexion();
        $sql = 'delete from evento where id_evento = :id';
        $borrar = $this->conn->prepare($sql);
        $borrar->bindparam(':id', $id, PDO::PARAM_STR);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }
    function readOne($data){
        $result=[];
        $this->conexion();
        $consulta='select * from evento where id_evento = :id';
        $sql = $this->conn->prepare($consulta);
        $sql->bindparam(':id', $data, PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $result=[];
        $this->conexion();
        $consulta='select * from evento';
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>