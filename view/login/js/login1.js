
const spinner = document.querySelector('#spinner');
const form = document.querySelector('#form');


//event listener
eventListener();


//funciones 
function eventListener(){

    //al cargar la pagina
    document.addEventListener('DOMContentLoaded', iniciarApp);

    //ir a verificar el login
    form.addEventListener('submit', verificarLogin);

}

//funcion al inicar el app
function iniciarApp(){

    spinner.classList.add('d-none');
    form.reset();
}

//funcion para mostrar el spinner
function verificarLogin(){
    spinner.classList.remove('d-none');

}

