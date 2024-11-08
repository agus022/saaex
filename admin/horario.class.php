<?php 
require_once ('../sistema.class.php');
class horario extends Sistema {
    function create ($data){
        $result = [];
        $this->conexion();
        $sql = "insert into horario (hora_inicio, hora_termino, id_dia, id_grupo, id_espacio) 
                values ( :hora_inicio , :hora_termino , :id_dia , :id_grupo , :id_espacio );";
        $insertar = $this->conn->prepare($sql);
        $insertar -> bindParam(':hora_inicio', $data['hora_inicio'], PDO::PARAM_STR);
        $insertar -> bindParam(':hora_termino', $data['hora_termino'], PDO::PARAM_STR);
        $insertar -> bindParam(':id_dia', $data['id_dia'], PDO::PARAM_INT);
        $insertar -> bindParam(':id_grupo', $data['id_grupo'], PDO::PARAM_STR);
        $insertar -> bindParam(':id_espacio', $data['id_espacio'], PDO::PARAM_INT);
        $insertar -> execute();
        $result = $insertar -> rowCount();
        return $result;
    }
    function update($id, $data){
        $this -> conexion();
        $result = [];
        $sql = "update horario set
        hora_inicio = :hora_inicio , 
        hora_termino = :hora_termino , 
        id_dia = :id_dia , 
        id_grupo = :id_grupo , 
        id_espacio = :id_espacio 
        where id_sesion_dia = :id_sesion_dia;";
        $actualizar = $this->conn->prepare($sql);
        $actualizar -> bindParam(':id_sesion_dia', $id, PDO::PARAM_INT);
        $actualizar -> bindParam(':hora_inicio', $data['hora_inicio'], PDO::PARAM_STR);
        $actualizar -> bindParam(':hora_termino', $data['hora_termino'], PDO::PARAM_STR);
        $actualizar -> bindParam(':id_dia', $data['id_dia'], PDO::PARAM_INT);
        $actualizar -> bindParam(':id_grupo', $data['id_grupo'], PDO::PARAM_STR);
        $actualizar -> bindParam(':id_espacio', $data['id_espacio'], PDO::PARAM_INT);
        $actualizar -> execute();
        $result = $actualizar -> rowCount();
        return $result;
    }
    function delete($id){
        $result = [];
        $this -> conexion();
        if(is_numeric($id)){
            $sql = "delete from horario where id_sesion_dia = :id_sesion_dia;";
            $eliminar = $this->conn->prepare($sql);
            $eliminar -> bindParam(':id_sesion_dia', $id, PDO::PARAM_INT);
            $eliminar -> execute();
            $result = $eliminar -> rowCount();
        }
        return $result;
    }
    function readOne($id){
        $this -> conexion();
        $result = [];
        $consulta = "select * from horario where id_sesion_dia = :id_sesion_dia";
        $sql = $this->conn->prepare($consulta);
        $sql->bindParam(':id_sesion_dia', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAll(){
        $this->conexion();
        $result = [];
        $consulta = "select h.id_sesion_dia, concat(h.hora_inicio, '-' ,h.hora_termino) as horario , d.dia, 
                    concat(a.actividad, ' ', t.tipo) as actividad , r.rama, e.edificio from horario h
                    join dia d on d.id_dia = h.id_dia join espacio e on e.id_espacio = h.id_espacio 
                    join public.grupo g on h.id_grupo = g.id_grupo
                    join rama r on r.id_rama = g.id_rama 
                    join actividad a on a.id_actividad = g.id_actividad 
                    join tipo t on t.id_tipo = a.id_tipo";
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql-> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAllDias(){
        $this->conexion();
        $result=[];
        $consulta = "select * from dia";
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql-> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAllGrupo(){
        $this->conexion();
        $result=[];
        $consulta = "select * from grupo";
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql-> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function readAllEspacio(){
        $this->conexion();
        $result=[];
        $consulta = "select * from espacio";
        $sql = $this->conn->prepare($consulta);
        $sql->execute();
        $result = $sql-> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>