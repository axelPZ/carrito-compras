
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

    <!--animate-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Ingresar..</title>
  </head>
  <body>
    <div class="container">
       <div class="row justify-content-center">
        <div class="col-10 col-sm-8 col-lg-6 my-5 pt-5 degradado-2 animate__animated animate__rotateIn">

        <?php if(isset($_REQUEST['mensaje'])):?>
          <script>
            swal("Error!", "A ocurrido un error con la Password!", "error");
          </script>
            <div class="alert alert-danger text-white" role="alert">
               Password incorrecta para el correo: <?php echo $_REQUEST['email'];?>, Intenta de nuevo, o <a href="login.php" class="alert-link">Ingresa otro correo aqui</a>
            </div>
        <?php endif?>
        <?php if(isset($_REQUEST['mensaje2'])):?>
          <script>
            swal("Que bien!", "Ya te as registrado!", "success");
          </script>
            <div class="alert alert-info text-dark" role="alert">
               Te has registrado correctamente ahora ingresa tu contraseña para ingresar.<br/> para cambiar tu imagen ve al menu luego a editar usuario
            </div>
        <?php endif?>

            <form action="../../index.php?controller=user&action=login" method='POST' position-relative" id='form'>
                <div class="mb-3">

                    <img src="../../imagenes/<?php echo $_REQUEST['image'];?>" class="rounded mx-auto d-block img-fluid" style='width: 300px;'>
                    <label for="exampleInputEmail1" class="form-label text-white">
                      <b>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        Ingresa la Password de <?php echo $_REQUEST['email']; ?>
                      </b>
                    </label>
                    <input type="hidden" value='login' name='login'/>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    <input type="hidden" value="<?php echo $_REQUEST['email'];?>" name='email'>
                    <input type="hidden" value="<?php echo $_REQUEST['image'];?>" name='image'>
                    <div id="emailHelp" class="form-text text-white">
                        Ingresa tu Password
                    </div>
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
                <div class="spinner d-none position-absolute bottom-0 start-50 translate-middle-x">
                  <div class="cube1 bg-info"></div>
                  <div class="cube2 bg-info"></div>
                </div>
            </form>

        </div>
       </div>
    </div>
     <!--mis script-->
     <script type="text/javascript" src='js/login2.js' ></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
