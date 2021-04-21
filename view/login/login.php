<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--estilos-->
    <link href="Styles.css" rel="stylesheet">
    <link href="../../css/Spinner.css" rel="stylesheet">

    <!--alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--google-font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Original+Surfer&display=swap" rel="stylesheet">

    <!--animate-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Ingresar..</title>
  </head>
  <body>

    <div class="container">
       <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-lg-6 my-5 pt-5 degradado-2 rounded shadow animate__animated animate__zoomInDown">
        <?php if(isset($_REQUEST['email'])):?>
            <script>
              swal("Error!", "A ocurrido un error al Logiarte!", "error");
            </script>
            <div class="alert alert-danger" role="alert">
               El Correo "<?php echo $_REQUEST['email'];?>" no existe <a href="../register/register.php" class="alert-link">Registrate aqui</a>
            </div>
        <?php endif?>
            <form action="../../index.php?controller=user&action=emailExist"  method='POST' id='form' class="p-3  position-relative">
              <h1 class='text-warning'>Logeate para poder ingresar</h1>
                <div class="mb-3 pt-2 border-top border-white">
                    <label for="exampleInputEmail1" class="form-label text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                      Direccion de Correo Electronico
                    </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <input type="hidden" value='login' name='login'/>
                    <div id="emailHelp" class="form-text text-white">Ingresa tu cuenta de Correo con el que te registraste </div>
                </div>
                <button type="submit" class="btn btn-outline-warning btn-lg mb-1">Ingresar</button>
                <div class="my-3">
                   <p class='text-white'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-plus mx-2" viewBox="0 0 16 16">
                      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                      <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                      Si no te as registrado... 
                    <a class='text-warning' href="../register/register.php">
                      <b> 
                        Click aqui
                      </b>
                    </a>
                </div>
                <!--SPINNER-->
                <div class="sk-folding-cube d-none position-absolute bottom-0 start-50 translate-middle-x" id='spinner'>
                  <div class="sk-cube1 sk-cube"></div>
                  <div class="sk-cube2 sk-cube"></div>
                  <div class="sk-cube4 sk-cube"></div>
                  <div class="sk-cube3 sk-cube"></div>
                </div> 
            </form>
        </div>
       </div>
    </div>

        <!--mis script-->
        <script type="text/javascript" src='js/login1.js' ></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
