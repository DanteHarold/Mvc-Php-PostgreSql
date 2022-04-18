<?php
    class Horror extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje = "Error en la solicitud!";
            $this->view->render('error/index');
            echo "<p>Error al Cargar el Recurso</p>";
        }
    }
?>