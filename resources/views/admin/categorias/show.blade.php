@extends('layouts.dashboard')
@section('title','Gestión de Categorias')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos Que pertenecen a la  Categoria : {{ $categoria->nombre }} </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/categorias">categorias</a></li>   
              <li class="breadcrumb-item active">{{ $categoria->nombre }}</li>
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
			
			</div>
            <!-- /.card-header -->
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"  style="width:100%">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre producto</th>
                  <th>categoria</th>
                  <th>estado</th>

                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categoria->products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>
                                        <a href="{{route('products.show',$product)}}">{{$product->nombre}}</a>
                                    </td>
                                    <td>{{$product->categoria->nombre}}</td>
                                  
                                    @if ($product->stado == 'ACTIVO')
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
                  <th>Nombre producto</th>
                  <th>Categoria</th>
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
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
@endsection