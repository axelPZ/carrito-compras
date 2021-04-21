<?php
    require_once('core/conection.php');

  abstract class Crud extends Connection{

        private $table;
        private $idColumn;
        private $pdo;

        public function __construct($table,$idColumn){
            $this->table=$table;
            $this->idColumn = $idColumn;
            $this->pdo = parent::conexion();
        }

        //llamar todos los datos de las tablas
        public function getAll(){

            try{

                $stm = $this->pdo->prepare("SELECT * FROM $this->table");
                $stm->execute();

                return $stm->feTchAll(PDO::FETCH_OBJ);
            }catch(PDOException $e){

                echo $e->getMessage();
            }
            
        }

        //llamar un dato por su id
        public function getById($id){

            try{
                $stm = $this->pdo->prepare("SELECT * FROM $this->table WHERE $this->idColumn ='$id'");
                $stm->execute(array($id));

                return $stm->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $e){

                echo $e->getMessage();
            }
        }
        //traer la fecha actual
        public function getDate(){
            try{
                $stm = $this->pdo->prepare("SELECT CURRENT_TIMESTAMP() AS FECHA");
                $stm->execute();
                return $stm->fetch(PDO::FETCH_OBJ);

            }catch(PDOException $e){

                return false;
            }
        }
        //traer el id de la ultima venta
        public function getMaxId(){
            try{
                $stm = $this->pdo->prepare("SELECT (MAX($this->idColumn)+1) as Id FROM $this->table");
                $stm->execute();
                return $stm->fetch(PDO::FETCH_OBJ);
    
            }catch(PDOException $e){
    
                return false;
            }
        }

        abstract public function add();
        abstract public function update();
        abstract public function delete($id);
    }


?>