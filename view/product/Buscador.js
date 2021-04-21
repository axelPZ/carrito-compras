
//variables
const textBuscar = document.querySelector('.input input');
const select = document.querySelector('.select select');
const listaProductos = document.querySelector('.listaProducts');
const btnBuscar = document.querySelector('#buscar');
const selectCategoria = document.querySelector('#select-categoria');

let busquedaCategoria='';

//objeto para buscar
const dataBusqueda ={
    nombre: '',
    categoria: '',
    marca: '',
    tipo: ''
}

eventListener();

//agregar eventos
function eventListener(){
    
    //evento click al btn buscaar
    btnBuscar.addEventListener('click',buscar);

    //evento de cambio al selecet categoria
    selectCategoria.addEventListener('change',filtrarCategoria);
}

//funciones
//funcion para filtrar por categoria
function filtrarCategoria(){
    
    switch(selectCategoria.value){
        case 'CONSTRUCCION':
            busquedaCategoria = productos.filter(producto => producto.prod_category.trim() === 'CONSTRUCCION');
            break;
        case 'VESTUARIO':
            busquedaCategoria = productos.filter(producto => producto.prod_category.trim() === 'VESTUARIO');
            
            break;
        case 'EDUCACION':
            busquedaCategoria = productos.filter(producto => producto.prod_category.trim() === 'EDUCACION');
            break;
        case 'CELULAR':
            busquedaCategoria = productos.filter(producto => producto.prod_category.trim() === 'CELULAR');
            break;
        case 'TODOS':
            busquedaCategoria = productos;
            break;
        default:
            break;
    }
    
    if(busquedaCategoria.length){
        mostrarProductos(busquedaCategoria);
    }else{
        noResultado();
    }
}
//funcion para buscar
function buscar(){

    const dato=textBuscar.value.toUpperCase().trim();

    switch(select.value){
        case 'nombre':
            filtrarPr('nombre',dato);
            break;

        case 'marca':
            filtrarPr('marca',dato);
            break;

        case 'tipo':
            filtrarPr('tipo',dato);
            break;

        default :
            break;
    }
}
//mostrar el resultado de la busqueda
function mostrarProductos(productos){

    //limpiar el html
    limpiarHTML();
    

    productos.forEach((producto)=>{

       const {prod_id, prod_discount, prod_image, prod_name, prod_marca, prod_category, prod_description, prod_piceSell } = producto;

       //crear los div
       const div1 = document.createElement('div');
       const div2 = document.createElement('div');
       const div3 = document.createElement('div');
       const div4 = document.createElement('div');
       const div5 = document.createElement('div');

       //crear otros elementos
       const img = document.createElement('img');
       const h4 = document.createElement('h4');

       const p1 = document.createElement('p');
       const p2 = document.createElement('p');
       const p3 = document.createElement('p');
       const p4 = document.createElement('p');
       const p5 = document.createElement('p');
       const p6 = document.createElement('p');

       const b1 = document.createElement('b');
       const b2 = document.createElement('b');
       const b3 = document.createElement('b');

       const span1 = document.createElement('span');
       const span2 = document.createElement('span');
       const span3 = document.createElement('span');

       const hr = document.createElement('hr');

       //agregar clases y atributos a los div
       div1.className = "col-xs-12 col-md-6 col-lg-6 col-xl-4";
       div2.className = "animacion p-1 mb-5 position-relative";
       div3.className = "card bg-body";       
       div3.setAttribute('id', 'card-product');
       div4.className = "card-body";
       div5.className = "d-flex justify-content-evenly mt-2";

       //agregar clases y aributos a los demas elemetos
       img.className = "mt-1 mx-auto d-block btn-image",
       img.setAttribute('src', "./imagenes/"+prod_image);
       img.setAttribute('data-id', prod_id);
       img.style.width = '200px';
       img.style.height = '200px';

       h4.className = "card-title";
       p1.className = "product-type";
       p2.className = "my-1";
       p3.className = "descripcion";

       p4.className = "piceBuy";
       p5.className = 'discount';
       p6.className = 'total';

       //agregar valores
       h4.innerHTML = prod_name;
       p1.innerHTML = prod_marca;
       p2.innerHTML = prod_category;
       p3.innerHTML = prod_description;

       b1.innerHTML = 'Q. ';
       b2.innerHTML = 'Menos: ';
       b3.innerHTML = 'Total: Q.';

       span1.innerHTML = prod_piceSell;
       span2.innerHTML = prod_discount;
       span3.innerHTML = total(prod_piceSell, prod_discount);

       //agregar a las etiquetas 
       p4.appendChild(b1);
       p4.appendChild(span1);
       p5.appendChild(b2);
       p5.appendChild(span2);
       //p5.appendChild('%');
       p6.appendChild(b3);
       p6.appendChild(span3);

       div5.appendChild(p4);
       div5.appendChild(p5);
       div5.appendChild(p6);

       div4.appendChild(h4);
       div4.appendChild(p1);
       div4.appendChild(hr);
       div4.appendChild(p2);
       div4.appendChild(p3);
       div4.appendChild(div5);
       
       
       if(prod_discount > 0){
            const h6 = document.createElement('h6');
            h6.className = "p-1 mt-1 ms-1 degradado rounded-start text-white position-absolute top-0 start-0";
            h6.style.width = '20%';
            h6.innerHTML='En oferta';
            div3.appendChild(h6);
       }

       div3.appendChild(img);
       div3.appendChild(div4);
       div2.appendChild(div3);
       div1.appendChild(div2);
       
       listaProductos.appendChild(div1);
       

    });
}

//calcular el total menos el descuento
function total(precio, descuento =0){
    descuento = descuento/100;
    resultado = precio*descuento;
    return precio - resultado;
}

//limpiar el html
function limpiarHTML(){
    
    while(listaProductos.firstChild){
        listaProductos.removeChild(listaProductos.firstChild);
    }
}

//al no encontrar ningun resultado
function noResultado(){
    limpiarHTML();
    swal({
        title: "Sin resultados!",
        text: "Vaya! no se encontro tu busquedad, verifica que estes en la categoria correcta",
        icon: "error",
        button: "Ok!",
    });

    const div = document.createElement('div');

    div.classList.add('alert','alert-danger');
    div.setAttribute('role','alert');
    div.innerHTML = 'Busqueda sin resultados, intentalo de nuevo';
    listaProductos.appendChild(div);

}


//filtrar
function filtrarProducto(tipo,valor){

    let resultado='';
    
    //concatenar las busquedas
    if(tipo === 'nombre'){
        resultado = productos.filter(producto => producto.prod_name.trim() === valor);

    }else if(tipo === 'categoria'){
        resultado = productos.filter(producto => producto.prod_category.trim() === valor);

    }else if(tipo === 'marca'){
        resultado = productos.filter(producto => producto.prod_marca.trim() === valor);

    }else if(tipo === 'tipo'){
        resultado = productos.filter(producto => producto.prod_type.trim() === valor);
    }
   

    if(resultado.length){
        mostrarProductos(resultado);
    }else{
        noResultado();
    }
}

//funcion de prueva
function filtrarPr(tipo, valor){
    let resultado='';
    
    //concatenar las busquedas
    if(tipo === 'nombre'){
        
        resultado = productos.filter(filtrarNombre).filter(filtrar);
        
    }else if(tipo === 'marca'){
        resultado = productos.filter(filtrarMarca).filter(filtrar);

    }else if(tipo === 'tipo'){
        resultado = productos.filter(filtrarTipo).filter(filtrar);
    }
   

    if(resultado.length){
        mostrarProductos(resultado);
    }else{
        noResultado();
    }

}
//tipo de filtros

//filtrar por nombre
function filtrarNombre(producto){
    
    const nombre=textBuscar.value.toUpperCase().trim();
    if(nombre){
        return producto.prod_name.trim() === nombre;
    }

    return producto;
}

//filtrar por nombre
function filtrarMarca(producto){
    
    const marca=textBuscar.value.toUpperCase().trim();
    if(marca){
        return producto.prod_marca.trim() === marca;
    }

    return producto;
}

//filtrar por nombre
function filtrarTipo(producto){
    
    const tipo=textBuscar.value.toUpperCase().trim();
    if(tipo){
        return producto.prod_type.trim() === tipo;
    }

    return producto;
}

//filtrar por el tipo de categoria
function filtrar(producto){

    //si el select de categoria tiene como valor todos
    if(selectCategoria.value.trim()=== 'TODOS') return producto;
    
    //filtrar por el tipo de categoria
    const categoria = selectCategoria.value.trim();
    if(categoria){
        return producto.prod_category.trim() === categoria;
    }

    return producto;
}
