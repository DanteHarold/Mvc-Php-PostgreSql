<?php
    include_once 'models/alumno.php';
    class ConsultaModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function get(){

            $items = [];

            try{
                $sql = "SELECT*FROM ALUMNOS";
                $query = $this->db->Connect()->query($sql);
                while($row = $query->fetch()){
                    $item = new Alumno();
                    $item->matricula = $row['matricula'];
                    $item->nombre = $row['nombre'];
                    $item->apellido = $row['apellido'];

                    array_push($items,$item);
                }
            return $items;
            }catch(PDOException $e){
                echo $e->getMessage();
                return [];
            }
          
           
        }
        public function getById($id){
            $item = new Alumno();
            try{
                $query = $this->db->connect()->prepare("SELECT * FROM ALUMNOS WHERE matricula = :matricula");

                $query->execute(['matricula'=>$id]);
                while($row = $query->fetch()){
                    $item->matricula = $row['matricula'];
                    $item->nombre = $row['nombre'];
                    $item->apellido = $row['apellido'];
                }
                return $item;
            }catch(PDOException $e){

            }
        }
        public function update($item){
            $query = $this->db->connect()->prepare("UPDATE ALUMNOS SET nombre =:nombre , apellido =:apellido WHERE matricula =:matricula");
            try{
                $query->execute([
                    'matricula' => $item['matricula'],
                    'nombre' => $item['nombre'],
                    'apellido' => $item['apellido']
                ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
        public function delete($id){
            $query = $this->db->connect()->prepare("DELETE FROM ALUMNOS WHERE matricula = :matricula");
            try{
                $query->execute([
                    'matricula' => $id,
                ]);
                return true;
            }catch(PDOException $e){
                return false;
            }
        }
    }

?>