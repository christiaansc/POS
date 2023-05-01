@extends('layouts.dashboard')
@section('title','Gestión de Inventatio')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de Inventario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>      
              <li class="breadcrumb-item active">Insumos</li>
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

			<a href="{{route('insumos.create')}}">
				<span class="btn btn-success">Crear nuevo Insumo</span>
			</a>
	
		</div>
	
		<!-- /.card-header -->
		<div class="card-body table-responsive">
			

                
                

					<table id="example2" class="table table-bordered table-striped dataTable dtr-inline"  style="width:100%">
						<thead>
							<tr>
								<th>id</th>
								<th>Detalle</th>
								<th>Cantidad</th>
								<th>Tipo insumo</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($insumosLocal as $insumo)
								<tr>
									<th scope="row">{{$insumo->id}}</th>
									<th>{{$insumo->nombre}}</th>

								
									
									
									<td>{{$insumo->stock}}</td>
									<td>{{$insumo->tipo_insumo}}</td>

									
									@if ($insumo->estado == 'ACTIVO')
										<td>
											<a class="button btn btn-success btn-sm" href="{{route('change.status.insumos', $insumo)}}" title="Editar">
												Activo <i class="fas fa-check"></i>
											</a>
										</td>
										@else
										<td>
											<a class="button btn btn-danger btn-sm" href="{{route('change.status.insumos', $insumo)}}" title="Editar">
											Desactivado <i class="fas fa-times"></i>
											</a>
										</td>
									@endif                                
									<td >
										
										{!! Form::open(['route'=>['insumos.destroy',$insumo], 'method'=>'DELETE']) !!}

											<a class="btn  btn-info btn-sm"  href="{{route('insumos.edit', $insumo)}}"  title="Editar">									
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
								<th>Detalle</th>		
								<th>Cantidad</th>
								<th>Tipo insumo</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</tfoot>
					</table>
                 
         
		<!-- /.card-body -->
		</div>

    	<!-- /.card -->
    </div>
    <!-- /.container -->
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