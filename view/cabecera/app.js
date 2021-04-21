//variables
const spinners = document.querySelector('.spinner');
const btnHistorial = document.querySelector('#btn-historial');

eventListener();

//funciones
function eventListener(){

    //al cargar la pagina
    document.addEventListener('DOMContentLoaded', iniciar);

    //al dar click
    btnHistorial.addEventListener('click', mostrarSpinner);
}

//funcion al iniciar el app
function iniciar(){

    spinners.classList.add('d-none');
}

function mostrarSpinner(e){
    spinners.classList.remove('d-none');
}