<?php
    class Main extends Controller{
        function __construct(){
            parent::__construct();
            //echo "<p>Nuevo Controlador MAIN</p>";
        }
        function render(){
            $this->view->render('main/index');
        }
        function Saludo(){
            echo "<p>Ejecutaste el Método Saludo</p>";
        }
    }

?>