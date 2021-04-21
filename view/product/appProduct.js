
//alertas
//https://sweetalert.js.org/guides/

//variables
const imgCarrito = document.querySelector('.contendorCarrito img');
const carrito = document.querySelector('.carrito');
const btnCloseCarrito = document.querySelector('.btn-close');
const listaProducts = document.querySelector('.listaProducts')
const contenedorCarrito = document.querySelector('.lista-carrito table tbody');
const btnVaciarCarrito = document.querySelector('.carrito .btn-vaciarCarrito');
const btnEmpezarCompra = document.querySelector('.carrito .btn-empezarCompra')
const listaCarrito = document.querySelector('.carrito .lista-carrito');
const spinner = document.querySelector('.carrito .spinner-grow');

let articulosCarrito= [];

eventListener()

//event Listener
function eventListener(){

    //al cargar la pagina
    document.addEventListener('DOMContentLoaded', iniciarApp);

    //funcion mostrar y ocultar carrito
    imgCarrito.addEventListener('click',mostrarCarrito);
    btnCloseCarrito.addEventListener('click',mostrarCarrito);

    //agregar al carrito
    listaProducts.addEventListener('click',addCarrito);

    //vaciar carrito
    btnVaciarCarrito.addEventListener('click',vaciarCarrito);

    //eliminar Producto del carrito
    carrito.addEventListener('click',eliminarProducto);

    //empezar la compra
    btnEmpezarCompra.addEventListener('click',empezarCompra);
}

//funciones

//iniciar la app
function iniciarApp(){
    if(JSON.parse(localStorage.getItem('compra'))){
        articulosCarrito= JSON.parse(localStorage.getItem('compra'));
        agregarHTML();
    }
}
//empezar la compra
function empezarCompra(e){

    if(articulosCarrito.length > 0){

        spinner.classList.remove('d-none');

        const compra = JSON.stringify(articulosCarrito);
        localStorage.setItem('compra',compra);
        vaciarHTML();
        articulosCarrito = [];

    }else{
        e.preventDefault();
        alert('Agrega un producto al carrito');
    }

    
}


//mostrar el carrito
function mostrarCarrito(){

    if(carrito.classList.contains('d-none')){
       

        if(articulosCarrito.length > 0){
            carrito.classList.remove('d-none');
        }else
        {
            swal({
                title: "El carrito esta vacio!",
                text: "Agrega un producto para poder verlo en el carrito!",
                icon: "warning",
                button: "Ok!",
              });
        }
        
    }else{
        carrito.classList.add('d-none');
        
    }

}
//animar elementos
function animacion(elemento){
    elemento.classList.add("animate__animated");
    elemento.classList.add("animate__heartBeat");

    setTimeout(()=>{
        elemento.classList.remove("animate__animated");
        elemento.classList.remove("animate__heartBeat");
    },300);

}

//agregar al carrito
function addCarrito(e){

    e.preventDefault();

    if(e.target.classList.contains('btn-image')){

        const productSelect = e.target.parentElement.parentElement;
      
        animacion(productSelect.querySelector('img'));
        animacion(imgCarrito);

        leerDatos(productSelect);
    }
}

//leer los datos del producto
function leerDatos(product){

    //sacar los datos del curso
    const idProduct = product.querySelector('.btn-image').getAttribute('data-id');
    const imgProdut = product.querySelector('img');
    const titProduct = product.querySelector('h4').textContent;
    const precProduct  = Number.parseFloat(product.querySelector('.card-body .d-flex .piceBuy span').textContent); 
    const totalProduct  = Number.parseFloat(product.querySelector('.card-body .d-flex .total span').textContent);
    const discountProduct  = precProduct - totalProduct;
   
    //agregar al JSON
    const infoProdut ={
        id: idProduct,
        img: imgProdut.src,
        titulo: titProduct,
        precy: precProduct,
        discount: discountProduct,
        total: totalProduct,
        cantidad: 1 
    }

    //verificar si el producto ya existe
    const exist = articulosCarrito.some(product => product.id === infoProdut.id);

    if(exist){
        const produts = articulosCarrito.map(product => {
            if(product.id === infoProdut.id)
            {
                product.cantidad++;
                product.total+=product.total;
                product.discount +=product.discount;

                return product;
            }else{

                return product;
            }
        });
    }else {

        articulosCarrito = [...articulosCarrito,infoProdut];
    }

   
    swal("Agregado!", `Se a agregado ${titProduct}! al carrito`, "success");
    agregarHTML();
}

//mostrar datos en el carrito
function agregarHTML(){

    vaciarHTML();
    articulosCarrito.forEach(product =>
        {
            const {id, img, titulo, precy, discount, total, cantidad} = product;

            
            const fila = document.createElement('tr');
            fila.innerHTML = `
            
                <td> <img src="${img}" class='img-carrito' style="width:100px;" </td>
                <td> ${titulo}</td>  
                <td> ${precy}</td>  
                <td class='display-responsive'> ${cantidad}</td>
                <td class='display-responsive' > ${discount.toFixed(2)}</td>  
                <td> ${total.toFixed(2)}</td>
                <td> <a href="#" class="btn-borrarProducto rounded-circle" data-id="${id}">X</a></td> 
            `;
           
           contenedorCarrito.appendChild(fila);
        });

}
//vaciar carrito
function vaciarCarrito(){

    swal({
        title: "Vaciar Carrito?",
        text: "Estas seguro de vaciar el carrito!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Tu carrito a sido vaciado!", 
            {
                icon: "success",
            });

            //llamar la funcion para limpiar el carrito 
            vaciarHTML();
            articulosCarrito= [];
            localStorage.removeItem('compra');
            carrito.classList.add('d-none');

        } else {
          swal("Tu carrito no se a vaciado!");
        }
      });
}

//vaciar el HTML del carrito
function vaciarHTML(){

    while(contenedorCarrito.firstChild){
        contenedorCarrito.removeChild(contenedorCarrito.firstChild);
    }
}

//eliminar producto del carrito
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
                articulosCarrito = articulosCarrito.filter(product => product.id !== idProduct);
                agregarHTML();    
    
            } else {
              swal("No se a quitado tu producto del carrito!");
            }
          });
    }
}