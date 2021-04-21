<?php

    require_once 'models/user.php';

    class UserController{
        
        private $model;

        public function __construct(){
            $this->model = new User();
        }

        //listar todos los usuarios
        public function indexUser(){
            require_once 'view/user/indexUser.php';
        }
        
        //verificar si el email existe
        public function emailExist()
        {
            
            $email = trim(strtoupper($_POST['email']));
            $respuesta = $this->model->emailExist($email);

            if($respuesta){
                $image = $respuesta->usr_image;
                $email = $respuesta->usr_email;
                
                header("Location:view/login/login2.php?email=$email&&image=$image");
            }else
            {
                header('Location:view/login/login.php?email='.$email);
            }
        }
        //logear el usuario
        public function login()
        {
            $email = trim(strtoupper($_POST['email']));
            $pass = trim($_POST['password']);
            $image = trim($_POST['image']);

            $user = $this->model->login($email,$pass);

            if($user){
                
                $cadena = json_encode($user);
                session_start();
                $_SESSION['user']=$cadena;

                $mensaje = 'Bienvenid@: '.$user->usr_name." ".$user->usr_surname;
                header('Location:index.php?controller=product&action=indexProduct&mensaje='.$mensaje);
            }else {
 
                $mensaje=true;
                header("Location:view/login/login2.php?email=$email&&mensaje=$mensaje&&image=$image");   
            }
        }
        //registrar usuario
        public function register(){

            $user = new User();
            $user->name = trim(strtoupper($_POST['name']));
            $user->surname = trim(strtoupper($_POST['surname']));
            $user->email = trim(strtoupper($_POST['email']));
            $user->pass = trim(strtoupper($_POST['pass']));

            $respuesta = $this->model->emailExist($user->email);

            if($respuesta){

               header('Location:view/register/register.php?email='.$user->email);
            }else{
                $user->add();
                $mensaje = true;
                header("Location:view/login/login2.php?email=$user->email&&image=default/usuario.jpg&&mensaje2=$mensaje");
            }
        }

        //public function editar usuario
        public function formEditUser(){

            require_once('view/user/editUser.php');
        }

        //editar el usuario
        public function editUser(){
            $user = new User();
            $validarEmail = false;
            $subirImagen = false;
            $editarUsuario = false;

            //usuario logiado
            session_start();
            $loginUser = json_decode($_SESSION['user']);

            //recoger los datos que me envian
            $user->id = trim($loginUser->usr_id);
            $user->name = trim(strtoupper($_POST['name']));
            $user->surname = trim(strtoupper($_POST['surname']));
            $user->email = trim(strtoupper($_POST['email']));
            
            $pass = trim($_POST['pass']);
            $imagen = trim($_FILES['src-file1']['name']);

            $emailExist= $this->model->emailExist($user->email);
           
            //validar el email
            if($emailExist){
                if(trim($emailExist->usr_email) === $loginUser->usr_email){

                    $validarEmail = true;
                }else
                {
                    $validarEmail = false;
                }
            }else{
                $validarEmail = true;
            }


            if($validarEmail){
                //subir la nueva imagen
                if(!isset($imagen) || $imagen ==='')
                {
                   $user->image = $loginUser->usr_image;
                   $subirImagen = true;
                }else
                {
                    
                    $user ->image = 'usuarios/'.$user->email.".".str_replace("image/","",trim($_FILES['src-file1']['type']));
                    $archivo = $_FILES['src-file1']['tmp_name'];

                    //si no es la imagen por default se borrara del servido
                    if(trim($loginUser->usr_image) !== 'default/usuario.jpg'){
                        unlink('imagenes/'.$loginUser->usr_image);
                    }
                    
                    if(move_uploaded_file($archivo, 'imagenes/'.$user->image))
                    {
                        $subirImagen = true;
                    }else{
                        $subirImagen = false;
                    }
                }

               
                //actualizar los datos de la base de datos
                if(!isset($pass) || $pass===null || $pass===''){
                    if($user->update()){
                        
                        $editarUsuario = true;
                    }
                    
                }else{
                    $user->pass=$pass;
                    if($user->updateAll()){
                        $editarUsuario = true;
                    }
                }

                //si el usuario se actualizo carrectamente
                if($editarUsuario){
                    
                    //actualizar los datos de la session
                    $userActualizado = $user->getUser($user->email);
                    $cadena = json_encode($userActualizado);

                    //agregar la session nueva
                    $_SESSION['user']=$cadena;
                    $_SESSION['user']=$cadena;
                    $_SESSION['user']=$cadena;

                    //si se pudo subir la imagen
                    if($subirImagen){
                        $mensaje = 'Usuario actualizado correctamente';
                        header('Location:index.php?controller=product&action=indexProduct&mensaje='.$mensaje);
                    }else
                    {
                        $mensaje = 'Error, al subir la imagen, usuario actualizado';
                        header('Location:index.php?controller=product&action=indexProduct&mensaje='.$mensaje);
                    }
                }
            }else{
                header('Location:index.php?controller=user&action=formEditUser&email='.$user->email);
            }
        }
        //cerrar session
        public function cerrarSesion(){
            session_destroy();
            session_destroy();
            session_unset('user');
            header('Location:index.php');
            
        }
    }

?>