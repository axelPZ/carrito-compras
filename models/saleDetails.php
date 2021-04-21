<?php

require_once 'core/crud.php';

class SaleDetails extends Crud{

    private $id;
    private $idProduct;
    private $idSale;
    private $preciSale;
    private $preciBuy;
    private $quantity;
    private $discount;
    protected const TABLE = 'sale_detail';
    protected const ID ='det_id';
    protected $pdo;

    public function __construct()
    {
        parent::__construct(self::TABLE, self::ID);
        $this->pdo = parent::conexion();
    }

    public function __get($value){
        return $this->$value;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function add(){

        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (det_prdId, det_saleId, det_preciSale,det_preciBuy,det_discount, det_quantity) VALUES (?,?,?,?,?,?)");
            $stm->execute(array($this->idProduct, $this->idSale, $this->preciSale, $this->preciBuy, $this->discount, $this->quantity));
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    //llamar el detalle por el id de la compra
    public function getIdSale($idSale){

        try{
            $stm = $this->pdo->prepare("SELECT det_id AS id, det_preciBuy AS buy, det_preciSale as sal, det_quantity AS quanty, det_discount AS disc,
                                            prod_name AS 'name', prod_image AS img, prod_marca AS marca, prod_type AS 'type', prod_description AS 'desc', prod_category AS categ 
                                        FROM sale_detail
                                        JOIN products ON det_PrdId = prod_id
                                        WHERE det_saleId = ?");
            $stm->execute(array($idSale));
            return $stm->feTchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }

    public function update(){}

    public function delete($id){}
}

?>