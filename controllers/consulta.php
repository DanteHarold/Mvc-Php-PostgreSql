<?php
    require_once("./libs/controller.php");
    class Consulta extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->alumnos = [];
            //echo "<p>Nuevo Controlador MAIN</p>";
        }
        function render(){
            try{

                $alumnos = $this->model->get();
                $this->view->alumnos = $alumnos;
                $this->view->render('consulta/index');
            }catch(e){
                echo "Erro :".e;
            }
        }
        function verAlumno($param = null){
           $idAlumno = $param[0];
           $alumno = $this->model->getById($idAlumno);

           session_start();
           $_SESSION['id_verAlumno'] = $alumno->matricula;
           $this->view->alumno= $alumno;
           $this->view->mensaje = "";
           $this->view->render('consulta/detalle');
        }
        function actualizarAlumno(){
            session_start();
            $matricula = $_SESSION['id_verAlumno'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            unset($_SESSION['id_verAlumno']);

            if ($this->model->update(['matricula' => $matricula , 'nombre' => $nombre,'apellido' => $apellido])) {
                //Actualizar Alumno
                $alumno = new Alumno();
                $alumno->matricula = $matricula;
                $alumno->nombre = $nombre;
                $alumno->apellido = $apellido;

                $this->view->alumno = $alumno;
                $this->view->mensaje = "Alumno Actualizado Correctamente";

            }else{
                //Error al Actualizar
                $this->view->mensaje = "Error al Actualizar al Alumno ";
            }
            $this->view->render('consulta/detalle');
        }
        function eliminarAlumno($param = null){
            $matricula = $param[0];

            if ($this->model->delete($matricula)){
               // $mensaje = "Alumno Eliminado Correctamente";
               echo "bien eliminado";
                $this->view->mensaje = "Alumno Eliminado Correctamente";

            }else{
                //Error al Actualizar
                //$mensaje = "Error al Eliminar Alumno";
                $this->view->mensaje = "Error al Eliminar al Alumno ";
            }
            //$this->render();
            
            //echo $mensaje;
        }
        
    }

?>