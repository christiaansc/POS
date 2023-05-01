<div class="form-row">
<div class="form-group col-md-4">
    <label for="metodo_pago">Metodo Pago</label>
    <select class="form-control" name="metodo_pago" id="metodo_pago">
        <option value="EFECTIVO">EFECTIVO</option>
        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
        <option value="DEBITO">DEBITO</option>
        <option value="CREDITO">CREDITO</option>
    </select>
</div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="product_id">Producto</label>
            <select class="form-control select2bs4" name="productos" id="product_id">
                <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($productos as $producto)
                <option value="{{$producto->id}}" precio="{{ $producto->precio }}" >{{$producto->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="price">Precio de venta</label>
            <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId" disabled>
            <input type="hidden" class="form-control"  id="precio">
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control"  min="1" pattern="^[0-9]+" name="quantity" id="quantity" required>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="discount">Porcentaje de descuento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">%</span>
            </div>
            <input type="number" class="form-control" name="discount" id="discount" aria-describedby="basic-addon2" value="0">
        </div>
    </div>
</div>


    
    <button type="button" id="agregar" class="btn btn-success float-right mb-4">Agregar producto</button>
   
    <div class="form-group">
        
        <div class="table-responsive col-md-12">
            <table id="detalles" class="table table-bordered table-striped  dtr-inline">
                <thead>
                    <tr>
                        <th>Eliminar</th>
                        <th>Producto</th>
                        <th>Precio Venta (CLP)</th>
                        <th>Cantidad</th>
                        <th>descuento</th>

                        <th>SubTotal (CLP)</th>
                    </tr>
                </thead>
                <tfoot>
                   
                <tr>
                        <th colspan="5">
                            <h1 align="right">SUB TOTAL:</h1>
                        </th>
                        <th>
                            <h1 align="right"><span id="total">CLP 00</span> </h1>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="5">
                            <h1 align="right">DESCUENTO TOTAL:</h1>
                        </th>
                        <th>
                            <h1 align="right"><span id="descTotal" value="0">CLP 00</span> </h1>
                        </th>
                    </tr>

                    <tr>
                        <th colspan="5">
                            <h1 align="right">TOTAL PAGAR:</h1>
                        </th>
                        <th>
                            <h1 align="right"><span align="right" id="total_pagar_html">CLP  00</span> <input type="hidden"
                                    name="total" id="total_pagar"></h1>
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
