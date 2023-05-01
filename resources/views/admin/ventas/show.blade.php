
@extends('layouts.dashboard')
@section('title','Gestión de Ventas')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detalle de Venta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li> 
              <li class="breadcrumb-item"><a href="/ventas">Ventas</a></li>      
              <li class="breadcrumb-item active">Detalle Venta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')

<div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="form-control-label"><strong>Cliente</strong></label>
                            <p><a href="{{route('clientes.show', $venta->cliente)}}">{{$venta->cliente->nombre}}</a></p>
                        </div>
                        <div class="col-md-4">
                            <label class="form-control-label"><strong>Vendedor</strong></label>
                            <p>{{$venta->user->name}}</p>
                        </div>

                        <div class="col-md-4">
                            <label class="form-control-label"><strong>Fecha Venta</strong></label>
                            <p>{{\Carbon\Carbon::parse($venta->fecha_venta)->format('d M y h:i ')}}</p>
                        </div> 
                    </div>
                    <br /><br />
                    <div class="form-group">
                        
                        <div class="table-responsive col-md-12">
                            <table id="saleDetails" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio Venta (CLP)</th>
                                        <th>Descuento</th>
                                        <th>Cantidad</th>
                                        <th>Precio Final(CLP)</th>
                                    </tr>
                                </thead>
                                <tfoot>

                                    <tr>
                                        <th colspan="4">
                                            <p align="right">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($subtotal)}}</p>
                                        </th>
                                    </tr>

                               
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">s/{{number_format($venta->total)}}</p>
                                        </th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    @foreach($VentaDetalles as $ventaDetalle)
                                    <tr>
                                        <td>{{$ventaDetalle->product->nombre}}</td>
                                        <td>$ {{$ventaDetalle->precio}}</td>
                                        <td>{{$ventaDetalle->descuento}} %</td>
                                        <td>{{$ventaDetalle->cantidad}}</td>
                                        <td>s/{{number_format($ventaDetalle->cantidad*$ventaDetalle->precio - $ventaDetalle->cantidad*$ventaDetalle->precio*$ventaDetalle->descuento/100)}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('ventas.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection