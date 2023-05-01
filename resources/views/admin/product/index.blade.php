@extends('layouts.dashboard')
@section('title','Gestión de productos')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>      
              <li class="breadcrumb-item active">Productos</li>
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
				<a href="{{route('products.create')}}">
					<span class="btn btn-success">+ Crear nuevo producto</span>
				</a>
			</div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"  style="width:100%">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>categoria</th>
                  <th>Precio</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>
                                        <a href="{{route('products.show',$product)}}">{{$product->nombre}}</a>
                                    </td>
                                    <td>{{$product->categoria->nombre}}</td>
                                    <td> ${{ number_format($product->precio)}}</td>              
                                    @if ($product->estado == 'ACTIVO')
                                    <td>
                                        <a class="button btn btn-success btn-sm" href="{{route('change.status.products', $product)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="button btn btn-danger btn-sm" href="{{route('change.status.products', $product)}}" title="Editar">
                                            Desactivado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                                                       
                                    <td >
                                        {!! Form::open(['route'=>['products.destroy',$product], 'method'=>'DELETE'] ) !!}

                                        <a class="btn  btn-info btn-sm" href="{{route('products.edit', $product)}}" title="Editar">
                                           
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
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>categoria</th>
                  <th>precio</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
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
      "ordering": false,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
@endsection