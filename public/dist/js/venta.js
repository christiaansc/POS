const selectProducto = document.getElementById("product_id");
const btnAgregar = document.getElementById("agregar");
const btnRegistrar = document.getElementById("guardar");
const inpNuevoCliente = document.getElementById("client_id");
const inpPrecio = document.getElementById("price");
const inpPrice = document.getElementById("precio");
const inpCantidad = document.getElementById("quantity");
const inpDescuento = document.getElementById("discount");
const tablaDetalles = document.getElementById("detalles");
const datosProducto = document.querySelector("#product_id");
const inpDescuentoTotal = document.getElementById("descTotal");
const totalPagar = document.getElementById("total_pagar");
const subtotalPagar = document.getElementById("total");
const divtotal = document.getElementById("total_pagar_html");

let total = 0;
let subTotal = [];
let cont = 1;
let totalDesc = 0;
let sumDesc = 0;

selectProducto.onchange = () => mostrarValor();

const agregarProdutoCarrito = () => {
  let productoId = datosProducto[datosProducto.selectedIndex].value;
  let nombre     = datosProducto[datosProducto.selectedIndex].text;
  let precio     = inpPrecio.value;
  let cantidad   = inpCantidad.value;
  let descuento  = inpDescuento.value;

  if ((precio != "") & (cantidad != "") & (cantidad != "0") & (nombre != "")) {

    subTotal[cont] = (cantidad * precio)  
    totalDesc = (subTotal[cont] * descuento) / 100;
    subTotal[cont] = subTotal[cont] - totalDesc
    total = total + subTotal[cont];


    // console.log(subTotal[cont] , totalDesc , total);

    let fila =
      '<tr class="selected" id="fila' +
      cont +
      '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' +
      cont +
      ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' +
      productoId +
      '">' +
      nombre +
      '</td> <td> <input type="hidden" name="price[]" value="' +
      parseInt(precio) +
      '"> <input class="form-control" type="number" value="' +
      parseInt(precio) +
      '" disabled> </td>  <td> <input type="hidden" name="quantity[]" value="' +
      cantidad +
      '"> <input type="number" value="' +
      cantidad +
      '" class="form-control" disabled> </td> <td align="right">s/' +
      parseInt(subTotal[cont]) +
      "</td>'" +
      '<input type="number" value="' +
      cantidad +
      '" class="form-control" disabled> </td> <td align="right">s/' +
      parseInt(subTotal[cont]) +
      "</td>'</tr>";

    let fila2 = `<tr class="selected" id='fila${cont}'>
                    <td>
                      <button type="button" class="btn btn-danger" onclick="eliminar(${cont})"> 
                        <i class="fa fa-times fa-2x"></i>
                      </button>
                      </td>
                      
                      <td>
                      <input type="hidden" name="product_id[]" value="${productoId}">
                      <input class="form-control" type="text" value="${nombre}" disabled> 
                    </td>
                    <td>
                      <input type="hidden" name="price[]"  value="${precio}"> 
                      <input class="form-control" type="number"  value="${precio}" disabled> 

                    </td>
                    <td>
                      <input type="hidden"  name="quantity[]" value="${cantidad}">
                      <input class="form-control" type="number"  value="${cantidad}" disabled> 
                    </td>
                    <td>
                      <input type="hidden" name="discount[]" value="${descuento}" >
                      <input class="form-control" type="number"  value="${descuento}" disabled> 
                    </td>                    
                    <td>
                      <input class="form-control" type="number"  value="${subTotal[cont]}" disabled> 
                    </td>  
                </tr>`;

    totales();
    evaluarCarrito();
    cont++;

    $("#detalles").append(fila2);
    selectProducto.focus();
    inpCantidad.value = 1;
  } else {
    inpCantidad.focus();
    swal.fire({
      title: "Debes Completar los campos obligatorios!",
      icon: "error", //built in icons: success, warning, error, info
    });
  }
};

function evaluarCarrito() {
  total > 0
    ? (btnRegistrar.style.display = "")
    : (btnRegistrar.style.display = "none");
}
function mostrarValor() {
  const precio = datosProducto.options[
    datosProducto.selectedIndex
  ].getAttribute("precio");

  inpPrecio.value = precio;
  inpPrice.value = precio;
  inpCantidad.value = 1;
}

function totales() {
  sumDesc = sumDesc + totalDesc;
  // console.log(`${total} -- ${sumDesc}`);
//   console.log(`
//   total: ${total}
//   subtotal:${ subTotal[cont]}
//   totaldescuento :${totalDesc}
//   suma descuento: ${sumDesc}
// `);
  
  inpDescuentoTotal.textContent = `$ ${formatN(sumDesc)}`;
  subtotalPagar.textContent = `$ ${formatN(total)}`;
  divtotal.textContent = `$ ${formatN(total)}`;
  totalPagar.textContent = `    ${total}`;
  totalPagar.value = `${total}`;
}

function eliminar(index) {
  const fila = document.getElementById("fila" + index);

  total = total - subTotal[index];
  subTotal[index] = subTotal[index] - totalDesc

  totalDesc =  sumDesc - totalDesc;
  sumDesc =   totalDesc;


  // console.log(`
  //       total: ${total}
  //       subtotal:${ subTotal[index]}
  //       totaldescuento :${totalDesc}
  //       suma descuento: ${sumDesc}
  // `);

  inpDescuentoTotal.textContent = `${formatN(totalDesc)}`;
  totalPagar.textContent = `${total}`;
  subtotalPagar.textContent = `${total}`;
  divtotal.textContent = `CLP   ${total}`;
  fila.remove();
  evaluarCarrito();
}
function formatN(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

btnAgregar.addEventListener("click", () => {
  agregarProdutoCarrito();
});

$(".select2bs4").select2({
  theme: "bootstrap4",
});
