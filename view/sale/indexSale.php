<?php require_once('view/menu/menu.php');?>

<div class="container-fluid py-4 my-1 degradado-2">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-3 border border-white bg-white p-1">
            <div class="list-group d-flex flex-column animate__animated animate__fadeInDown">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="imagen degradado p-1" style="width: 200px;">
                            <div class="img-fulid">
                                <img src="imagenes/<?php echo $user->usr_image?>" class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                    <h6 class="mb-1"><?php echo $user->usr_name . " " . $user->usr_surname?></h6>
                    <p class="mb-1"><?php echo $user->usr_email?></p>
                </a>
                <?php foreach($this->model->getDetalleCompra($user->usr_id) as $detalle):?>

                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Cantidad Total</h6>
                            <small>Q. <?php echo $detalle->total;?></small>
                        </div>
                        <p class="mb-1">La cantidad total comprado por el usuario.</p>
                        <small>And some small print.</small>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">El total ahorrado</h6>
                            <small>Q. <?php echo $detalle->ahorra;?></small>
                        </div>
                        <p class="mb-1">Es el total de lo ahorrado en todas sus compras.</p>
                        <small>And some small print.</small>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Cantidad de productos</h6>
                            <small><?php echo $detalle->cantidad;?></small>
                        </div>
                        <p class="mb-1">La cantidad de productos adquiridos por el usuario.</p>
                        <small>And some small print.</small>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1">Compra mas alta</h6>
                            <small>Q. <?php echo $detalle->maximo;?></small>
                        </div>
                        <p class="mb-1">Es la compra mas alta registrada hasta el momento.</p>
                        <small>And some small print.</small>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
        <div class="col-12 col-lg-9 p-1 animate__animated animate__fadeInLeft">
            <div class="text-center p-3">
                <h4 calss="text-center"> <u class="text-white">COMPRAS REALIZADAS</u> </h4>
            </div>
            <div class="accordion degradado p-2 contenido-detalles" id="accordionExample">
            
                <?php if(sizeof($this->model->getUserSale($user->usr_id)) ===0 ):?>
                    <div class="alert alert-warning" role="alert">
                        Vaya! aun no tienes ninguna compra realizada. <a href="index.php?controller=product&action=indexProduct" class="alert-link">Click aqui..</a> para ver nuestros productos, y puedas comprar algo
                    </div>
                <?php endif;?>


                <?php foreach($this->model->getUserSale($user->usr_id) as $sale):?>
   
                    <div class="accordion-item">
                        <h2 class="accordion-header p-1 animacion" id="flush-heading<?php echo $sale->sal_id?>">
                            <button class=" accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $sale->sal_id?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $sale->sal_id?>">
                                
                            <div class="contSale d-flex">
                                <p class='px-1 '> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                    </svg>
                                    <?php echo " ".substr($sale->sal_date, 0, strlen($sale->sal_date)-9);?>
                                </p>
                                <p class='px-1 border-start'> <b> Total: Q.</b>   <?php echo $sale->sal_Total?> </p>
                                <p class='px-1 border-start phone-none'> <b> Neto: Q.</b>     <?php echo $sale->sal_neto?></p>
                                <p class='px-1 border-start'> <b> IVA: Q.</b>     <?php echo $sale->sal_IVA?></p>
                                <p class='px-1 border-start responsive'> <b> Cantidad: </b>     <?php echo $sale->cantidad?></p>
                            </div>
                                
                            </button>
                        </h2>
                        <div id="flush-collapse<?php echo $sale->sal_id?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $sale->sal_id?>" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body tabla">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Ahorro</th>
                                        <th class='phone-none'>Nombre</th>
                                        <th class='phone-none'>Marca</th>
                                        <th class='display-responsive'>Tipo</th>
                                        <th class='display-responsive'>Categoria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->detailsSale->getIdSale($sale->sal_id) as $det): ?>
                                        <tr>
                                            <td>
                                                <img src="./imagenes/<?php echo $det->img?>" class="img-acordeon" alt="...">
                                                <span class='phone-true'><?php echo $det->name?></span>
                                            </td>
                                            <td> <span class='phone-none'>Q.</span> <?php echo $det->sal?></td>
                                            <td><?php echo $det->quanty?></td>
                                            <td><span class='phone-none'>Q.</span> <?php echo $det->disc?></td>
                                            <td class='phone-none'><?php echo $det->name?></td>
                                            <td class='phone-none'><?php echo $det->marca?></td>
                                            <td  class='display-responsive'><?php echo $det->type?></td>
                                            <td class='display-responsive'><?php echo $det->categ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>            
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>





