<?php

    require_once 'core/crud.php';

    class Sale extends Crud{

        private $id;
        private $date;
        private $userId;
        private $ahorra;
        private $neto;
        private $iva;
        private $total;
        protected const TABLE='sales';
        protected const ID='sal_id';
        protected $pdo;

        public function __construct(){
            parent::__construct(self::TABLE, self::ID);
            $this->pdo = parent::conexion();
        }

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }

        //fucniones

        //llamar las compras a detalle
        public function getUserSale($idUser){
            try{
                $stm = $this->pdo->prepare("SELECT sal_id, sal_date, sal_ahorra, sal_neto, sal_IVA, sal_Total, SUM(det_Quantity) AS cantidad 
                                            FROM sales 
                                            JOIN sale_detail ON det_SaleID = sal_id
                                            WHERE sal_userId=?
                                            GROUP BY det_saleId
                                            ORDER BY sal_id DESC");
                $stm->execute(array($idUser));
                return $stm->feTchAll(PDO::FETCH_OBJ);
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        //de las compras del usuario
        public function getDetalleCompra($idUser){
            try{
                $stm = $this->pdo->prepare("SELECT (SELECT SUM(sal_total) FROM sales WHERE sal_userid=$idUser) AS total, 
                                                (SELECT SUM(sal_ahorra) FROM sales WHERE sal_userid=$idUser) AS ahorra, 
                                                MAX(sal_total) as maximo, SUM(det_Quantity) AS cantidad 
                                                FROM SALES  
                                                JOIN sale_detail ON det_SaleID = sal_id
                                                WHERE sal_userid=$idUser");
                                                $stm->execute();
                return $stm->feTchAll(PDO::FETCH_OBJ);
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        //agregar compra
        public function add(){
            try{
                $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (sal_date, sal_userId, sal_ahorra, sal_neto, sal_iva, sal_total) VALUES (?,?,?,?,?,?)");
                $stm->execute(array($this->date, $this->userId, $this->ahorra, $this->neto, $this->iva, $this->total ));
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        //editar compra
        public function update(){
            try{
                $stm = $this->pdo->prepare("UPDATE ".self::TABLE." sal_date=?, sal_userId=?, sal_ahorra=?, sal_neto=?, sal_iva=?, sal_total=? WHERE sal_id=?");
                $stm->execute(array($this->date, $this->userId, $this->ahorra, $this->neto, $this->iva, $this->total, $this->id ));
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        //eliminar compra 
        public function delete($id){
            try{
                $stm = $this->pdo->prepare("DELETE  ".self::TABLE." WHERE ".self::ID."=?");
                $stm->execute(array($id));
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        //hacer el pago de la compra
        public function pagoCompra($numTarjeta, $cvv, $vigencia){

            $tarjeta = substr($numTarjeta,0,16);

            if($tarjeta && $cvv && $vigencia){
                return true;
            }else
            {
                return false;
            }
         
        die();
        }


    }



?>