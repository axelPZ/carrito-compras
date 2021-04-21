
const spin = document.querySelector('#spinner');
const itemsMenu = document.querySelectorAll('.menu a');
const btnArriba = document.querySelector('#btn-arriba');

eventListener();

clickMenu();

function eventListener(){

  btnArriba.addEventListener('click',arriba);
}

//funciones

//click en el menu
function clickMenu(){

    itemsMenu.forEach((item,i) =>{

        if(i!==3) item.addEventListener('click',mostrarEspinner);
    });
}
//mostrar el espinner
function mostrarEspinner(e){
    
    if(spin.classList.contains('d-none')){
        spin.classList.remove('d-none');
    }else{
        spin.classList.add('d-none');
    }
}

//ir arriba de la pagina
function arriba(){
    const body = document.querySelector('body');
        window.scroll(0,0);
   
}