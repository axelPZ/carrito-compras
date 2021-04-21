<?php

    require_once 'models/product.php';

    class ProductController{

        private $model;

        public function __construct(){

            $this->model = new Product();
        }

        //listar todos los productos
        public function indexProduct(){
            require_once 'view/product/indexProduct.php';
        }
    }


?>