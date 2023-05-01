@extends('layouts.dashboard')
@section('title','Gestión de Categorias')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de Categorias</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>      
              <li class="breadcrumb-item active">categorias</li>
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
				<a  data-toggle="modal" data-target="#modal-add" >
					<span class="btn btn-success">+ Crear nueva categoria</span>
				</a>
			</div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"  style="width:100%">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>descripcion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
               
                @foreach($categorias as $categoria)
                                <tr>
                                    <th scope="row">{{$categoria->id}}</th>
                                    <td>
                                        <a href="{{route('categorias.show',$categoria)}}">{{$categoria->nombre}}</a>
                                    </td>
                                
                                    <td>
                                        {{$categoria->descripcion}}
                                    </td>
                                                                       
                                    <td >
                                        {!! Form::open(['route'=>['categorias.destroy',$categoria], 'method'=>'DELETE'] ) !!}

                                        <a class="btn  btn-info btn-sm" data-toggle="modal" data-target="#modal-default" title="Editar">
                                           
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
                  <th>Descripcion</th>
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



    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form  action="{{route('categorias.store')}}" method="POST">
                @csrf            
                <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <input type="text" name="descripcion" id="descripcion" class="form-control" aria-describedby="helpId" required>
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

        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
            <form  action="{{route('categorias.store')}}" method="POST">

                <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                      <label for="descripcion">Descripcion</label>
                      <input type="text" name="descripcion" id="descripcion" class="form-control" aria-describedby="helpId" required>
                </div>  
             
              </div>
              <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Modificar</button>
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
      "autoWidth": true,
    });
  });
</script>
@endsection