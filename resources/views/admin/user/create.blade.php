@extends('layouts.dashboard')
@section('title','Crear producto')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>  
              <li class="breadcrumb-item"><a href="/users">Usuarios</a></li>      
              <li class="breadcrumb-item active">Crear Usuario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')

<div class="container">
    <div class="card ">
        <div class="card-body">
            <form method="POST" action="/users" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="name">User name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email..." value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password..." required minlength="8">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirm</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password..." id="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="role">Select Role</label>

                    <select class="role form-control" name="role" id="role">
                        <option value="">Seleccone Un rol</option>
                        @foreach ($roles as $role)
                        <option data-role-id="{{$role->id}}" data-role-slug="{{$role->guard_name}}" value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div id="permissions_box" >
                    <label for="roles">Select Permissions</label>
                    <div id="permissions_ckeckbox_list">
                    </div>
                </div>     

                <div class="form-group pt-2">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </form>                     
        </div>
    </div> 
</div>
@endsection


@section('js_user_page')

    <script>
        $(document).ready(function(){
            
            var permissions_box = $('#permissions_box');
            var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
            permissions_box.hide(); // hide all boxes

            $('#role').on('change', function() {
                var role = $(this).find(':selected');    
                var role_id = role.data('role-id');
                var role_slug = role.data('role-slug');
                

                permissions_ckeckbox_list.empty();
                $.ajax({
                    url: "/users/create",
                    method: 'get',
                    dataType: 'json',
                    data: {
                        role_id: role_id,
                        role_slug: role_slug,
                    }
                }).done(function(data) {

                    
                    console.log(data);
                    
                    permissions_box.show();                        
                    // permissions_ckeckbox_list.empty();
                    $.each(data, function(index, element){
                        $(permissions_ckeckbox_list).append(       
                            '<div class="custom-control custom-checkbox">'+                         
                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.name +'" value="'+ element.id +'">' +
                                '<label class="custom-control-label" for="'+ element.name +'">'+ element.name +'</label>'+
                            '</div>'
                        );
                    });
                });

            });
        });
    </script>

@endsection