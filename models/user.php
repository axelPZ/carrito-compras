<?php

    require_once('core/crud.php');

    class User extends Crud{

        private $id;
        private $name;
        private $surname;
        private $email;
        private $image;
        private $type;
        private $pass;
        private $estado;
        protected const TABLE='users';
        protected const ID='usr_id';
        protected $pdo;

        //constructor
        public function __construct(){

            parent::__construct(self::TABLE, self::ID);
            $this->pdo=parent::conexion();
        }

        //get and seter
        public function __set($name, $value){

            $this->$name=$value;
        }
        public function __get($name){

            return $this->$name;
        }

        //funciones

        //funcion para agregar
        public function add(){

            try{
                // echo "INSERT INTO ".self::TABLE." (usr_name, usr_surname, usr_email, usr_password) VALUES(?,?,?,?)";
                // INSERT INTO users (usr_name, usr_surname, usr_email, usr_password) VALUES(?,?,?,?);
                // die();

                $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (usr_name, usr_surname, usr_email, usr_password) VALUES(?,?,?,?)");
                $stm->execute(array($this->name,$this->surname,$this->email,$this->pass));
            }catch(PDOException $e){

                echo $e->getMessage();
            }
        }
        //funcion para editar todos los campos
        public function updateAll(){
            try{

                $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET usr_name=?, usr_surname=?,usr_email=? ,usr_image=?, usr_password=? WHERE usr_id=?");
                $stm->execute(array($this->name,$this->surname,$this->email,$this->image,$this->pass,$this->id));
                return true;
            }catch(PDOException $e){

                return false;
                echo $e->getMessage();
            }
        }
        //no se edita la password
        public function update(){
            try{

                $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET usr_name=?, usr_surname=?,usr_email=? ,usr_image=? WHERE usr_id=?");
                $stm->execute(array($this->name,$this->surname,$this->email,$this->image,$this->id));
                return true;
            }catch(PDOException $e){

                return false;
                echo $e->getMessage();
            }
        }
        
        //funcion para eliminar o cambiar de estado
        public function delete($id){
            try{

                $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET  usr_estado=? WHERE usr_id=?");
                $stm->execute(array($this->estado,$id));
            }catch(PDOException $e){

                echo $e->getMessage();
            }
        }
        //mostrar por tipo de estado
        public function getEstado($type=true){
    
            $estadoUser = ($type) ? '1' : '0';

            try{
                $stm = $this->pdo->prepare("SELECT usr_name, usr_surname,usr_email ,usr_estado, usr_type from users where usr_estado = $estadoUser");
                $stm->execute();

                return $stm->feTchAll(PDO::FETCH_OBJ);
            }catch(PDOException $e){

                echo $e->getMessage();
            }
        }
        //si existe el usuario
        public function emailExist($email){
            try{

                $stm = $this->pdo->prepare("SELECT usr_email, usr_image FROM ".self::TABLE." WHERE usr_email = '$email'");
                $stm->execute();

                return $stm->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        //logiarse
        public function login($email, $pass){
            try{
                $stm = $this->pdo->prepare("SELECT usr_id, usr_name, usr_surname, usr_email, usr_image FROM ".self::TABLE." WHERE usr_email = '$email' AND usr_password = '$pass'");
                $stm->execute();

                return $stm->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        //obtener el usuario solo con el email
        //logiarse
        public function getUser($email){
            try{
                $stm = $this->pdo->prepare("SELECT usr_id, usr_name, usr_surname, usr_email, usr_image FROM ".self::TABLE." WHERE usr_email = '$email'");
                $stm->execute();

                return $stm->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }

?>