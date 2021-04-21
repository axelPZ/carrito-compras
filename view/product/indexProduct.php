<?php require_once('view/menu/menu.php');?>
<?php require_once('view/cabecera/cabecera.php');?>

<?php
if(isset($_REQUEST['mensaje'])):?>
<script>
    swal({
        title: "Confirmacion!",
        text: "<?php echo $_REQUEST['mensaje']?>",
        icon: "success",
        button: "Ok!",
    });
    localStorage.removeItem('compra');
</script>
<?php endif?>
<div class="container-fluid shadow">
<div class="row degradado mb-4 justify-content-center" style="-bs-gutter-x: 0 !important;">
        <div class="col-12 col-lg-5 p-2 justify-content-center">
            <form class='ms-2 d-flex flex-column align-items-center flex-sm-row justify-content-sm-center'>
                <div class='pt-1 select'>
                    <select class="form-select shadow" aria-label="Default select example" style="width: 200px;">
                        <option selected>Opcion</option>
                        <option value="nombre">Nombre</option>
                        <option value="marca">Marca</option>
                        <option value="tipo">Tipo</option>
                    </select>
                </div>
                <div class="pt-1 ms-1 input">
                    <input type="text" class="form-control shadow" id="exampleInputEmail1" placeholder="Buscar" style="width: 100%;" aria-describedby="emailHelp">
                </div>
                <div class="pt-1">
                    <button type="button" class="btn btn-outline-light shadow" id='buscar'>
                        Buscar
                    </button>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-5 mt-2 d-flex justify-content-center">
            <select class="form-select shadow" aria-label="Default select example" id='select-categoria' style="width: 220px;">
                <option value='TODOS' selected>Seleccionar Categoria?</option>
                <option value="CONSTRUCCION">Construccion</option>
                <option value="VESTUARIO">Vestuario</option>
                <option value="EDUCACION">Educacion</option>
                <option value="CELULAR">Celulares</option>
                <option value="TODOS">Todos</option>
            </select>
        </div>
        <div class="col-12 my-1 text-center contendorCarrito">
            <img src='./imagenes/system/cart.png '>
            <div class="carrito shadow d-none text-center animate__animated animate__lightSpeedInRight position-absolute">
                <div class="lista-carrito position-relative">
                    <button type="button" class="btn-close position-absolute top-0 start-0 translate-middle" aria-label="Close"></button>
                    <table class="table table-sm p-2 mt-1">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th class='display-responsive'>Cantidad</th>
                                <th class='display-responsive'> Ahorra!</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody> 
                    </table>
                    <div class="spinner-grow d-none" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="btn-group mb-1" role="group" aria-label="Basic outlined example">
                    <a class="btn btn-primary btn-empezarCompra text-white" href="index.php?controller=sale&&action=newSale" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        Comprar
                    </a>
                    <button type="button" class="btn btn-warning btn-vaciarCarrito text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                            <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        Vaciar carrito
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row listaProducts">
        <?php foreach ($this->model->getAll() as $product ):?>
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
                <div class="animacion p-1 mb-5 position-relative">
                    <div class="card bg-body "  id='card-product'>
                        <?php if($product->prod_discount > 0):?>
                            <h6 class="p-1 mt-1 ms-1 degradado rounded-start text-white position-absolute top-0 start-0" style="width: 20%;">en oferta</h6>
                        <?php endif;?>
                        
                        <img src="./imagenes/<?php echo $product->prod_image?>" class="mt-1 mx-auto d-block btn-image" data-id="<?php echo $product->prod_id;?>" style="width: 200px; height: 200px; " alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $product->prod_name?></h4>
                            <p class="product-type"> <?php echo $product->prod_marca?></p>
                            <hr>
                            <p class="my-1 "><b><?php echo $product->prod_category?></b></p> 
                            <p class='descripcion'><?php echo $product->prod_description?></p>
                            <div class="d-flex justify-content-around mt-2">
                                <p class='piceBuy '><b>Q. </b><span><?php echo $product->prod_piceSell?> </span></p>
                                <p class='discount ps-1 border-start'><b>Menos: </b><span><?php echo $product->prod_discount?></span>%</p>
                                <p class='total ps-1 border-start'><b>Total: Q. </b><span><?php echo Total($product->prod_piceSell,$product->prod_discount);?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <!--mis script-->
    <script> const productos = <?php echo json_encode($this->model->getAll()); ?>; </script>
    <script type="text/javaScript" src="view/product/appProduct.js"></script>
    <script type="text/javaScript" src="view/product/Buscador.js"></script>
</div>
<?php
function Total($price,$discount=0){
    $discount = $discount/100;
    $resultado=$price*$discount;
    return $price -$resultado;
}
?>