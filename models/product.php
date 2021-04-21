<?php
    require_once('core/crud.php');

    class Product extends Crud{

        private $id;
        private $supplierID;
        private $name;
        private $image;
        private $marca;
        private $type;
        private $description;
        private $category;
        private $priceSell;
        private $priceBuy;
        private $discount;
        private $estado;
        protected const TABLE='products';
        protected const ID = 'prod_id';
        protected $pdo;

        //constructor
        function __construct(){

            parent::__construct(self::TABLE, self::ID);
            $this->pdo=parent::conexion();
        }

        //get an setter
        public function __set($name, $value){
            $this->$name = $value;
        }

        public function __get($name){
            return $this->$name;
        }

        //funciones

        //agregar producto
        public function add(){
            try{

                $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (prod_name, prod_image, prod_marca, prod_type, prod_description, prod_category, prod_piceSell, prod_piceBuy) VALUES(?,?,?,?,?,?,?,?)");
                $stm->execute(array($this->name, $this->image, $this->marca, $this->type,$this->description ,$this->category, $this->priceSell, $this->priceBuy));
                return true;
            }catch(PDOException $e){

                echo $e->getMessage();
                return false;
            }
        }
        //editar producto
        public function update(){
            try{

                $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET prod_name=?, prod_image=?, prod_marca=?, prod_type=?, prod_description=? ,prod_category=?, prod_piceSell=?, prod_discount=?, prod_piceBuy=? WHERE prod_id=?");
                $stm->execute(array($this->name, $this->image, $this->marca, $this->type, $this->description, $this->category, $this->priceSell, $this->priceBuy, $this->discount, $this->id));
                return true;
            }catch(PDOException $e){

                echo $e->getMessage();
                return false;
            }
            
        }
         //funcion para eliminar o cambiar de estado
         public function delete($id){
            try{

                $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET  usr_estado=? WHERE prod_id=?");
                $stm->execute(array($this->estado,$id));
            }catch(PDOException $e){

                echo $e->getMessage();
            }
        }
    }

?>