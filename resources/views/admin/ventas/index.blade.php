@extends('layouts.dashboard')
@section('title','Gestión de productos')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de Ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>      
              <li class="breadcrumb-item active">Ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
<div class="container-fluid">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<a href="{{route('ventas.create')}}">
					<span class="btn btn-success">+ Registrar nueva Venta</span>
				</a>
			</div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
				<table id="example1" class="table table-bordered table-striped dataTable dtr-inline"  style="width:100%">
					<thead>
						<tr>
						<th>Id</th>
						<th>Fecha</th>
						<th>Total</th>
						<th>Metodo pago</th>
						<th>Estado</th>
						<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($ventas as $venta)
						<tr>
							<th scope="row">{{$venta->id}}</th>
							<td>
							{{\Carbon\Carbon::parse($venta->fecha_venta)->format('d M y h:i a')}}

							</td>
							<td>$ {{ number_format($venta->total)}}</td>
							<td>{{ $venta->metodo_pago}}</td>


							@if ($venta->stado == 'VALIDO')
							<td>
							<a class="button btn btn-success btn-sm" href="{{route('change.status.ventas', $venta)}}" title="Editar">
							Activo <i class="fas fa-check"></i>
							</a>
							</td>
							@else
							<td>
							<a class="button btn btn-danger btn-sm" href="#" title="Editar">
							Cancelada <i class="fas fa-times"></i>
							</a>
							</td>
							@endif
												
							<td >
							<a href="{{route('ventas.pdf', $venta)}}" class="btn btn-default"><i class="far fa-file-pdf"></i></a>
							<a href="{{route('ventas.print', $venta)}}" class="btn btn-default"><i class="fas fa-print"></i></a>
							<a href="{{route('ventas.show', $venta)}}" class="btn btn-default"><i class="far fa-eye"></i></a>

							</td>
						</tr>
						@endforeach 
					</tbody>
					<tfoot>
					<tr>
					<th>ID</th>
					<th>fecha</th>
					<th>total</th>
					<th>metodo pago</th>
					<th>Estado</th>
					<th>Acciones</th>
					</tr>
					</tfoot>
				</table>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.col -->
</div><!-- /.content -->
@endsection


@section('script')
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "responsive": true,
      "searching": true,
	  "ordering": false,
    });
  });
</script>
@endsection