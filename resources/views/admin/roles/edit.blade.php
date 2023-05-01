@extends('layouts.dashboard')
@section('title','Gestión de Usuario')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/roles">Roles</a></li>      
              <li class="breadcrumb-item active">Ediar roles<</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection


@section('content')

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="/roles/{{ $role->id }}">
                    @csrf()
                    @method('PATCH')
                    
                    <div class="form-group">
                        <label for="role_name">Role name</label>
                        <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Name..." value="{{ $role->name }}" >
                    </div>
                    <div class="form-group">
                        <label for="role_slug">Role Slug</label>
                        <input type="text" name="role_slug" class="form-control" id="role_slug" placeholder="Slug..." value="{{ $role->guard_name }}">
                    </div>
                    <div class="form-group" >
                        <label for="roles_permissions">Add Permissions</label>
                        <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control" id="roles_permissions" value="@foreach ($role->permissions as $permission)
                            {{$permission->name. ","}}
                        @endforeach">   
                    </div>                     

                    <div class="form-group pt-2">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </form>
                
            </div>

        </div>
    </div>

@endsection

@section('css_page')

    <link rel="stylesheet" href="/css/admin/bootstrap-tagsinput.css">
    
@endsection

@section('js_role_page')

    <script src="/js/admin/bootstrap-tagsinput.js"></script>

    <script>
        $(document).ready(function(){
            $('#role_name').keyup(function(e){
                var str = $('#role_name').val();
                str = str.replace(/\W+(?!$)/g, '-').toLowerCase();//rplace stapces with dash
                $('#role_slug').val(str);
                $('#role_slug').attr('placeholder', str);
            });
        });
    </script>
    
@endsection