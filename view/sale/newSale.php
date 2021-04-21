<?php require_once('view/menu/menu.php');?>
<div class="container-fluid animate__animated animate__lightSpeedInRight">
  <div class="row justify-content-center">
  <?php
    if(isset($_REQUEST['ventaFails'])):?>
    <script>
        alert("Error al procesar el pago");
    </script>
    <div class="alert alert-danger" role="alert">
   A ocurrido un error al procesar el pago de la compra, por favor verifique los datos de la tarjeta
    </div>
    <?php endif?>
    <div class="col-12 col-md-10  mt-3">
    <div class="col-12 text-center mb-4 "> <h4><u>INFORMACION DE LOS PRODUCTOS</u></h4> </div>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              PRODUCTOS DEL CARRITO
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="compra">
                <div class="lista-compra tabla">
                  <table class="table table-sm p-2 mt-1">
                    <thead>
                      <tr>
                        <th>Imagen</th>
                        <th class='phone-none'>Nombre</th>
                        <th>Precio</th>
                        <th class='phone-none'>Cantidad</th>
                        <th class='phone-true'>#</th>
                        <th>Ahorra!</th>
                        <th>Total</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-10 mt-2">
      <form action="index.php?controller=sale&&action=addSale" method="POST" id='form'>
        <div class="row justify-content-center mt-4 mb-2">
        <div class="col-12 text-center mb-4"> <h4><u>INFORMACION DE LA COMPRA</u></h4> </div>
        <input type="hidden" name='productSale' class='producSale'>
        <input type="hidden" name='saleDetails' class='saleDetails'>
        <input type="hidden" name='idUser' value='<?php echo $user->usr_id?>'>
        <div class="col-12 col-sm-6 col-md-4 col-xl-2">
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Total</label>
              <input class="form-control form-control border border-1 border-info" disabled id='total' name='total' type="text" aria-label=".form-control-lg example">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-xl-2">
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Sub-Total</label>
              <input class="form-control form-control border border-1 border-info" disabled id='subTotal' name='subTotal' type="text" aria-label=".form-control-lg example">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-xl-2">
            <div class="mb-3">
              <label for="exampleInput" class="form-label">IVA</label>
              <input class="form-control form-control border border-1 border-info" disabled id='iva' name='iva' type="text" aria-label=".form-control-lg example">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-xl-2">
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Ahorra</label>
              <input class="form-control form-control border border-1 border-info" disabled id='ahorra' name='ahorra' type="text" aria-label=".form-control-lg example">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-xl-2">
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Cantidad</label>
              <input class="form-control form-control border border-1 border-info" disabled id='cantidad' name='cantidad' type="text" aria-label=".form-control-lg example">
            </div>
          </div>
          <hr>
        </div>
        <div class="row justify-content-center mt-4">
        <div class="col-12 text-center mb-4"> <h4><u>INFORMACION PARA REALIZAR EL PAGO</u></h4> </div>
        <div class="alert alert-danger alerta d-none" role="alert">
         Error al validar estos campos
        </div>
          <div class="col-12">
            <div class="mb-3 name position-relative">
              <label for="exampleInput" class="form-label">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-credit-card ms-2" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                    <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                  </svg>
                  Numero Tarjeta
              </label>
              <input class="form-control form-control border border-1 border-info" autocomplete="off" id='numTarjeta' name='numTarjeta' type="text" aria-label=".form-control-lg example">
             <div id="emailHelp" class="form-text">Puedes ingresar los dos nombres</div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="mb-3 name">
              <label for="exampleInput" class="form-label">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                    path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                  </svg>
                  Vigencia
                </label>
              <input class="form-control form-control border border-1 border-info" autocomplete="off" id='vigencia' name='vigencia' type="text" aria-label=".form-control-lg example">
              <div id="emailHelp" class="form-text">Mes/Dia</div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="mb-3 name">
              <label for="exampleInput" class="form-label">CVV</label>
              <input class="form-control form-control border border-1 border-info" autocomplete="off" id='CVV' name='cvv' type="text" aria-label=".form-control-lg example">
            <div id="emailHelp" class="form-text">Puedes ingresar los dos nombres</div>
          </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="mb-3 name">
              <label for="exampleInput" class="form-label">Correo Electronico</label>
              <input class="form-control form-control border border-1 border-info" disabled value='<?php echo $user->usr_email?>' id='name' name='name' type="text" aria-label=".form-control-lg example">
            <div id="emailHelp" class="form-text">Correo electronico registrado</div>
          </div>
          </div>
        <div class="col-10 text-center mb-4">
          <div class="spinner d-none">
            <div class="spinner-border text-primary" style="width: 5rem; height: 5rem;" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
          <div class="my-2">
            <button type="submit" class="btn btn-primary mb-1 col-12 col-sm-3" style="width: 200px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
               COMPRAR?
            </button>

            <a href='index.php?controller=product&action=indexProduct' class="mb-1 col-12 col-sm-3  btn btn-success" style="width: 200px;" disabled> 
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
              AGREGAR?
            </a>

            <a href='index.php?controller=product&action=indexProduct&mensaje=venta-cancelada' class="mb-1 col-12 col-sm-3 btn btn-danger btn-cancelar" style="width: 200px;" disabled>
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-x" viewBox="0 0 16 16">
                <path d="M7.354 5.646a.5.5 0 1 0-.708.708L7.793 7.5 6.646 8.646a.5.5 0 1 0 .708.708L8.5 8.207l1.146 1.147a.5.5 0 0 0 .708-.708L9.207 7.5l1.147-1.146a.5.5 0 0 0-.708-.708L8.5 6.793 7.354 5.646z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
              CANCELAR?
            </a>
          </div>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type='text/javascript' src='view/sale/newSale.js'></script> 

