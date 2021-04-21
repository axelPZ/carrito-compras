<?php
    require_once 'models/sale.php';
    require_once 'models/saleDetails.php';
    require_once 'models/product.php';

    class SaleController{

        private $model;
        private $detailsSale;
        private $product;

        public function __construct()
        {
            $this->model = new Sale();
            $this->detailsSale = new SaleDetails();
            $this->product = new Product();    
        }

        //ver las compras
        public function getSale(){

            require_once('view/sale/indexSale.php');
        }

        //new sale
        public function newSale(){
            require_once('view/sale/newSale.php');
        }

        //agregar la compra
        public function addSale(){
            $details  = new SaleDetails();
            $sale = new Sale();

            //datos de las tarjetas
            $numTarjeta = intval(trim(str_replace(" ","", $_POST['numTarjeta'])));
            $vigencia = $_POST['vigencia'];
            $CVV = $_POST['cvv'];

            if($sale->pagoCompra($numTarjeta, $vigencia, $CVV)){

                //datos que vienen del front end
                $fecha = $this->model->getDate()->FECHA;
                $producSale = json_decode($_POST['productSale']);
                $saleDet = $_POST['saleDetails'];
                $detailsSale = explode(',',$saleDet);

                $neto = str_replace("\"","",$detailsSale[1]);
                $iva =  str_replace("\"","",$detailsSale[2]);
                $total = floatval($neto) + $iva;
                $ahorra =str_replace("]","",$detailsSale[3]);
                $ahorra =str_replace("\"","",$ahorra);

                //datos de la venta
                $sale->date = trim($fecha);
                $sale->userId= trim(intval($_POST['idUser']));
                $sale->ahorra =trim($ahorra);
                $sale->neto = trim($neto);
                $sale->iva = trim($iva);
                $sale->total = trim($total);

                //datos del detalle de la venta
                $idSale = (!trim($this->model->getMaxId()->Id)) ? 1 : trim($this->model->getMaxId()->Id) ;

                if($sale->add()){
                    foreach($producSale as $product){
                        $details->idProduct = trim($product->id);
                        $details->idSale = $idSale;
                        $details->preciSale = trim($product->precy);
                        $details->preciBuy = trim($this->product->getById($product->id)->prod_piceBuy);
                        $details->quantity = trim($product->cantidad);
                        $details->discount = trim($product->discount);

                        if(!$details->add()){
                            $sale->delete($details->sale);
                            break;
                            header('Location:index.php?controller=product&action=indexProduct');
                        }else{
                            $mensaje = "Compra realizada correctamente";
                            header('Location:index.php?controller=product&action=indexProduct&mensaje='.$mensaje);
                        }
                        
                    }
                
                }
            }else
            {
                header('Location:index.php?controller=sale&&action=newSale&ventaFails=true');
            }

        }
    }

?>