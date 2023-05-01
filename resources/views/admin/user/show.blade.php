@extends('layouts.dashboard')
@section('title','Gestión de Usuario')

@section('breadcrumb')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion de usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/users">Usuarios</a></li>      
              <li class="breadcrumb-item active">Mostrar usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')

<div class="container">
    <div class="card">
        <div class="card-head">
            <h3>nombre : {{$user->name}} </h3>
            <h4>Correo : {{ $user->email }} </h4>
            <h4></h4>
        </div>
        <div class="card-body"> 
            <h5 class="card-title">Role</h5>
            <p class="card-text">
                @if ($user->roles->isNotEmpty())
                    @foreach ($user->roles as $role)
                        <span class="badge badge-primary">
                            {{ $role->name }}
                        </span>
                    @endforeach
                @endif
            </p>
            <h5 class="card-title">Permisos</h5>
            <p class="card-text">
                @if ($user->permissions->isNotEmpty())
                    
                    @foreach ($user->permissions as $permission)
                        <span class="badge badge-success">
                            {{ $permission->name }}                                    
                        </span>
                    @endforeach
                
                @endif      
            </p>           
        </div>
        <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-primary"> Atras</a>
        </div>
    </div>
</div>

@endsection