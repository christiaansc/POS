@extends('layouts.dashboard')
@section('title','Gestión de Gastos')

@section('breadcrumb')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Administracion de gastos</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>      
					<li class="breadcrumb-item active">gastos</li>
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
				<span class="btn btn-success">+ Crear nuevo gasto</span>
				</a>
				@can('adm')
					

				<div class="col-12 col-md-3 text-center">
					<span>Gasto mensual  local: <b> </b></span>
					<div class="form-group">
						@foreach($totalmesactual as $gastom)
							$<strong> {{number_format($gastom->totalmesactual)}}</strong>
						@endforeach
					</div>
				</div>
				<div class="col-12 col-md-3 text-center">
					<span>Gasto Mensual Casa: <b> </b></span>
					<div class="form-group">
						@foreach($totalmesCasa as $gastocasa)
							$<strong> {{number_format($gastocasa->totalmesCasa)}}</strong>
						@endforeach
					</div>
				</div>
				<div class="col-12 col-md-3 text-center">
					<span>Gasto total: <b> </b></span>
					<div class="form-group">
						@foreach($gastosTotales as $gasto)
							$<strong> {{number_format($gasto->totalGastos)}}</strong>
						@endforeach
					</div>
				</div>
				@endcan
			</div>
			<!-- /.card-header -->
		</div>
            
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped"  style="width:100%">
				<thead>
					<tr>
						<th>id</th> 
						<th>Detalle</th> 
						<th>fecha gasto</th>
						<th>Monto </th>
						<th>Cantidad</th>
						<th>Monto total</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
                <tbody>
                	@foreach ($gastos as $gasto)
                        <tr>
                            <th scope="row" >{{$gasto->id}}</th>
                            <th >{{$gasto->nombre}}</th>
                            <td>
								{{\Carbon\Carbon::parse($gasto->fechaGasto)->format('d M y')}}
							</td>
							<td> $ {{number_format($gasto->monto)}}</td>
							<td>{{$gasto->cantidad}}</td>
							<td> $ {{number_format($gasto->montoTotal)}}</td>                                  
                            @if ($gasto->estado == 'PAGADO')
                                <td>
									<a class="button btn btn-success btn-sm"  title="Editar">
										PAGADO <i class="fas fa-check"></i>
									</a>
                                </td>
                                @else
								<td>
									<a class="button btn btn-warning btn-sm"  title="Editar">
										PENDIENTE  <i class="fas fa-times"></i>
									</a>
								</td>
                            @endif
                                                                       
                            <td >   
								{!! Form::open(['route'=>['gastos.destroy',$gasto], 'method'=>'DELETE']) !!}
									<a class="btn  btn-info btn-sm" data-toggle="modal" data-target="#modal-default" data-id="{{ $gasto->id }}" title="Editar">								
										<i class="fas fa-edit"></i>
									</a>
									
									<button class="btn  btn-danger btn-sm" id="eliminar" type="submit" title="Eliminar">
										<i class="fas fa-trash-alt"></i>
									</button>
								{!! Form::close() !!}
                            </td>
                    	</tr>
       				@endforeach 
                </tbody>
				<tfoot>
					<tr>
						<th>id</th>
						<th>detalle</th>
						<th>fecha gasto</th>
						<th>monto</th>
						<th>Cantidad</th>
						<th>Monto total</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
            </table>
            <!-- /.card-body -->
        </div>  
		
		@can('adm')
		<div class="card-body table-responsive">
            <table id="example2" class="table table-bordered table-striped"  style="width:100%">
				<thead>
					<tr>
						<th>id</th> 
						<th>Detalle</th> 
						<th>fecha gasto</th>
						<th>Monto </th>
						<th>Cantidad</th>
						<th>Monto total</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
                <tbody>
                	@foreach ($gastosCasa as $gasto)
                        <tr>
                            <th scope="row" >{{$gasto->id}}</th>
                            <th >{{$gasto->nombre}}</th>
                            <td>
								{{\Carbon\Carbon::parse($gasto->fechaGasto)->format('d M y')}}
							</td>
							<td> $ {{number_format($gasto->monto)}}</td>
							<td>{{$gasto->cantidad}}</td>
							<td> $ {{number_format($gasto->montoTotal)}}</td>                                  
                            @if ($gasto->estado == 'PAGADO')
                                <td>
									<a class="button btn btn-success btn-sm"  title="Editar">
										PAGADO <i class="fas fa-check"></i>
									</a>
                                </td>
                                @else
								<td>
									<a class="button btn btn-warning btn-sm"  title="Editar">
										PENDIENTE  <i class="fas fa-times"></i>
									</a>
								</td>
                            @endif
                                                                       
                            <td >   
								{!! Form::open(['route'=>['gastos.destroy',$gasto], 'method'=>'DELETE']) !!}
									<a class="btn  btn-info btn-sm" data-toggle="modal" data-target="#modal-default" data-id="{{ $gasto->id }}" title="Editar">								
										<i class="fas fa-edit"></i>
									</a>
									
									<button class="btn  btn-danger btn-sm" id="eliminar" type="submit" title="Eliminar">
										<i class="fas fa-trash-alt"></i>
									</button>
								{!! Form::close() !!}
                            </td>
                    	</tr>
       				@endforeach 
                </tbody>
				<tfoot>
					<tr>
						<th>id</th>
						<th>detalle</th>
						<th>fecha gasto</th>
						<th>monto</th>
						<th>Cantidad</th>
						<th>Monto total</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
            </table>
            <!-- /.card-body -->
        </div>
		@endcan
		 
    	<!-- /.card -->
    </div>
    <!-- /.content -->
</div>
  
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form  action="{{route('editGasto')}}" method="POST">
					@csrf
					{{method_field('patch')}}
					<div class="form-group">
						<input type="hidden" class="form-control" name="id" id="id">
						<label for="estado">Estado pago</label>
						<select class="form-control" name="estado" id="estado">                    
							<option value="PAGADO">PAGADO</option>
							<option value="PENDIENTE">PENDIENTE</option>                      
						</select>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Modificar</button>
					</div>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form  action="{{route('gastos.store')}}" method="POST">
                @csrf            
                <div class="form-group">
                      <label for="nombre">Detalle</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                      <label for="monto">Monto</label>
                      <input type="text" name="monto" id="monto" class="form-control" aria-describedby="helpId" required>
                </div>

				<div class="form-group">
						<label for="tipo_gasto">Tipo gato</label>
						<select class="form-control" name="tipo_gasto" id="tipo_gasto">
							<option value="0">Insumos local</option>
							<option value="1">Casa</option>					
						</select>

				</div>
   
                <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" aria-describedby="helpId" required>
                </div>                         
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
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
      "order": [[ 0, 'desc' ]],
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
      "order": [[ 0, 'desc' ]],
    });
  });
</script>
@endsection