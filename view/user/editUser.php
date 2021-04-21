<?php require_once('view/menu/menu.php');?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8">
            <?php if(isset($_REQUEST['email'])):?>
                <div class="alert alert-danger" role="alert">
                Ya Existe una cuenta con el Correo... <?php echo $_REQUEST['email'];?>, por favor ingresa otro
                </div>
            <?php endif?>
            <form action="index.php?controller=user&action=editUser" method='POST' enctype="multipart/form-data" id='form' class="py-2 position-relative">
                <div class="mb-3 img mt-3 position-relative border border-1 degradado-2">
                    <div class="img p-1 mx-auto mt-2 degradado rounded  img-user">
                        <img src="imagenes/<?php echo $user->usr_image?>" id="imagen" class="rounded mx-auto d-block img-fluid animate__animated animate__zoomInDown" style="width: 400px;" alt="...">
                    </div>
                    <div class="file-select my-2 shadow animate__animated animate__flip" id="src-file1" >
                        <input type="file" name="src-file1" class='file' onchange="seleccionado()"  accept=".jpg, .png, .ppeg">
                    </div>  
                </div>
                <div class="mb-3 name">
                    <label for="exampleInput" class="form-label">Nombre</label>
                    <input class="form-control form-control border border-1 border-info" value='<?php echo $user->usr_name?>' id='name' name='name' type="text" aria-label=".form-control-lg example">
                    <div id="emailHelp" class="form-text">Puedes ingresar los dos nombres</div>
                </div>
                <div class="mb-3 surname">
                    <label for="exampleInput" class="form-label">Apellido</label>
                    <input class="form-control form-control border border-1 border-info"  value='<?php echo $user->usr_surname?>' id='surname' name='surname' type="text" aria-label=".form-control-lg example">
                    <div id="emailHelp" class="form-text">Ingresa tu apellido</div>
                </div>
                <div class="mb-3 email">
                    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control border border-1 border-info"  value='<?php echo $user->usr_email?>' id='email' name='email' id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Con la cuenta de correo electronico ingresaras a la pagina.</div>
                </div>
                <div class="accordion accordion-flush border" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Cambiar la Password
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="mb-3 password">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control border border-1 border-info" id='pass' name="pass" id="exampleInputPassword1">
                                    <div id="emailHelp" class="form-text">Solo se haceptan 8 caracteres, Una "May", una "min", y un numero</div>
                                </div>
                                <div class="mb-3 password">
                                    <label for="exampleInputPassword1" class="form-label">Repetir Password</label>
                                    <input type="password" class="form-control border border-1 border-info" id='pass2' name="pass2" id="exampleInputPassword1">
                                    <div id="emailHelp" class="form-text">Solo se haceptan 8 caracteres, Una "May", una "min", y un numero</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spinner d-none position-fixed top-50 start-50 translate-middle">
                        <div class="cube1 degradado shadow"></div>
                        <div class="cube2 degradado shadow"></div>
                </div>
                <button type="submit" id='btn-registrar' class="btn btn-lg btn-success mt-2" disabled='disabled'>Confirmar Cambios</button>
            </form>
        </div>
    </div>
    <!--mi script-->
    <script text="type/text" src='view/user/edit.js' ></script>
</div>