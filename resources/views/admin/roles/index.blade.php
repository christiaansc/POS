@extends('layouts.dashboard')
@section('title','Gestión de Roles')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>      
              <li class="breadcrumb-item active">Roles</li>
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
				<a href="/roles/create">
					<span class="btn btn-success">+ Crear nuevo Rol</span>
				</a>
			</div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"  style="width:100%">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Role</th>
                  <th>Slug</th>
                  <th>Permisos</th>
                  
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>
                                        <a href="">{{$role->name}}</a>
                                    </td>
                                    <td>{{$role->guard_name}}</td>
                                    <td>
                                        @if ($role->permissions != null)
                                                            
                                                        @foreach ($role->permissions as $permission)
                                                        <span class="badge badge-secondary">
                                                            {{ $permission->name }}                                    
                                                        </span>
                                                        @endforeach
                                                    
                                                    @endif                                       
                                    </td>
                               

                
                                                                       
                                    <td >
                           

                                        <a class="btn  btn-info btn-sm" href="/roles/{{$role->id}}" title="show"><i class="fas fa-eye"></i></a>

                                        <a class="btn  btn-info btn-sm" href="/roles/{{$role->id}}/edit" title="Editar"><i class="fas fa-edit"></i></a>
                                        
                                        <a  class="btn  btn-danger btn-sm" href="#"  data-toggle="modal" data-target="#deleteModal" data-roleid="{{$role->id}}"><i class="fas fa-trash-alt"></i></a>
                                        
                                    </td>
                                </tr>
                                @endforeach 
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estas seguro que deseas eliminar este ROL?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Haz click en  "delete" si estas seguro de eliminar este Rol.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="POST" action="">
                    @method('DELETE')
                    @csrf
                    {{-- <input type="hidden" id="user_id" name="user_id" value=""> --}}
                    <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
                </form>
                </div>
            </div>
            </div>
        </div>
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

@section('js_role_page')



    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var role_id = button.data('roleid') 
            
            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/roles/' + role_id);
        })
    </script>

@endsection