const form = document.querySelector('#form');
const btnRegistrar = document.querySelector('#btn-registrar');
const name = document.querySelector('#name');
const surname = document.querySelector('#surname');
const email = document.querySelector('#email');
const pass = document.querySelector('#pass');
const pass2 = document.querySelector('#pass2');
const spinner = document.querySelector('.spinner');

const erEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const erName =/[a-zA-z]+$/;
const erPass =/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,10}$/;


eventListener()



//event listener
function eventListener(){

    //se carge la pagina
    document.addEventListener('DOMContentLoaded', iniciarApp);

    //validar inputs
    name.addEventListener('blur',validarInput);
    surname.addEventListener('blur',validarInput);
    email.addEventListener('blur',validarInput);
    pass.addEventListener('blur',validarInput);
    pass2.addEventListener('blur',validarInput);

    //submit en el formulario
    form.addEventListener('submit',enviarRegistro);
}

//funciones
function iniciarApp(){
    btnRegistrar.disabled = true;
    spinner.classList.add('d-none');
    form.reset();
}

//validar el formulario
function validarInput(e){

    //remover el error
    removeError(e);

    if(e.target.value.length > 0){
        if(e.target.type === 'text'){

            if(erName.test(e.target.value))
           {
               removeError(e);
           }else
           {
               addError(e,'Se escribieron caracteres no soportados');
           }
    
        }else if(e.target.type==='email'){

            if(erEmail.test(e.target.value)){
                removeError(e);
            }else{ 
                addError(e,'Email no valido');
            }

        }else if(e.target.type==='password'){

            if(e.target.value.length!==8){
                addError(e,'Solo se haceptan 8 caracteres');

            }else if(erPass.test(e.target.value)){
                
                if(e.target.name ==='pass2'){
                    console.log(pass.value);
                    console.log(pass2.value);
                    if(e.target.value.trim() !== pass.value.trim()){
                        addError(e,'las Password no son iguales');
                    }
                }
            }else{
                addError(e,'la Password tiene que tener por lo menos Una "M", una "m", y un numero');
            }
        }
    }else{

        addError(e,'Casilla Obligatoria');
        }

        //si los campos pasaron la validacion
        if(erEmail.test(email.value) && erName.test(name.value) && erName.test(surname.value) && erPass.test(pass.value) && erPass.test(pass2.value)){
            
            if(pass.value.trim() === pass2.value.trim()){
                btnRegistrar.disabled = false;
            }
        }

    
}
//agregar error
function addError(e,mensaje){

    const p = document.createElement('p');
    p.textContent=mensaje;
    p.classList.add('text-danger','error');

    e.target.classList.remove('border-info');
    e.target.classList.add('border-danger');
    e.target.parentElement.insertBefore(p,e.target.parentElement.children[2]);

    p.style.margin=0;
    p.style.padding=0;
    p.style.textSize=10;
    p.style.fontWeight = 'bold';  
}

//remover el error
function removeError(e){
    e.target.classList.remove('border-danger');
    e.target.classList.add('border-info');
    for(let hijo of e.target.parentElement.children)
    {
       if(hijo.classList.contains('error'))
       {
           hijo.remove();
       }
    }
}

function enviarRegistro(e){

    spinner.classList.remove('d-none');

  const respuesta = confirm('Estas seguro de registrarse con estos datos');
  if(!respuesta){
   e.preventDefault();
   spinner.classList.add('d-none');
  }

}