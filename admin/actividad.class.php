<?php 
require_once ('../sistema.class.php');
class actividad extends Sistema {
    function create ($data){
        $result = [];
        $this->conexion();
        $sql = "insert into actividad(actividad, descripcion, id_tipo) 
                values (:actividad, :descripcion, :id_tipo);";
        $insertar = $this->conn->prepare($sql);
        $insertar -> bindParam(':actividad', $data['actividad'], PDO::PARAM_STR);
        $insertar -> bindParam(':descripcion', $data['descripcion'], PDO::PARAM_INT);
        $insertar -> bindParam(':id_tipo', $data['id_tipo'], PDO::PARAM_INT);
        $insertar -> execute();
        $result = $insertar -> rowCount();
        return $result;
    }
    function update($id, $data){
        $this -> conexion();
        $result = [];
        $sql = "update actividad set
        actividad = :actividad,
        descripcion = :descripcion,
        id_tipo = :id_tipo
        where id_actividad = :id_actividad;";
        $actualizar = $this->conn->prepare($sql);
        $actualizar -> bindParam(':id_actividad', $id, PDO::PARAM_INT);
        $actualizar -> bindParam(':actividad', $data['actividad'], PDO::PARAM_STR);
        $actualizar -> bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $actualizar -> bindParam(':id_tipo', $data['id_tipo'], PDO::PARAM_INT);
        $actualizar -> execute();
        $result = $actualizar -> rowCount();
        return $result;
    }
    function delete($id){
        $result = [];
        $this -> conexion();
        if(is_numeric($id)){
            $sql = "delete from actividad where id_actividad = :id_actividad;";
            $eliminar = $this->conn->prepare($sql);
            $eliminar -> bindParam(':id_actividad', $id, PDO::PARAM_INT);
            $eliminar -> execute();
            $result = $eliminar -> rowCount();
        }
        return $result;
    }
    function readOne($id){
        $this -> conexion();
        $result = [];
        $consulta = "select * from actividad where id_actividad = :id_actividad";
        $sql = $this->conn->prepare($consulta);
        $sql->bindParam(':id_actividad', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $this->conexion();
        $result = [];
        $consulta = "select a.*, t.tipo from actividad a join tipo t on t.id_tipo = a.id_tipo";
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql-> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>