<?php
    class Database{
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;
        private $port;

        public function __construct(){
            $this->host = constant('HOST');
            $this->db = constant('DB');
            $this->user = constant('USER');
            $this->password = constant('PASSWORD');
            $this->charset = constant('CHARSET');
            $this->port = constant('PORT');
        }

        function Connect(){
            try{
                $connection = "pgsql:host=".$this->host.";port=".$this->port.";dbname=".$this->db;
                $options = [
                    PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES =>false,
                ];
                $pdo = new PDO($connection,$this->user,$this->password,$options);
                echo "bien";
                return $pdo;
            }catch(PDOException $e){
                print_r('Error Connection : '.$e->getMessage());
            }
        }
    }

?>