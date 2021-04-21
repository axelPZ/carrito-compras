
//variables
const compra = document.querySelector('.compra');
const contenedorCompra = document.querySelector('.lista-compra table tbody');
const total = document.querySelector('#total');
const subTotal = document.querySelector('#subTotal');
const iva = document.querySelector('#iva');
const ahorra = document.querySelector('#ahorra');
const cantidad = document.querySelector('#cantidad');
const numTarjeta = document.querySelector('#numTarjeta');
const vigencia = document.querySelector('#vigencia');
const CVV = document.querySelector('#CVV');
const productSale = document.querySelector('.producSale');
const productDetails = document.querySelector('.saleDetails');
const spinner = document.querySelector('.spinner');
const btnCancelar = document.querySelector('.btn-cancelar');

const form = document.querySelector('#form');

let validacion = false;
let datosCompra = [];

let listaCompra = JSON.parse(localStorage.getItem('compra'));
let cantidadProducto =0;
let subTotalCompra=0;
let totalDescuento=0;
let totalIva=0;

const erNumber =/[0-9]+$/;

//expresiones regulares
eventListener();

//event Listener
function eventListener(){

    //al cargar la pagina
    document.addEventListener('DOMContentLoaded', iniciarApp);
    
    //eliminar producto de la compra
    compra.addEventListener('click',eliminarProducto);

    //validar formulario
    numTarjeta.addEventListener('keyup',validarFormulario);
    vigencia.addEventListener('keyup',validarFormulario);
    CVV.addEventListener('keyup',validarFormulario);

    //empezar la compra
    form.addEventListener('submit',empezarCompra);

    btnCancelar.addEventListener('click',cancelarCompra);


}

//funciones

//empezar la compra
function empezarCompra(e){

    spinner.classList.remove('d-none');
    if(validacion){
        productSale.value = JSON.stringify(listaCompra);
        productDetails.value = JSON.stringify(datosCompra);
       

    }else{

        e.target.children[1].children[1].classList.remove('d-none');
        spinner.classList.add('d-none');
        e.preventDefault();
    }
}
//cancelar la compra
function cancelarCompra(e){
  let respuesta = confirm('esta seguro de eliminar la compra');
  if(!respuesta){
      e.preventDefault();
  }
    
}

//validar formulario
function validarFormulario(e){

    let value = e.target.value.trim();
    //remover errores
    removeError(e);

    if(value.length > 0){
        if(e.target.id === 'numTarjeta'){

            if(value.replace(/ /g, '').length <= 16){
                if(!erNumber.test(value)){
                    addError(e, 'Solo se permiten numeros');
                    e.target.value ='';
                }else{
                    
                   if(value.replace(/ /g, '').length % 4 === 0){
                     e.target.value = value + ' ';
                   }
               }
            }else{
                
                e.target.value = value.substring(0,19);
            }
        }if(e.target.id === 'vigencia'){
           if(value.length <= 5){
                if(!erNumber.test(value.replace(/\//g,''))){
                    addError(e, 'Solo se permiten numeros');
                    e.target.value ='';
                }else{
                    
                    if(value.length === 1 ){
                        if(value > 1){
                            e.target.value = '0'+ value +'/';
                        }
                    }else{
                        if(value.length === 2){
                            e.target.value = value + '/';
                        }
                    }
               }
            }else{
                e.target.value = e.target.value.substring(0,5);
            }   
        }if(e.target.id ==='CVV'){
            if(value.length <=3){
                if(!erNumber.test(value)){
                    addError(e, 'Solo se permiten numeros');
                }
            }else{
                e.target.value = e.target.value.substring(0,3);
            }
        }
    }

const valueVigencia = vigencia.value.trim()
const valueCVV = CVV.value.trim();

    if(erNumber.test( valueVigencia) && erNumber.test(valueCVV) && erNumber.test(numTarjeta.value.replace(/ /g,''))){

        validacion = true;
    }
}

//agregar errores
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
}

//remover error
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
//iniciar App
function iniciarApp(){

    spinner.classList.add('d-none');
    CVV.value='';
    numTarjeta.value='';
    vigencia.value ='';
     
    //agregar al HTML
     agregarHTML();
}

//agregar los productos
function agregarHTML(){

    //vaciar el HTML
    vaciarHTML();

    listaCompra.forEach(product =>
        {
            const {id, img, titulo, precy, discount, total, cantidad} = product;
            const fila = document.createElement('tr');
            fila.innerHTML = `
            
                <td> <img src="${img}" class='img-acordeon'> 
                    <span class='phone-true pt-1'>${titulo}</span>
                </td>
                <td class='phone-none'> ${titulo}</td>  
                <td> Q.${precy}</td>  
                <td> ${cantidad}</td>
                <td> Q.${discount.toFixed(2)}</td>  
                <td> Q.${total.toFixed(2)}</td>
                <td> <a href="#" class="btn-borrarProducto rounded-circle" data-id="${id}">X</a></td> 
            `;
            cantidadProducto += cantidad;
            subTotalCompra += total/1.12;
            totalIva += subTotalCompra*0.12;
            totalDescuento += discount;

            datosCompra = [];
            datosCompra = [cantidadProducto, subTotalCompra.toFixed(2), totalIva.toFixed(2), totalDescuento.toFixed(2)];
           contenedorCompra.appendChild(fila);
        });
        informacionCompra();
}

//informacion de la compra
function informacionCompra(){
    subTotal.value = "Q." + subTotalCompra.toFixed(2);
    iva.value = "Q." +totalIva.toFixed(2);
    total.value = "Q." + (subTotalCompra + totalIva).toFixed(2);
    ahorra.value = "Q." +totalDescuento.toFixed(2);
    cantidad.value = cantidadProducto;

}

//vaciar el HTML del carrito
function vaciarHTML(){

     cantidadProducto =0;
     subTotalCompra=0;
     totalDescuento=0;
     totalIva=0;
     let datosCompra = [];
    while(contenedorCompra.firstChild){
        contenedorCompra.removeChild(contenedorCompra.firstChild);
    }
}

//eliminar producto
function eliminarProducto(e){

    if(e.target.classList.contains('btn-borrarProducto')){
        e.preventDefault();

        swal({
            title: "Eliminar producto?",
            text: `Estas seguro de quitar, ${e.target.parentElement.parentElement.children[1].textContent}, del carrito!`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal(`${e.target.parentElement.parentElement.children[1].textContent} a sido eliminado del carrito!`, 
                {
                    icon: "success",
                });
    
                //eliminar articulo del carrito
                const idProduct = e.target.getAttribute('data-id');
                listaCompra = listaCompra.filter(product => product.id !== idProduct);
                agregarHTML();
        
            } else {
              swal("No se a quitado tu producto del carrito!");
            }
          });
    }
}


