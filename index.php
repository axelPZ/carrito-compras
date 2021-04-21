<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--estilos css-->
    <link href='css/style.css' rel="stylesheet">
    <link href='css/animaciones.css' rel="stylesheet">
    <link href='css/Spinner.css' rel="stylesheet">

    <!--alert-->
    <!--https://sweetalert.js.org/guides/-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--animate css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!--google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@1,300&family=Oswald:wght@500&family=PT+Sans+Narrow&display=swap" rel="stylesheet"> 

    <title>Carrito de compras</title>
  </head>
  <body>
    <?php 
      if(!isset($_REQUEST['controller'])):
        header('Location:view/login/login.php');
        
      else :?>
      <div class="contenido">
            <?php
            
              $controller = $_REQUEST['controller'];
              $action = $_REQUEST['action'];
              require_once 'controller/controller_'.$controller.'.php';
                
              $controller = ucwords($controller).'Controller';
              $controller = new $controller;
              call_user_func(array($controller,$action));
           endif;
           
           require_once 'view/footer/footer.php';
           ?>
           <div class="spinner d-none position-absolute top-50 start-50 translate-middle" id='spinner'>
            <div class="cube1 degradado shadow"></div>
            <div class="cube2 degradado shadow"></div>
          </div>
      </div>

      <!--mis script-->
      <script type='text/javascript' src='js/app.js'>
      </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
