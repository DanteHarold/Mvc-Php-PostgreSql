<?php
    class Nuevo extends Controller{
        function __construct(){
            parent::__construct();   
            $this->view->mensaje = ""   ;
            //echo "<p>Nuevo Controlador MAIN</p>";
        }
        function render(){
            $this->view->render('nuevo/index');
        }
        function registrarAlumno(){
            $matricula = $_POST['matricula'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            $mensaje = "";

            if($this->model->insert(['matricula'=> $matricula , 'nombre' => $nombre , 'apellido' => $apellido])){
                $mensaje = "Alumno Creado";
            }else{
                $mensaje = "Matricula Ya Existe";
            }

            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }

?>