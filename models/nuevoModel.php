<?php
    class NuevoModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function insert($datos){
            try{
                $sql = "INSERT INTO ALUMNOS (MATRICULA,NOMBRE,APELLIDO) VALUES(:matricula,:nombre,:apellido);";
                $query = $this->db->Connect()->prepare($sql);
                $query->execute(['matricula' => $datos['matricula'],'nombre' => $datos['nombre'], 'apellido' => $datos['apellido']]);
                return true;
                
            }catch(PDOException $e){
                return false;
            }
          
           
        }
    }

?>