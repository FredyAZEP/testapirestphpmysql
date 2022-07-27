<?php
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                //QA
                // $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=andercode_webservice","root","");
                // Produccion Heroku
                $conectar = $this->dbh = new PDO("mysql:host=us-cdbr-east-06.cleardb.net;dbname=heroku_5722f8f9d3eeba7","bde355ce3eb8c7","4290437d");
                return $conectar;
            }catch (Exception $e){
                print "¡Error DB!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>