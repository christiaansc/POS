@extends('layouts.dashboard')
@section('title','Gestión de Plantas')

@section('breadcrumb')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Administracion de Plantas</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>      
					<li class="breadcrumb-item active">plantas</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
@endsection
@section('content')
<div class="container-fluid">
	<div class="card">

		<div class="card-header">
			<div class="row">
				<a data-toggle="modal" data-target="#modal-add" >
                
				<span class="btn btn-success"> <i class="fas fa-leaf"></i> Agregar</span>
				</a>
				<div class="col-12 col-md-3 text-center">
					<span>Compra mensual plantas: <b> </b></span>
					<div class="form-group">
						
							$<strong> {{ number_format($totalCompra) }} </strong>
					
					</div>
				</div>
				<div class="col-12 col-md-3 text-center">
					<span>Venta Mensual platas: <b> </b></span>
					<div class="form-group">
						
					$<strong> {{ number_format($totalVenta) }} </strong>

						
					</div>
				</div>
		
				
			</div>
			<!-- /.card-header -->
		</div>
            
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped"  style="width:100%">
				<thead>
					<tr>
						<th>Detalle</th> 
						<th>Precio Compra</th> 
						<th>Cantidad</th>
									
						<th>Monto total</th>
						<th>fecha Compra</th>
						<th>Acciones</th>
					</tr>
				</thead>
                <tbody>
                	@foreach ( $compras as  $compra)
						
					
                        <tr>
                            <th >{{$compra->detalle}}</th>
                            <th > {{number_format($compra->monto)}}</th>
                       						
							<td>{{$compra->cantidad}}</td>
							
							<td>{{number_format($compra->montoTotal)}}</td>
                            <td>
								{{\Carbon\Carbon::parse($compra->fecha, 'UTC')->format('d M y')}}
								
							</td>
					                                                                                                            
                            <td >   
							{!! Form::open(['route'=>['plantas.destroy',$compra], 'method'=>'DELETE']) !!}
								
									<button class="btn  btn-danger btn-sm" id="eliminar" type="submit" title="Eliminar">
										<i class="fas fa-trash-alt"></i>
									</button>
									{!! Form::close() !!}
                            </td>
                    	</tr>
						@endforeach
       				
                </tbody>

            </table>
            <!-- /.card-body -->
        </div>  
		
        <div class="card-body table-responsive">
            <table id="example2" class="table table-bordered table-striped"  style="width:100%">
				<thead>
					<tr>
						<th>Detalle</th> 
						<th>Precio venta</th> 
						<th>Cantidad</th>			

						<th>Monto Total</th>
						<th>fecha Compra</th>
						<th>Acciones</th>
					</tr>
				</thead>
                <tbody>
                	@foreach ( $ventas as  $venta)
						
                        <tr>
                            <th > {{$venta->detalle }} </th>
                            <th >{{ number_format($venta->monto) }}	</th>
                       						
							<td>{{$venta->cantidad }}</td>
						
							<td>{{ number_format($venta->montoTotal) }}</td>
							<td>
							{{\Carbon\Carbon::parse($venta->fecha, 'UTC')->format('d M y')}}

							</td>

								{!! Form::open(['route'=>['plantas.destroy',$venta], 'method'=>'DELETE']) !!}
                            <td >   
													
									<button class="btn  btn-danger btn-sm" id="eliminar" type="submit" title="Eliminar">
										<i class="fas fa-trash-alt"></i>
									</button>
								{!! Form::close() !!}
                            </td>
                    	</tr>
						@endforeach
       				
                </tbody>

            </table>
            <!-- /.card-body -->
        </div> 

		
		 
    	<!-- /.card -->
    </div>
    <!-- /.content -->
</div>
  


<div class="modal fade" id="modal-add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form  action="{{route('plantas.store')}}" method="POST">
                @csrf            
                <div class="form-group">
                      <label for="detalle">Detalle</label>
                      <input type="text" name="detalle" id="detalle" class="form-control" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                      <label for="monto">Precio</label>
                      <input type="text" name="monto" id="monto" class="form-control" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                      <label for="cantidad">Cantidad</label>
                      <input type="number" name="cantidad" id="cantidad" class="form-control" aria-describedby="helpId" required>
                </div>
				<div class="form-group">
						<label for="accion">Accion</label>
						<select class="form-control" name="accion" id="accion">
							<option value="0">Compra</option>
							<option value="1">Venta</option>					
						</select>

				</div>
   

              </div>
              <div class="modal-footer justify-content-between">
                <button  class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Agregar</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endsection
        

@section('script')

<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "responsive": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autsoWidth": true,

    });
  });
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "responsive": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autsoWidth": true,
      
    });
  });
</script>
@endsection